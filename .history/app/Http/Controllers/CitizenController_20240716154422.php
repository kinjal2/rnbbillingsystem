<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Redirect;
use Session;
use Validator, Response;
use App\Models\Customerdetail;
use Illuminate\Support\Facades\Hash; // Import the Hash facade

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
            $data = $request->only(['customer_no', 'mobile_no', 'email_id', 'password']);
            // Use updateOrCreate to create or update the record
            $customerdetails = Customerdetail::find($data['customer_no']);

        if ($customerdetails) {
            // Customer exists, update the record
            $customerdetails->mobile_no = $data['mobile_no'];
            $customerdetails->email_id = $data['email_id'];
            $customerdetails->password = Hash::make($data['password']);
            $customerdetails->save();
        }
        else{
            return response()->json(['message' => 'Record not found'], 404);
        }
        return response()->json([
            'message' => 'Record saved successfully',
            'redirect' => url()->previous() 
        ]);
    
        }

    }
 
}
