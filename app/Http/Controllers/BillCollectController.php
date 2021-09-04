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
use pdf;

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
        $date = Carbon::createFromFormat( 'Y-m-d', '2021-03-31' );
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
        dd( 'done' );

    }

    public function generateRagister() 
 {

        return view( \Config::get( 'app.theme' ) . '.generateRagister.generateRagister' );
    }

    public function generateRagister1( request $request ) 
 {

        $fin_year = Session::get( 'fin_year' );

        $Receipt = DB::table( 'receipt' )
        ->join( 'customer_details', 'receipt.cust_no', '=', 'customer_details.cust_no' )
        ->select( 'receipt.*', 'customer_details.cust_name' )
        ->whereDate( 'receipt.created_at', '=', date( 'Y-m-d', strtotime( $request->rdate ) ) )
        ->where( 'receipt.pay_mode', '=', $request->pay_mode )
        ->get();

        $html = '<table border="1" width="100%" ><thead><tr>
         <th style="width:25%"><strong>Customer No</strong></th>
        <th style="width:25%"><strong>Customer Name</strong></th>
        <th style="width:25%"><strong>Collected By</strong></th>
        <th style="width:25%"><strong>Amount </strong></th>
        </tr></thead><tbody>';

        if ( !empty( $Receipt ) ) {
            $total = 0;

            foreach ( $Receipt as $rd ) {
                $total = $total+$rd->amount;

                if ( $rd->pay_mode == 'B' ) {
                    $rd->pay_mode = 'Bank';
                } else if ( $rd->pay_mode == 'C' ) {
                    $rd->pay_mode = 'Cash';
                } else {
                    $rd->pay_mode = 'Demand Draft';
                }

                $html .= '<tr>
               <td>'.$rd->cust_no.'</td>
               <td>'.$rd->cust_name.'</td>
               <td>'.$rd->pay_mode.'</td>
               <td>'.$rd->amount.'</td>
                </tr>';

            }
            $html .= '<tr>
            <td colspan="3"><strong>Total Amount</strong></td>
            <td>'.$total.'</td>
            
             </tr>';

        } else {

            $html .= '<tr>
                   <td rowspan="4">There is no record</td></tr>';

        }

        $html .= '</tbody></table>';
        echo $html;
    }
}
