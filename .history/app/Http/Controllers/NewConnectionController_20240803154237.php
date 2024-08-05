<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Session;
use Validator, Response;
use App\Models\Customerdetail;
use App\Models\Billdetail;
use DataTables;
use App\Couchdb\Couchdb;
use DB;
use Facades;
use Carbon\Carbon;


class NewConnectionController extends Controller {
    /**
    * Create a new controller instance.
    *
    * @return void
    */

    public function __construct() {
       //$this->middleware( 'auth' );
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
    public function savenewconnection( request $request ) 
    {

        $rules = [
            'plot_area' => 'required|string',
            /*'deputation_date' => 'required',
            'old_desg' => 'required',
            'deputation_yn' => 'required',
            'old_office' => 'required',
            'prv_rent' => 'required',
            'prv_building_no' => 'required',
            'old_allocation_yn' => 'required',
            'prv_quarter_type' => 'required',
            'prv_handover' => 'required',
            'prv_area_name'=>'required',
            'have_old_quarter_yn'=>'required',
            'is_relative_yn' => 'required',
            'relative_details' => 'required',
            'is_stsc_yn'=>'required',
            'scst_details'=>'required',
            'is_relative_house_yn' => 'required',
            'relative_house_details' => 'required',
            'have_house_nearby_yn'=>'required',
            'nearby_house_details'=>'required',
            'downgrade_allotment' => 'required',
            'agree_rules'=>'required',

            'agree_rules'=>'required', */
        ];
        $validator = Validator::make( $request->all(), $rules );
        if ( $validator->fails() ) {
            return redirect( 'newtconnection' )
            ->withInput()
            ->withErrors( $validator );
        } else {
            $data = $request->input();

            try {

              /*  $uid = Session::get( 'uid' );
                $customerdetails = new Customerdetail();

                $customerdetails->cust_name = htmlentities( strip_tags( $request->applicant_name ), ENT_QUOTES );
                $customerdetails->plot_no = htmlentities( strip_tags( $request->plot_no ), ENT_QUOTES );
                $customerdetails->home_address = htmlentities( strip_tags( $request->home_address ), ENT_QUOTES );
                $customerdetails->office_address = htmlentities( strip_tags( $request->office_address ), ENT_QUOTES );
                $customerdetails->phone_no = htmlentities( strip_tags( $request->home_phone ), ENT_QUOTES );
                $customerdetails->moblie_no = htmlentities( strip_tags( $request->office_phone ), ENT_QUOTES );
                $customerdetails->sector_no = htmlentities( strip_tags( $request->sector_number ), ENT_QUOTES );
                $customerdetails->near_by = null;
                $customerdetails->conn_duration = htmlentities( strip_tags( $request->conn_duration ), ENT_QUOTES );
                $customerdetails->conn_purpose = htmlentities( strip_tags( $request->conn_purpose ), ENT_QUOTES );
                $customerdetails->plot_area = htmlentities( strip_tags( $request->plot_area ), ENT_QUOTES );
                $customerdetails->const_area = htmlentities( strip_tags( $request->const_area ), ENT_QUOTES );
                $customerdetails->conn_purpose = htmlentities( strip_tags( $request->purposeconnection ), ENT_QUOTES );
                $customerdetails->tmp_c_dt = date( 'Y-m-d' );
                $customerdetails->conn_water = 'T';
                $customerdetails->created_by = 1 ;
                $customerdetails->updated_by = 2 ;
                $customerdetails->cust_no = Customerdetail::customer_number( $request->sector_number );
                 $customerdetails->save();*/

                
                 
                 if ($request->hasFile('ctp_document')) { 
                    $file = $request->file('ctp_document');
                    $MimeType=$file->getClientMimeType();
                    $pathname = $file->getPathName();
                    $fileName =  $file->getClientOriginalName();
                  } 
                  
                 /* $username =  $fileName;
                  $customer = array(
                 'username' => $username
                 );
                 $couchdb_database=\Config::get('couchdb.couchdb_database');
                 $database =Couchdb::createDocument($customer,$couchdb_database,$username);
                 $array = json_decode($database, True);
                 $rev='';
                 if(isset($array['rev']))
				{
                    $rev = $array['rev'];
                    error_log($rev );
                }*/
                
                 $customerdetails = new Customerdetail();

                 $customerdetails->cust_name = htmlentities( strip_tags( $request->applicant_name ), ENT_QUOTES );
                 $customerdetails->plot_no = htmlentities( strip_tags( $request->plot_no ), ENT_QUOTES );
                 $customerdetails->home_address = htmlentities( strip_tags( $request->home_address ), ENT_QUOTES );
                 $customerdetails->office_address = htmlentities( strip_tags( $request->office_address ), ENT_QUOTES );
                 $customerdetails->phone_no = htmlentities( strip_tags( $request->home_phone ), ENT_QUOTES );
                 $customerdetails->mobile_no = ($request->office_phone)?htmlentities( strip_tags( $request->office_phone ), ENT_QUOTES ):'';
                 $customerdetails->sector_no = htmlentities( strip_tags( $request->sector_number ), ENT_QUOTES );
                 $customerdetails->near_by = 'null';
                 $customerdetails->conn_duration = htmlentities( strip_tags( $request->conn_duration ), ENT_QUOTES );
                 $customerdetails->conn_purpose = ($request->conn_purpose)?htmlentities( strip_tags( $request->conn_purpose ), ENT_QUOTES ):'NULL';
                 $customerdetails->plot_area = htmlentities( strip_tags( $request->plot_area ), ENT_QUOTES );
                 $customerdetails->const_area = htmlentities( strip_tags( $request->const_area ), ENT_QUOTES );
                 $customerdetails->conn_purpose = htmlentities( strip_tags( $request->purposeconnection ), ENT_QUOTES );
                 $customerdetails->tmp_c_dt = date( 'Y-m-d' );
                 $customerdetails->conn_water = 'T';
                 $customerdetails->created_by = 1 ;
                 $customerdetails->updated_by = 2 ;
                 $customerdetails->cust_no = Customerdetail::customer_number( $request->sector_number );
                  $customerdetails->save();
                 if ($request->hasFile('true_copy_doc')) { 
                    $file = $request->file('true_copy_doc');
                    $MimeType=$file->getClientMimeType();
                    $pathname1 = $file->getPathName();
                  
                  } 
                 /* $database = Couchdb::createAttachmentDocument($couchdb_database,$username,$rev,$pathname);
                  $array1 = json_decode($database, True);
                  if(isset($array1['rev']))
                  {
                      error_log(print_r($array1));
                      $rev = $array1['rev'];
                      error_log($rev );
                  }

                  $database = Couchdb::createAttachmentDocument($couchdb_database,$username,$rev,$pathname1);
                  $array = json_decode($database, True);*/
                  



                return redirect( 'newtconnection' )->with( 'Success', 'Data Saved Successfully' );
            } catch( Exception $e ) {
                return redirect( 'insert' )->with( 'failed', 'operation failed' );
            }
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
            // Generate action buttons with a route
            $btn = '<a href="' . route('billgenrate', ['cust_no' => $row->cust_no]) . '" class="edit btn btn-primary btn-sm">Bill Collection</a>';
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
        $cust_no= $cust_no;
  $this->_viewContent['cus_detail']=Customerdetail::select('cust_no','cust_name','plot_no','home_address','id','sector_no','tmp_c_dt','prm_c_dt')
  ->where('cust_no',$cust_no)->first();
  //dd( $this->_viewContent['cus_detail']);

 $cust_no= $cust_no;
 //dd($cust_no);
        //  \DB::enableQueryLog();
        $this->_viewContent['bill_detail']=Billdetail::select('wp_os_amt','dp_os_amt','pint20','w_os_amt_wo_d','d_os_amt_wo_d','w_os_amt_wi_d','d_os_amt_wi_d','tb_amount','fin_year')
  ->where('cust_no',$cust_no)->first();
 // $query = \DB::getQueryLog();
//dd($query);
        return view( \Config::get( 'app.theme' ) . '.newconnection.generatebill' ,$this->_viewContent);

    }
    public function billcollection()
    {
       return view( \Config::get( 'app.theme' ) . '.billcollection.index' ); 
    }
    public function serchcustomer(request $request){
       $fin_year = Session::get( 'fin_year' );
        $oldBilldetail = DB::table('bill_details')
            ->join('customer_details', 'bill_details.cust_no', '=', 'customer_details.cust_no')
            ->select('bill_details.*', 'customer_details.cust_name', 'customer_details.sector_no','customer_details.plot_no')
            ->where('fin_year','=',$fin_year)
             ->where('bill_details.cust_no','=', $request->custmor_no)
            ->get();
           
        $html = '<table border="1" width="100%" ><thead><tr>
         <th >customer No</th>
        <th >customer Name</th>
        <th >sector</th>
        <th >Plot No</th>
        <th >generate bill</th>
        <th >Without Discount</th>
        <th >With Discount</th>
        <th >Status</th>
        </tr></thead><tbody>';
    
       if(!empty($oldBilldetail)){
        foreach ($oldBilldetail as $ob){ 
          $sum=$ob->w_os_amt_wo_d+$ob->d_os_amt_wo_d ;
          $sum1=$ob->w_os_amt_wi_d+$ob->d_os_amt_wi_d ;
            if($ob->paid_status == 1){
               $status = '<a href= "'.\URL('billgenrate') . "/" . $ob->cust_no . '" >View Receipt</a> ';
            }
            else{
                $status= '<a href="#">Bill Collect</a>';
                
                $status= '<a href="' . \URL('billcollect') . "/" . $ob->cust_no . '"  class="edit btn btn-primary btn-sm"> Bill Collection</a>';
                          
            }


            $html .= '<tr>
            <td>'.$ob->cust_no.'</td>
            <td>'.$ob->cust_name.'</td>
            <td>'.$ob->sector_no.'</td>
            <td>'.$ob->plot_no.'</td>
            <td>'.$ob->w_os_amt_wo_d .'</td>
            <td>'.$sum.'</td>
            <td>'.$sum1.'</td>
            <td>'.$status.'</td>
            </tr>';
        }   
       }
       else{ 
        $html .= '<tr>
        <td rowspan="4">There is no record</td></tr>';
  }
     
         
        $html .= '</tbody></table>';
        echo $html;

    }
    public function NameChangeRequest()
    {
        return view( \Config::get( 'app.theme' ) . '.newconnection.namechange' );
    }
    public function SerchCustomerNo(Request $request)
    {
        $customerNo = $request->input('customer_no');
        $customerDetail=Customerdetail::select('cust_no','cust_name','plot_no','home_address','id','sector_no','tmp_c_dt','prm_c_dt')
        ->where('cust_no',$customerNo)->first();
         // Check if customer is found
         if ($customerDetail) {
            return response()->json(['success' => 'Customer found successfully!', 'data' => $customerDetail]);
        } else {
            return response()->json(['error' => 'Customer not found.'], 404);
        }
    }
    
}


