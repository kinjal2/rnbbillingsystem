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
        //dd( $request->id );
        $bill_detail = Billdetail::select( 'wp_os_amt', 'dp_os_amt', 'pint20', 'w_os_amt_wo_d', 'd_os_amt_wo_d', 'w_os_amt_wi_d', 'd_os_amt_wi_d', 'tb_amount', 'fin_year' )
        ->where( 'cust_no', $request->id )->first();

        $today = Carbon::today();
        $date = Carbon::createFromFormat( 'Y-m-d', '2024-03-31' );
        if ( $today ->gt ( $date ) ) {
            $this->_viewContent['amount']   = $bill_detail->w_os_amt_wo_d+$bill_detail->d_os_amt_wo_d ;
        } else {
            $this->_viewContent['amount']  = $bill_detail->w_os_amt_wi_d+$bill_detail->d_os_amt_wi_d ;
        }
        $this->_viewContent['cust_no']  = $request->id;
        return view( \Config::get( 'app.theme' ) . '.billgenerate.billcollect',  $this->_viewContent );

    }

    public function savepayment( request $request ) {

        $fin_year = Session::get( 'fin_year' );
        $Receipt = new Receipt();
        $Receipt->pay_mode = htmlentities( strip_tags( $request->pay_mode ), ENT_QUOTES );
        $Receipt->amount = htmlentities( strip_tags( $request->total_amount ), ENT_QUOTES );
        $Receipt->cust_no = htmlentities( strip_tags( $request->cust_no ), ENT_QUOTES );
        $Receipt->bank_name = htmlentities( strip_tags( $request->bank_name ), ENT_QUOTES );
        $Receipt->branch_name = htmlentities( strip_tags( $request->branch_name ), ENT_QUOTES );
        $Receipt->cheque_no = htmlentities( strip_tags( $request->cheque_no ), ENT_QUOTES );
        $Receipt->fin_year = $fin_year;

        $Receipt->save();

        DB::table( 'bill_details' )
        ->where( 'cust_no', $request->cust_no )  // find your user by their email
        ->update( array( 'paid_status' => 1 ) );

     
        return Redirect::route('billcollection')->with('message', 'Bill Paid Successfully!');

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
    $html = view('document', $this->_viewContent );

    // Write HTML to mPDF
    $mpdf->WriteHTML($html);

    // Output the PDF
    $mpdf->Output('document.pdf', 'I'); // 'D' for download, 'I' for inline display, 'F' for file save
    }
}
