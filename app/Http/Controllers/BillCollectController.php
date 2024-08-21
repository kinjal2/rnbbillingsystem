<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Session;
use Validator, Response;
use App\Models\Customerdetail;
use App\Models\Billdetail;
use App\Models\Receipt;
use DataTables;
use Couchdb;
use DB;
use Carbon\Carbon;
use Mpdf\Mpdf;
use Terbilang;

class billcollectController extends Controller
 {
    public function __construct()
 {
       //   $this->middleware( 'auth' );
        $this->_viewContent = [];
    }

    public function index( request $request )
 {
       // dd( $request->id );
        $cust_id = base64_decode($request->id);
        $bill_detail = Billdetail::select( 'wp_os_amt', 'dp_os_amt', 'pint20', 'w_os_amt_wo_d', 'd_os_amt_wo_d', 'w_os_amt_wi_d', 'd_os_amt_wi_d', 'tb_amount', 'fin_year' )
        ->where( 'cust_no', $cust_id )->first();

        $today = Carbon::today();
        $date = Carbon::createFromFormat( 'Y-m-d', '2024-03-31' );
        if ( $today ->gt ( $date ) ) {
            $this->_viewContent['amount']   = $bill_detail->w_os_amt_wo_d+$bill_detail->d_os_amt_wo_d ;
        } else {
            $this->_viewContent['amount']  = $bill_detail->w_os_amt_wi_d+$bill_detail->d_os_amt_wi_d ;
        }
        $this->_viewContent['cust_no']  = $cust_id;
        return view( \Config::get( 'app.theme' ) . '.billgenerate.billcollect',  $this->_viewContent );

    }

    public function savePayment(Request $request) {
        // Validate incoming request data
        $validatedData = $request->validate([
            'pay_mode' => 'required|string|max:255',
            'total_amount' => 'required|numeric|min:0',
            'cust_no' => 'required|string|max:255',
            'bank_name' => 'nullable|string|max:255',
            'branch_name' => 'nullable|string|max:255',
            'cheque_no' => 'nullable|string|max:255',
        ]);

        // Start by retrieving the financial year from the session
        $fin_year = Session::get('fin_year');

        // Create a new instance of Receipt
        $receipt = new Receipt();
        $receipt->pay_mode = htmlspecialchars($validatedData['pay_mode'], ENT_QUOTES);
        $receipt->amount = htmlspecialchars($validatedData['total_amount'], ENT_QUOTES);
        $receipt->cust_no = htmlspecialchars($validatedData['cust_no'], ENT_QUOTES);
        $receipt->bank_name = htmlspecialchars($validatedData['bank_name'], ENT_QUOTES);
        $receipt->branch_name = htmlspecialchars($validatedData['branch_name'], ENT_QUOTES);
        $receipt->cheque_no = htmlspecialchars($validatedData['cheque_no'], ENT_QUOTES);
        $receipt->fin_year = $fin_year;

        try {
            // Attempt to save the Receipt
            $receipt->save();

            // Update the billing status to paid
            DB::table('bill_details')
                ->where('cust_no', $validatedData['cust_no'])
                ->update(['paid_status' => 1]);

            // Log the success message for debugging
            \Log::info('Payment successfully processed. Redirecting with success message.');

            // Redirect with a success message
            return Redirect::route('billcollection')->with('message', 'Bill Paid Successfully!');

        } catch (QueryException $e) {
            // Log the QueryException details for debugging
            \Log::error('QueryException: ' . $e->getMessage(), ['code' => $e->getCode()]);

            // Check for unique constraint violation
            if ($e->getCode() == 23505) { // PostgreSQL unique violation error code
                return Redirect::back()->with('error', 'A receipt for this customer and financial year already exists.');
            }

            // Handle any other query exceptions
            return Redirect::back()->with('error', 'An error occurred while processing the payment: ' . $e->getMessage());
        } catch (\Exception $e) {
            // Log the general Exception details for debugging
            \Log::error('Exception: ' . $e->getMessage());

            // Catch any other exceptions that might occur
            return Redirect::back()->with('error', 'An unexpected error occurred: ' . $e->getMessage());
        }
    }


    public function generateRagister()
 {

        return view( \Config::get( 'app.theme' ) . '.generateragister.generateragister');
    }

    public function generateRagister1( request $request )
 {

        $fin_year = Session::get( 'fin_year' );

        $Receipt = DB::table( 'receipt' )
        ->join( 'customer_details', 'receipt.cust_no', '=', 'customer_details.cust_no' )
        ->select( 'receipt.*', 'customer_details.cust_name' )
       // ->whereDate( 'receipt.created_at', '=', date( 'Y-m-d', strtotime( $request->rdate ) ) )
	   ->whereBetween('receipt.created_at', [
    date('Y-m-d', strtotime($request->rdate)),
    date('Y-m-d', strtotime($request->todate))
])
        ->where( 'receipt.pay_mode', '=', $request->pay_mode )
        ->get();

        $html = '<table border="1" width="100%" ><thead><tr>
         <th style="width:25%"><strong>Customer No</strong></th>
        <th style="width:25%"><strong>Customer Name</strong></th>
        <th style="width:25%"><strong>Collected By</strong></th>
        <th style="width:25%"><strong>Amount </strong></th>
        <th style="width:25%"><strong>Chalan </strong></th>
        </tr></thead><tbody>';

        if ( !empty( $Receipt ) ) {
            $total = 0;
            $status='';
            foreach ( $Receipt as $rd ) {
                $total = $total+$rd->amount;

                if ( $rd->pay_mode == 'B' ) {
                    $pay_mode = 'Bank';
                    $status= '<a href="' . \URL('generate_pdf') . "/" . base64_encode($rd->cust_no) . '"  class="edit btn btn-primary btn-sm">Bank Challan</a>';

                } else if ( $rd->pay_mode == 'C' ) {
                    $pay_mode = 'Cash';
                    $status1= '<a href="' . \URL('generate_pdf1') . "/" . base64_encode($rd->cust_no) . '"  class="edit btn btn-primary btn-sm">Cash Challan</a>';
                } else {
                    $pay_mode = 'Demand Draft';
                }

                $html .= '<tr>
               <td>'.$rd->cust_no.'</td>
               <td>'.$rd->cust_name.'</td>
               <td>'.$pay_mode.'</td>
               <td>'.$rd->amount.'</td>
               <td>'. $status.'</td>
                </tr>';

            }
            $html .= '<tr>
            <td colspan="3"><strong>Total Amount</strong></td>
            <td>'.$total.'</td>
            <td></td>
             </tr>';

        } else {

            $html .= '<tr>
                   <td rowspan="5">There is no record</td></tr>';

        }

        $html .= '</tbody></table>';
        if ( $rd->pay_mode == 'C' ) {
         $html .= "<table border='1' width='100%' ><thead><tr>
         <th style='width:25%'>".$status1."</th></tr></table>";
        }
        echo $html;
    }
    public function generate_pdf (request $request ){

    // Decode the customer ID from base64
    $cust_id = base64_decode($request->id);

    // Get the financial year from session
    $fin_year = Session::get('fin_year');

    // Query to fetch old bill details
    $oldBilldetail = DB::table('customer_details')
        ->join('receipt', 'receipt.cust_no', '=', 'customer_details.cust_no')
        ->select('amount', 'customer_details.cust_no', 'customer_details.cust_name', 'receipt.created_at', 'customer_details.sector_no', 'customer_details.plot_no', 'cheque_no', 'bank_name', 'branch_name')
        ->where('fin_year', '=', $fin_year)
        ->where('customer_details.cust_no', '=', $cust_id)
        ->first(); // Use first() to get a single object directly

    // Check if oldBilldetail is not null before accessing properties
    if (!$oldBilldetail) {
        abort(404, 'Data not found');
    }

    // Prepare data for PDF
    $data = [
        'cust_no' => $oldBilldetail->cust_no,
        'cust_name' => $oldBilldetail->cust_name,
        'sector_no' => $oldBilldetail->sector_no,
        'plot_no' => $oldBilldetail->plot_no,
        'cheque_no' => $oldBilldetail->cheque_no,
        'created_at' => $oldBilldetail->created_at,
        'bank_name' => $oldBilldetail->bank_name,
        'branch_name' => $oldBilldetail->branch_name,
        'amount' => $oldBilldetail->amount,
        'amountword' => Terbilang::make($oldBilldetail->amount, " Only", 'Rupees '),
    ];
    $this->_viewContent['data']=$data;
    // Create a new mPDF instance
    $mpdf = new Mpdf();

    // Set default header and footer
    $mpdf->SetHeader('Document Title');
    $mpdf->SetFooter('{PAGENO}');

    // Generate the PDF content
    $html = view('bank_challan', $this->_viewContent );

    // Write HTML to mPDF
    $mpdf->WriteHTML($html);

    // Output the PDF
    $mpdf->Output('document.pdf', 'I'); // 'D' for download, 'I' for inline display, 'F' for file save
    }
    public function generate_pdf1 (request $request ){

        // Decode the customer ID from base64

        // Get the financial year from session
        $fin_year = Session::get('fin_year');
        $mpdf = new Mpdf();
        // Set default header and footer
        $mpdf->SetHeader('Document Title');
        $mpdf->SetFooter('{PAGENO}');
         // Generate the PDF content
        $html = view('cash_challan');
       // Write HTML to mPDF
        $mpdf->WriteHTML($html);
        // Output the PDF
        $mpdf->Output('cash_document.pdf', 'I'); // 'D' for download, 'I' for inline display, 'F' for file save
        }

}
