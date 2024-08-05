<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Customerdetail;
use App\Models\Ratemaster;
use App\Models\Billdetail;
use Session;
class BillGenerateController extends Controller 
{
    public function __construct() {
           $this->middleware( 'auth' );
        $this->_viewContent = [];
    }

    public function index() {
        return view( \Config::get( 'app.theme' ) . '.billgenerate.manage' );
    }

    public function savegenratenewbill1() {
        $fin_year = Session::get( 'fin_year' );
     //   $fin_year = 202122;
        $data = Customerdetail::select( 'cust_no', 'plot_area', 'const_area', 'conn_water', 'conn_drinage', 'id' )
      //  ->where( 'cust_no', '=', '140400' )
        ->get();
        //dd(  $data);
        $checkbilldata = Billdetail::select( '*' )
           // ->where( 'paid_status', '=', 0 )
            //->where( 'cust_no', '=', $value->cust_no )
            //->where( 'cust_no', '=', $value->cust_no )
           ->where( 'fin_year', '=', $fin_year)
            ->get();
        //    dd($checkbilldata);
      if($checkbilldata->isEmpty())
      {
        foreach ( $data  as  $value ) { //dd($value->const_area);
            if ( $value->const_area == 0.00 || $value->const_area == null ) {
                $count_area = $value->plot_area;
            } else {
                $count_area = $value->const_area;
            }
            $oldBilldetail = Billdetail::select( '*' )
            ->where( 'paid_status', '=', 0 )
            ->where( 'cust_no', '=', $value->cust_no )
            ->where( 'cust_no', '=', $value->cust_no )
           ->where( 'fin_year', '=', $fin_year)
            ->get();
           // dd($oldBilldetail);
            if ( empty( $oldBilldetail ) ) {
              $pin = 0;
                $water_chwithout = 0;
                $drainage_chwithout = 0;
                foreach ( $oldBilldetail as $oldB ) {
                    if ( ( (  $fin_year )-( $oldB->fin_year ) )  >= 202 ) {

                        $pint20 = ( $oldB->d_os_amt_wo_d*20 )/100;
                        $pin = $pin + $pint20;
                    }

                    $water_chwithout += $oldB->w_os_amt_wo_d;
                    $drainage_chwithout += $oldB->d_os_amt_wo_d;

                }

                $wp_os_amt = $water_chwithout;

                $dp_os_amt = $drainage_chwithout;
                $pint20 = $pin;

            } else {

                $wp_os_amt = 0;

                $dp_os_amt = 0;
                $pint20 = 0;
            }

            $data = Ratemaster::select( '*' )
            ->where( 'start_contraction', '<=', $count_area )
            ->where( 'end_contraction', '>=', $count_area )
            ->first();
            if(!empty($data))
            {
                $Billdetail = new Billdetail();
                $Billdetail->cust_no =  $value->cust_no;
                $Billdetail->fin_year =  $fin_year;
                $Billdetail->w_os_amt_wi_d = $data->water_chwith_compensation;
                $Billdetail->d_os_amt_wi_d = $data->drainage_chwith_comp;
                $Billdetail->w_os_amt_wo_d = $data->water_chwithout_compensation;
                $Billdetail->d_os_amt_wo_d = $data->drainage_chwithout_comp;

                $Billdetail->wp_os_amt = $wp_os_amt;
                $Billdetail->dp_os_amt = $dp_os_amt;
                $Billdetail->pint20 = $pint20;
                $Billdetail->tb_amount = $data->drainage_chwith_comp + $data->water_chwith_compensation;
                $Billdetail->paid_status = 0;
                $Billdetail->created_by = 1;
                $Billdetail->updated_by = 1;
                $Billdetail->save();
            }

        }
    }
    else
    {
        return response()->json(['message' => 'Bill already generated for this financial year successfully!', 'status' => 'error']);
    }

        return response()->json(['message' => 'Bill generated successfully!', 'status' => 'success']);
    }
    public function savegenratenewbill(Request $request) {
        // $fin_year = Session::get( 'fin_year' );
        // $fin_year = 202122;
        $sector_number=$request->input('sector_number');
         // $cust_no='140001';
         // $sector_number=substr($cust_no,0,2);
        $fin_year = $request->input('fin_year');
         // echo $fin_year= $request->fin_year;
         //  return response()->json(['message' => $sector_number, 'status' => 'error']);
         //  die();
         $data = Customerdetail::select( 'cust_no', 'plot_area', 'const_area', 'conn_water', 'conn_drinage', 'id' )
         ->where( 'cust_no', 'like', $sector_number."%" )
         ->get();
         //dd(  $data);
          //$cust_no='140001';
          //$sector_number=substr($data->cust_no,0,2);
         $checkbilldata = Billdetail::select( '*' )
             // ->where( 'paid_status', '=', 0 )
            //  ->where( 'cust_no', '=', $data->cust_no )
             ->where( 'sector_no', '=', $sector_number )
            ->where( 'fin_year', '=', $fin_year)
             ->get();
         //    dd($checkbilldata);
       if($checkbilldata->isEmpty())
       {
         try 
         {
         foreach ( $data  as  $value ) { //dd($value->const_area);
             if ( $value->const_area == 0.00 || $value->const_area == null ) {
                 $count_area = $value->plot_area;
             } else {
                 $count_area = $value->const_area;
             }
             $oldBilldetail = Billdetail::select( '*' )
             ->where( 'paid_status', '=', 0 )
             ->where( 'cust_no', '=', $value->cust_no )
             ->where('sector_no','=',$sector_number)
            ->where( 'fin_year', '=', $fin_year)
             ->get();
            // dd($oldBilldetail);
             if ( empty( $oldBilldetail ) ) {
               $pin = 0;
                 $water_chwithout = 0;
                 $drainage_chwithout = 0;
                 foreach ( $oldBilldetail as $oldB ) {
                     if ( ( (  $fin_year )-( $oldB->fin_year ) )  >= 202 ) {
 
                         $pint20 = ( $oldB->d_os_amt_wo_d*20 )/100;
                         $pin = $pin + $pint20;
                     }
 
                     $water_chwithout += $oldB->w_os_amt_wo_d;
                     $drainage_chwithout += $oldB->d_os_amt_wo_d;
 
                 }
 
                 $wp_os_amt = $water_chwithout;
 
                 $dp_os_amt = $drainage_chwithout;
                 $pint20 = $pin;
 
             } else {
 
                 $wp_os_amt = 0;
 
                 $dp_os_amt = 0;
                 $pint20 = 0;
             }
 
             $data = Ratemaster::select( '*' )
             ->where( 'start_contraction', '<=', $count_area )
             ->where( 'end_contraction', '>=', $count_area )
             ->first();
             if(!empty($data))
             {
                 $Billdetail = new Billdetail();
                 $Billdetail->cust_no =  $value->cust_no;
                 $Billdetail->fin_year =  $fin_year;
                 $Billdetail->w_os_amt_wi_d = $data->water_chwith_compensation;
                 $Billdetail->d_os_amt_wi_d = $data->drainage_chwith_comp;
                 $Billdetail->w_os_amt_wo_d = $data->water_chwithout_compensation;
                 $Billdetail->d_os_amt_wo_d = $data->drainage_chwithout_comp;
 
                 //$sector_number=substr($value->cust_no,0,2);
                 
 
                 $Billdetail->wp_os_amt = $wp_os_amt;
                 $Billdetail->dp_os_amt = $dp_os_amt;
                 $Billdetail->pint20 = $pint20;
                 $Billdetail->tb_amount = $data->drainage_chwith_comp + $data->water_chwith_compensation;
                 $Billdetail->paid_status = 0;
                 $Billdetail->created_by = 1;
                 $Billdetail->updated_by = 1;
                 $Billdetail->sector_no=$sector_number;
                 $Billdetail->save();
 
                 
             }
             
         }
             return response()->json(['message' => 'Bill generated successfully!', 'status' => 'success']);
         }
         catch(Exception $e){
             return response()->json(['message' => $e->getMessage(), 'status' => 'success']);
         }
         
        
 
     }
     else
     {
         return response()->json(['message' => 'Bill already generated for this financial year successfully!', 'status' => 'error']);
     }
 
         //return response()->json(['message' => 'Bill generated successfully!', 'status' => 'success']);
  }
}
