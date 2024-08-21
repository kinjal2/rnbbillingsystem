<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Session;
use Validator, Response;
use App\Models\Customerdetail;
use App\Models\Billdetail;
use App\Models\Filelist;
use DataTables;
use App\Couchdb\Couchdb;
use DB;
use Facades;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;


class NewConnectionController extends Controller {
    /**
    * Create a new controller instance.
    *
    * @return void
    */

    public function __construct() {
       $this->middleware( 'auth' );
        $this->_viewContent = [];
    }

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */

    public function index()
    {
        return view( \Config::get( 'app.theme' ) . '.newconnection.manage' );
    }

    public function savenewconnection(Request $request)
    {
        // Validation rules
        $rules = [
            'plot_area' => 'required|regex:/^\d+(\.\d{1,1})?$/', // Only allow digits and one dot
            'const_area' => 'required|regex:/^\d+(\.\d{1,1})?$/', // Adjust as necessary
           // 'customer_no' => 'required',
            'applicant_name' => 'required',
            'home_address' => 'required',
            'office_address' => 'required',
            'home_phone' => 'required',
            'office_phone' => 'required',
            'sector_number' => 'required',
            'plot_no' => 'required',
            'conn_duration' => 'required',
            'conn_purpose' => 'required',
            'true_copy_doc' => 'required|mimes:pdf|max:2048', // 2MB max file size
            'ctp_document' => 'required|mimes:pdf|max:2048',  // 2MB max file size
        ];

        // Define custom error messages
        $messages = [
            'true_copy_doc.required' => 'Please upload a document.',
            'true_copy_doc.mimes' => 'Only PDF files are allowed.',
            'ctp_document.required' => 'Please upload a document.',
            'ctp_document.mimes' => 'Only PDF files are allowed.',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('newtconnection')
                ->withInput()
                ->withErrors($validator);
        }
         try {
            // Creating a new customer detail record
            $customerdetails = new Customerdetail();
            $customerdetails->cust_name = htmlentities(strip_tags($request->applicant_name), ENT_QUOTES);
            $customerdetails->plot_no = htmlentities(strip_tags($request->plot_no), ENT_QUOTES);
            $customerdetails->home_address = htmlentities(strip_tags($request->home_address), ENT_QUOTES);
            $customerdetails->office_address = htmlentities(strip_tags($request->office_address), ENT_QUOTES);
            $customerdetails->phone_no = htmlentities(strip_tags($request->home_phone), ENT_QUOTES);
            $customerdetails->mobile_no = htmlentities(strip_tags($request->office_phone), ENT_QUOTES);
            $customerdetails->sector_no = htmlentities(strip_tags($request->sector_number), ENT_QUOTES);
            $customerdetails->near_by = null; // Set as per your requirements
            $customerdetails->conn_duration = htmlentities(strip_tags($request->conn_duration), ENT_QUOTES);
            $customerdetails->conn_purpose = htmlentities(strip_tags($request->conn_purpose), ENT_QUOTES);
            $customerdetails->plot_area = htmlentities(strip_tags($request->plot_area), ENT_QUOTES);
            $customerdetails->const_area = htmlentities(strip_tags($request->const_area), ENT_QUOTES);
            $customerdetails->tmp_c_dt = date('Y-m-d'); // Current date
            $customerdetails->conn_water = 'T'; // Example value
            $customerdetails->created_by = 1; // Adjust as per your logic
            $customerdetails->updated_by = 2; // Adjust as per your logic
            $customerdetails->cust_no = Customerdetail::customer_number($request->sector_number); // Generate customer number

            // Save the customer details
            $customerdetails->save();

            // Log activity
            log_activity('Customer applied for new connection', 'add new connection', 123, ['additional' => $customerdetails]);

            // Handle file uploads if necessary
            if ($request->hasFile('true_copy_doc')) {
                $documentData = [
                    'document_id' =>"newcust_".$customerdetails->cust_no.'true_copy_doc',
                    'file' =>$request->file('true_copy_doc'),
                    'cust_no' =>$customerdetails->cust_no,
                    'filename' =>'true_copy_doc',
                    'doc_id' =>'1'
                ];
                uploadDocuments($documentData);
            }
               // Handle file uploads if necessary
               if ($request->hasFile('ctp_document')) {
                $documentData = [
                    'document_id' =>"newcust_".$customerdetails->cust_no.'ctp_document',
                    'file' =>$request->file('ctp_document'),
                    'cust_no' =>$customerdetails->cust_no,
                    'filename' =>'ctp_document',
                    'doc_id' =>'2'
                ];
                uploadDocuments($documentData);
            }

            // Redirect with success message
            return redirect('newtconnection')->with('Success', "Data Saved Successfully. Customer Number: {$customerdetails->cust_no}");

        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Database Error1111: ' . $e->getMessage());

            // Return a user-friendly error message
            return redirect('newtconnection')->with('failed', 'An error occurred while saving your data. Please try again.');
        }
    }
    public function getcustomerlist(Request $request)
    {
        return view(\Config::get('app.theme') . '.newconnection.index');
    }
    public function getcustomerlist1(Request $request)
    {
        try
        {
            // Fetch data from the Customerdetail model
            $data = Customerdetail::select('cust_no', 'cust_name', 'plot_no', 'home_address', 'id', 'sector_no');

            // Return the DataTables response
            return DataTables::of($data)
            ->addIndexColumn() // Add an index column to the DataTable
            ->addColumn('action', function($row) {
                // Generate the first action button with a route
                $btn1 = '<a href="' . route('billgenrate', ['cust_no' => base64_encode($row->cust_no)]) . '" class="edit btn btn-primary btn-sm">Bill Collection</a>';

                // Generate the second action button with a different route or functionality
                $btn2 = '<a href="' . route('viewdetails', ['cust_no' => base64_encode($row->cust_no)]) . '" class="view btn btn-secondary btn-sm">View Details</a>';

                // Combine both buttons into a single string
                $btn = $btn1 . ' ' . $btn2;

                return $btn;
            })
            ->rawColumns(['action']) // Mark the 'action' column as raw HTML
            ->make(true); // Return the DataTables response
        } catch (\Exception $e)
        {
           return response()->json(['error' => 'Failed to fetch data.'], 500);
        }
    }
    public function billgenrate($cust_no){
    // Assuming $cust_no is already defined and holds the customer number

    $cust_no=base64_decode($cust_no);
   // dd($cust_no);
// Retrieve customer details
$this->_viewContent['cus_detail'] = Customerdetail::select('cust_no', 'cust_name', 'plot_no', 'home_address', 'id', 'sector_no', 'tmp_c_dt', 'prm_c_dt')
->where('cust_no', $cust_no)
->first();

// Check if customer details were found
if (!$this->_viewContent['cus_detail']) {
// Handle the case when the customer is not found
return redirect()->back()->with('error', 'Customer not found.');
}

// Retrieve billing details for the found customer
$this->_viewContent['bill_detail'] = Billdetail::select('wp_os_amt', 'dp_os_amt', 'pint20', 'w_os_amt_wo_d', 'd_os_amt_wo_d', 'w_os_amt_wi_d', 'd_os_amt_wi_d', 'tb_amount', 'fin_year')
->where('cust_no', $cust_no)
->first();

// Optionally check if billing details were found and handle accordingly
if (!$this->_viewContent['bill_detail']) {
// Handle the case when the billing details are not found
$this->_viewContent['bill_detail'] = []; // or set an appropriate message
}

// Finally, return the view with the content
return view(\Config::get('app.theme') . '.newconnection.generatebill', $this->_viewContent);


    }
    public function billcollection()
    {
       return view( \Config::get( 'app.theme' ) . '.billcollection.index' );
    }
    public function serchcustomer(request $request){
      // Get the financial year from the session
$fin_year = Session::get('fin_year');
//dd($request->custmor_no);
//$fin_year = 202425;
// Retrieve old bill details from the database
//DB::enableQueryLog();
$oldBilldetail = DB::tab le('bill_details')
    ->join('customer_details', 'bill_details.cust_no', '=', 'customer_details.cust_no')
    ->select('bill_details.*', 'customer_details.cust_name', 'customer_details.sector_no', 'customer_details.plot_no')
    ->where('fin_year', '=', $fin_year)
    ->where('bill_details.cust_no', '=', $request->custmor_no)
    ->get();
  ///  dd(DB::getQueryLog());
// Initialize the HTML table with headers
$html = '<table border="1" width="100%">
    <thead>
        <tr>
            <th>customer  No</th>
            <th>Customer Name</th>
            <th>Sector</th>
            <th>Plot No</th>
            <th>Generate Bill</th>
            <th>Without Discount</th>
            <th>With Discount</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>';

// Check if there are any records
if ($oldBilldetail->isNotEmpty()) {
    foreach ($oldBilldetail as $ob) {
        // Calculate sums for the amounts
        $sum = $ob->w_os_amt_wo_d + $ob->d_os_amt_wo_d;
        $sum1 = $ob->w_os_amt_wi_d + $ob->d_os_amt_wi_d;

        // Determine the status based on the payment status
        if ($ob->paid_status == 1) {
            // If paid, provide a link to view the receipt
            $status = '<a href="' . \URL('billgenrate') . "/" . base64_encode($ob->cust_no) . '">View Receipt</a>';
        } else {
            // If not paid, provide a link for bill collection
            $status = '<a href="' . \URL('billcollect') . "/" . base64_encode($ob->cust_no) . '" class="edit btn btn-primary btn-sm">Bill Collection</a>';
        }

        // Append the row to the HTML
        $html .= '<tr>
            <td>' . htmlspecialchars($ob->cust_no) . '</td>
            <td>' . htmlspecialchars($ob->cust_name) . '</td>
            <td>' . htmlspecialchars($ob->sector_no) . '</td>
            <td>' . htmlspecialchars($ob->plot_no) . '</td>
            <td>' . htmlspecialchars($ob->w_os_amt_wo_d) . '</td>
            <td>' . htmlspecialchars($sum) . '</td>
            <td>' . htmlspecialchars($sum1) . '</td>
            <td>' . $status . '</td>
        </tr>';
    }
} else {
    // If no records found, show a message
    $html .= '<tr>
        <td colspan="8" class="text-center">There are no records</td>
    </tr>';
}

// Close the HTML table
$html .= '</tbody></table>';

// Output the HTML
echo $html;

 }
    public function NameChangeRequest()
    {
        return view( \Config::get( 'app.theme' ) . '.newconnection.namechange' );
    }
    public function SerchCustomerNo(Request $request)
    {
        $customerNo = $request->input('customer_no');
        $customerDetail=Customerdetail::select('*')
        ->where('cust_no',$customerNo)->first();
         // Check if customer is found
         if ($customerDetail) {
            return response()->json(['success' => 'Customer found successfully!', 'data' => $customerDetail]);
        } else {
            return response()->json(['error' => 'Customer not found.'], 404);
        }
    }
    public function viewDetails($cust_no){
        // Assuming $cust_no is already defined and holds the customer number

    $cust_no=base64_decode($cust_no);
$newNumber = str_pad($cust_no, 6, '0', STR_PAD_LEFT);

// Display the result
//echo $newNumber;  // Output will be 050001
 // Retrieve customer details
 $this->_viewContent['cus_detail'] = Customerdetail::select('cust_no', 'cust_name', 'plot_no', 'home_address','office_address', 'id', 'sector_no', 'tmp_c_dt', 'prm_c_dt','plot_area','const_area','phone_no')
 ->where('cust_no', $newNumber)
 ->first();
 $this->_viewContent['file_details'] = Filelist::select('*')
 ->where('cust_no',  $cust_no)
 ->get();
 //dd($this->_viewContent['file_details']);
 return view( \Config::get( 'app.theme' ) . '.newconnection.viewdetail' , $this->_viewContent);


    }
    public function viewDocument($cust_no,$docid)
    {
    // dd($cust_no,$docid);
        $cust_no=base64_decode($cust_no);
        $docid=base64_decode($docid);
      //  dd($cust_no,$docid);
       // \DB::enableQueryLog();
        $attachmentData = Filelist::where('cust_no',$cust_no)->where('doc_id',$docid)->take(1)->first();
      //  $queryLog = \DB::getQueryLog();

// Print the executed query
//dd($queryLog);
       // dd($attachmentData);
        if($attachmentData) {
            $document_id= $attachmentData->document_id;
	        $extended = new Couchdb(URL_COUCHDB, USERNAMECD, PASSWORDCD);
	        $extended->InitConnection();
            $response = $extended->getDocument(DATABASE,$document_id);
            $arrays = json_decode($response, True);
            //dd($arrays);
		    if(isset($arrays['_attachments'])){
			    $attachments = $arrays['_attachments'];
		    } else{
			    return "Document Not Found ! ";
		    }

            foreach ($attachments as $attachment_name => $attachment){
                $at_name[] = $attachment_name;
            }
            if(in_array($attachmentData['file_name'],$at_name)){
                $cont  = file_get_contents(COUCHDB_DOWNLOADURL."/".DATABASE."/".$document_id."/".$attachmentData['file_name']."");
                if ($cont) {
                   return response($cont)->withHeaders(['Content-type'=>'application/pdf']);
                }
                else{
                    return "Error fetching the document. Contact GIL";
                }
            }
            else{
                return 'Document not found !';
            }
	    }else {
            return "Document not found !";
		}
    }
}


