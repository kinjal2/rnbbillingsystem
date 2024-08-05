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
    public function saveRegistration(Request $request)
    {
        $rules = [
            'customer_no' => 'required',
            'mobile_no' => 'required',
            'email_id' => 'required|email',
            'password' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) 
        {
            return back()->withInput()->withErrors($validator);
        } 
        else 
        {
            $data = $request->only(['customer_no', 'mobile_no', 'email_id', 'password']);
            $customerdetails = Customerdetail::find($data['customer_no']);
            if ($customerdetails) 
            {
                // Customer exists, update the record
                $customerdetails->mobile_no = $data['mobile_no'];
                $customerdetails->email_id = $data['email_id'];
                $customerdetails->password = Hash::make($data['password']);
                $customerdetails->save();
                return redirect()->back()->with('success', 'Record saved successfully');
            } 
            else
            {
                return redirect()->back()->with(['error' => 'Record not found'], 404);
            }
        }
    }
    public function userLogin(Request $request)  
    {
        $rules = [
            'customer_no1' => 'required',
            'mobile_no1' => 'required',
            'password1' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) 
        {
            return back()->withInput()->withErrors($validator);
        } 
        else 
        {
            $user = Customerdetail::where('cust_no', $request->customer_no1)
            ->where('mobile_no', $request->mobile_no1)
            ->first();

            if ($user && Hash::check($request->password1, $user->password)) {
                Auth::login($user);
                return redirect()->intended('dashboard');
            }
            return back()->withErrors([
            'login_error' => 'The provided credentials do not match our records.',
            ]);
        }
    }
 
}
