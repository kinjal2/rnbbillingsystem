<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Redirect;
use Session;
use Validator, Response;
use App\Models\Customerdetail;

class CitizenController extends Controller
{
    public function __construct() 
    {
     
         $this->_viewContent = [];
     }
 
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
 
    public function index() 
    {
         return view('citizenmain');
    }
    public function saveRegistration(request $request)
    {
        $rules = [
            'customer_no' => 'required',
            'mobile_no' => 'required',
            'email_id' => 'required',
            'password' => 'required',
        ];
        $validator = Validator::make( $request->all(), $rules );
       // dd($validator );
        if ( $validator->fails() ) {
            return back()
            ->withInput()
            ->withErrors( $validator );
        } else 
        {
            $data = $request->input();
            $customerdetails = new Customerdetail();
            $customerdetails->cust_no = $data->customer_no; // Assume the ID of the customer is 1
            $customerdetails->mobile_no = $data->mobile_no;
            $customerdetails->email_id = $data->email_id;
            $customerdetails->password = $data->password;
            // Update the record
            $customerdetails->update();
    
        }

    }
 
}
