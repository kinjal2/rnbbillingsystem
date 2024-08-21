<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Redirect;
use Session;
use Validator, Response;
use App\Models\Customerdetail;
use App\Models\Billdetail;
use Illuminate\Support\Facades\Hash; // Import the Hash facade
use Mews\Captcha\Facades\Captcha;
use Illuminate\Support\Facades\Log;
use App\Models\NameTransferDetail;
use Illuminate\Support\Str;


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
    public function citizenlogin()
    {
        return view('citizenlogin');
    }
    public function citizenregistration()
    {
        return view('citizenregistration');
    }
    public function saveRegistration(Request $request)
    { // dd(session()->all()); 
        //dd($request);
        $rules = [
        /*'customer_no' => 'required',
        'mobile_no' => 'required',
        'email_id' => 'required|email',
        'password' => 'required|min:6',
        'c_password' => 'required|same:password',*/
        'captcha' => 'required|captcha',
    ];

    $messages = [
        'captcha.required' => 'The captcha field is required.',
        'captcha.captcha' => 'The captcha is invalid.',
    ];

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
		//return redirect()->route('citizenlogin')->withErrors([ 'error' => 'You are not a registered cusomer','activeTab' => 'registration']);
    }

        else
        {
            $data = $request->only(['customer_no', 'mobile_no', 'email_id', 'password']);

            $customerdetails = Customerdetail::find($data['customer_no']);
		//	dd($customerdetails);
           // die();
            if($customerdetails!=null)
            {
                // Customer exists, update the record
                $customerdetails->mobile_no = $data['mobile_no'];
                $customerdetails->email_id = $data['email_id'];
                $customerdetails->password = $data['password'];
                $customerdetails->save();
                log_activity('citizen Registration', 'citizen Registration', 3, ['additional' => $customerdetails]);
                //return redirect()->back()->with('success', 'Record saved successfully');
                //return redirect()->back()->with(['success'=>'You have been registered successfully','activeTab' => 'registration']);
				 return redirect()->route('citizenregistration')->with([ 'success' => 'You have been registered successfully. You can Login now.','activeTab' => 'registration']);
            }
            else
            {
                //return redirect()->back()->with(['error' => 'Record not found'], 404);
                //return redirect()->back()->with (['error'=>'You are not a registered cusomer',                'activeTab' => 'registration']);
				return redirect()->route('citizenregistration')->with([ 'error' => 'You are not a registered cusomer','activeTab' => 'registration']);

            }
        }
    }
    public function userLogin(Request $request)
    { //dd($request->captcha);
        $rules = [
            'customer_no1' => 'required',
            'mobile_no1' => 'required',
            'password1' => 'required',
            'captcha' => 'required|captcha',
        ];
        $messages = [
            'captcha.required' => 'The captcha field is required.',
            'captcha.captcha' => 'The captcha is invalid.',
        ];
    
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
        else
        {
            $user = Customerdetail::where('cust_no', $request->customer_no1)
            ->where('mobile_no', $request->mobile_no1)
            ->first();
            if ($user) {
               /* $str = $user->password . $request->_token;
                $hashedStoredPassword = hash("sha512", $str);*/
				$pwd = $user->password;

				$str=$pwd;
				$str.=$request->_token;
				$str=hash("sha512", $str);
               // dd($pwd,'<br>',$str ,'<br>' ,$request->password1);
                if ($str === $request->password1) {
             $user=Session::put('user', [
                        'cust_no' => $user->cust_no,
                        'name' => $user->cust_name,
                        'role' => 'customer',
                    ]);
                    log_activity('citizen login', 'citizen login', 3, ['additional' => $user]);
                    return redirect()->intended('citizendetails');
                }
            }
            return redirect()->back()->with (['error'=>'The provided credentials do not match our records.',
            'activeTab' => "login"]);
        }
    }
      /*if ($user) {
                // Hash the stored password with the CSRF token
                $str = $user->password;
                $str .= $request->_token;
                $hashedStoredPassword = hash("sha512", $str);
       // dd($user->password,'<br>',  $hashedStoredPassword,'<br>',$request->password1);
                // Compare hashed passwords
                if ($hashedStoredPassword === $request->password1) {*/
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
    public function reloadCaptcha()
    {
      //  Log::info('CAPTCHA Value: ' . print_r(session('captcha'), true));


        return response()->json(['captcha'=> captcha_img()]);
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
        //dd($request);
            // echo $request->nt_method;
            // die();        
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
                    'nt_method' => [
                        'required',
                    ],
                    'nt_doc1' =>[
                        'required',
                    ],
                    'nt_doc2' =>[
                        'required',
                    ],
                
                  
            ], [
                'full_name.regex' => 'The :attribute may only contain letters, spaces, and periods.',
                'cust_no' => 'Already applied for name transfer',
            ]);

            $user = Session::get('user');
            // Create a new instance of the model
            $record = NameTransferDetail::where('cust_no', $user['cust_no'])->first();
            //$record=1;
           
            if($record==null){

                // if ($request->hasFile('nt_doc1')) 
                // { 
                //    echo "h3llo";
                //    exit;
                //     $docId=(string)Session::get('Uid')."_0_photo";
                //     uploadDocuments($docId,$request);
                // } 
                if ($request->hasFile('nt_doc1')) 
                { 
                    $file = $request->file('nt_doc1');
                    //print_r($file);
                   // exit;
                   //echo "h3llo";
                  // $uid=$user['cust_no'];
                  $uid=$uuid = (string) Str::uuid();
                  
                   //exit;
                    //echo $docId=(string)$uid."_".$user['cust_no']."_pdf";
                   echo $docId=(string)$uid."_0_pdf";
                  // exit;
                  $docmasterid=1;
                    uploadDocuments($docId,$file,$docmasterid);
                    
                    echo "success upload";
                   
                } 
                $nameTransferDetail = new NameTransferDetail();

                // Set the attributes
                $nameTransferDetail->cust_no = $user['cust_no'];
                $nameTransferDetail->full_name = $request->input('full_name');
                $nameTransferDetail->status = 'U'; //U- uploaded request for name transfer
                $nameTransferDetail->nt_method = $request->input('nt_method');

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
