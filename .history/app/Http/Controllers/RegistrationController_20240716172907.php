<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Designationlevel;
use Redirect;
use Session;
use DB;
class RegistrationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     //   $this->middleware('auth');
	 $this->_viewContent=[];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
	public function apiLogin(Request $request)
	{  //   echo  $url = "http://10.154.3.159/rnbbillingsystem/";exit;
		if(($request->has('gid') && $request->get('gid') != '') || \Auth::check())
		{
			$url = "http://10.154.3.99/rnbbillingsystem/";
			$client = new \SoapClient("https://staging5.gujarat.gov.in/ssotest/adminservice/JSSOService.asmx?WSDL");
			if(\Auth::check())
			{
				$user = auth()->user();
				$uid = $user->usercode;
			}
			else
			{	
				$gid = $request->get('gid');
				try
				{
					$resp =  $client->IsValidTokan(array('GId' => $gid,'AppURL' =>  $url));
					$uid = $resp->IsValidTokanResult;
					if(!$uid)
					throw new \Exception('Invalid uid');

					$usercheck= User::where('usercode', '=',$uid)->count();
					$Designationlevel= Designationlevel::pluck('designationcode')->toArray();
					//  $Designationlevel = array_values($Designationlevel);
					if($usercheck == 1)
					{
						$user = User::where('usercode',$uid)->first();
						// dd($user);
						\Auth::login($user);
						$tokenObj = $client->GetLiveTokan(array('UserID' => $uid,'AppURL' =>  $url));
						$token = $tokenObj->GetLiveTokanResult;
						$userdet=$client->getUser(array('UserID'=>$uid,'enc_tokan'=> $token));
						$userdet2=get_object_vars($userdet->getUserResult);
						$office_designations = array();
						//dd($userdet2);
						foreach($userdet2 as $name => $temp)
						{
							$i = 0;
							if(is_countable($temp) && count($temp)>1)
							{
								foreach($temp as $item)
								{
									$ttt = (array) $item;
									if(in_array($ttt['DesignationCode'],$Designationlevel)) 
									{
										$office_designations[$i]['officecode'] = $ttt['OfficeCode'];
										$office_designations[$i]['designationcode'] = $ttt['DesignationCode'];
										$office_designations[$i]['officename'] = $ttt['Office_Eng'];
										$office_designations[$i]['designation'] = $ttt['Designation_Eng'];
										$office_designations[$i] = (object) $office_designations[$i];
										$i++;
									}
								}
							}
							else
							{
								$ttt = (array) $temp;
								$ttt = (array) $item;

								if(in_array($ttt['DesignationCode'],$Designationlevel)) 
								{
									$dlevel=DB::table('master.designationlevel')->where('designationcode', '=',$ttt['DesignationCode'])->select('level')->first();
									if(!$dlevel)
									$dlevel1 = "4";
									else
									$dlevel1=$dlevel->level;
									\Session::put('s_level', $dlevel1);
									\Session::put('fin_year', 202122);
									return redirect( 'dashboard' );
								}
							}
						}
						return view('checkuser', ['office_designations' => $office_designations]);
					}
					else
					{
						Session::put('uid',$uid);
						Session::put('is_admin',True);
						return view('ssouserregister');
					}
				}
				catch (\Exception $ex)
				{
					error_log(json_encode($ex));
					$client->disposeToken($gid);
					\Auth::logout();
					$departments = DB::connection('auth')->table('departments')->where('statecode', '=', '24')->where('active', '=', '1')->select('id','name')->get();
					return view('auth/register', ['departments' => $departments , 'ssoerrormsg' => 'SSO Auth failure']);
				} 
			}
		}

	}
	public function designationselection(Request $request){
        $officedesignation = $request->get('officedesignation');
       $temp = explode(':',$officedesignation);
        $validator = \Validator::make($request->all(), [
            'officedesignation' => 'required',
           
            
       ],[
            'officedesignation.required' => 'Office selection is required.',
        ]);
        if ($validator->fails()) {
            return response()->json(
                [
                'success' => false,
                'message' => $validator->errors()->all()
                ]
            );
        }
        $dlevel=DB::table('master.designationlevel')->where('designationcode', '=',$temp[1])->select('level')->first();
        if(!$dlevel)
                $dlevel1 = "4";
        else
        $dlevel1=$dlevel->level;
       \Session::put('s_level', $dlevel1);
	   \Session::put('fin_year', 202122);
	   return redirect( 'dashboard' );
     }
	
	 
}	
