<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Redirect;
use Session;
use Validator, Response;
use App\Models\Customerdetail;
use App\Models\Billdetail;
use Illuminate\Support\Facades\Hash; // Import the Hash facade
use App\Models\NameTransferDetail;

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
          
            if ($customerdetails!=null) 
            {
                // if($customerdetails['mobile_no']!=null || $customerdetails['email_id']!=null || $customerdetails['password']!=null )
                // {

                //     return redirect()->back()->with('error', 'You have already been registered. Try to login ');
                // }
                // else
                // {
                    // Customer exists but not registered, insert the record
                    $customerdetails->mobile_no = $data['mobile_no'];
                    $customerdetails->email_id = $data['email_id'];
                    $customerdetails->password = Hash::make($data['password']);
                    $customerdetails->save();
                    
                    return redirect()->back()->with(['success'=>'You have been registered successfully',
                    'activeTab' => 'registration']);
                    // return back()->withErrors([
                    //     'registration_success' => 'You have been registered successfully',
                    //     ]);
                // }
            } 
            else
            {
                return redirect()->back()->with (['error'=>'You are not a registered cusomer',
                'activeTab' => 'registration']);
                // return back()->withErrors([
                //     'registration_error' => 'You are not a registered cusomer',
                //     ]);
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
                
            if ($user && Hash::check($request->password1, $user->password)) 
            {
                 //session(['cust_no' =>]);;
                 Session::put('user', [
                    'cust_no' =>  $user->cust_no,
                    'name' =>  $user->cust_name,
                    'role' =>'customer',
                ]);
                return redirect()->intended('citizendetails');
            }
            // return back()->withErrors([
            // 'login_error' => 'The provided credentials do not match our records.',
            // ]);
            return redirect()->back()->with (['error'=>'The provided credentials do not match our records.',
            'activeTab' => "login"]);
        }
    }
    public function citizenDetails(Request $request)
    {
        //$custNo = Session::get('cust_no');
        $user = Session::get('user');
       // dd( $user['cust_no']);
        $this->_viewContent['bill_detail']   = $billDetail = Billdetail::select('*')
        ->join('customer_details', 'customer_details.cust_no', '=', 'bill_details.cust_no')
        ->where('customer_details.cust_no', $user['cust_no'])
        ->get();
        return view('citizen.citizendetails',  $this->_viewContent );
    }
    public function showDetails($cust_no)
    {
        $this->_viewContent['bill_detail']   = $billDetail = Billdetail::select('*')
        ->join('customer_details', 'customer_details.cust_no', '=', 'bill_details.cust_no')
        ->where('customer_details.cust_no', $cust_no)
        ->first();
        return view('citizen.showdetails',  $this->_viewContent );
    }
    public function citizenlogout()  
    {
       
       Session::forget('user');
        return redirect()->route('main');
    }
 
    public function nameTransferForm()
    {
        //echo "hello";
       // $user = Session::get('user');
       //$cust_no=$user['cust_no'];
        //$this->_viewContent['customer_detail']=$customer_detail=Customerdetail::select('cust_name')->where('cust_no','=',$cust_no)->first();
        
        return view('citizen/nameTransferForm');
        
    }

    public function nameTransferRequest(Request $request)
    {

          //  echo $request->cust_no;
            //die();        
            $request->validate(
                [
                    // 'cust_no' => [
                    //     'exists:name_transfer_details,cust_no',
                    // ],

                    'full_name' => [
                    'required',
                    'regex:/^[a-zA-Z\s.]+$/', // Validation rule
                    'max:255',
                    ],
                
                  
            ], [
                'full_name.regex' => 'The :attribute may only contain letters, spaces, and periods.',
                'cust_no' => 'Already applied for name transfer',
            ]);

            $user = Session::get('user');
            // Create a new instance of the model
            $record = NameTransferDetail::where('cust_no', $user['cust_no'])->first();
            
            if($record==null){
                $nameTransferDetail = new NameTransferDetail();

                // Set the attributes
                $nameTransferDetail->cust_no = $user['cust_no'];
                $nameTransferDetail->full_name = $request->input('full_name');
                $nameTransferDetail->status = 'U'; //U- uploaded request for name transfer

                // Save the record
                $nameTransferDetail->save();

                // Optionally return a response or redirect
                //return redirect()->back()->with('success', 'Record successfully inserted.');
                return back()->with('success', 'Name Transfer Form submitted successfully.');
            }
            else{
                return back()->with('error', 'Already applied for name transfer.');
            }
        
    }
}
