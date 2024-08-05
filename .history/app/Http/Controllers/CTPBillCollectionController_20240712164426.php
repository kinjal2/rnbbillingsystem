<?php  namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Services\AESEncryptBase;
use Session;

class CTPBillCollectionController extends Controller
{
   
	protected $aesEncryptBase;

    public function __construct()
    {
        $this->aesEncryptBase = new AESEncryptBase();
    }
    public function transactionId()
    {
        $transactionId = rand(100000, 999999) . Carbon::now()->format('ymdhis');
        
        $exists = DB::table('t_online_payment')
                    ->where('transaction_id', $transactionId)
                    ->exists();

        return !$exists ? $transactionId : $this->transactionId();
    }

    public function generateTokenNo()
    {
        // Generate a token number
        $tokenNo = rand(100000, 999999) . Carbon::now()->format('ymdhis');
        
        // Check if the token number already exists in the database
        $count = DB::table('t_online_payment')->where('token_no', $tokenNo)->count();

        // If the token number exists, recursively generate a new one
        return ($count == 0) ? $tokenNo : $this->generateTokenNo();
    }

	public function makepayment(Request $request)
	{   
		$rules = [
		'payment' => 'required',
		];
	//DB::statement('TRUNCATE TABLE public.t_online_payment');
	$aesObj = new AESEncryptBase();

	$validator = Validator::make($request->all(), $rules);
	if ($validator->fails()) {
	return redirect('newtconnection')
	->withInput()
	->withErrors($validator);
	} 
	else 
	{
		$apltype = 'regular';
        $firmId = '1';
		$firmName = 'abc';
		$aplNo = $request->input('aplNo');
		$submissionId = $request->input('submission_id');
		$paymentType = $request->input('apl_type');
		$iniDate = date('d/m/Y');
		$payableAmount = 100;
		$firmMobile = '9999999999';
		$firmEmail = 'test@gmail.com';

		//head mapping for CTP
		$temPurpose = '1596-0215-01-103-00~';
		$taxType = 'WDREC';
		$taxPeriodFrom = '09/07/2024';
		$taxPeriodTo = '12/07/2024';
		$purpose = $temPurpose . $payableAmount;

		$merchantId = 1000606;
		$transactionId = $this->transactionId();
		$tokenNo = $this->generateTokenNo();
		$RU = 'http://10.154.3.99/rnbbillingsystem/payment_response';
		$DU = 'http://10.154.3.99/rnbbillingsystem/payment_handshake';
		$data = 'User_id=' . $firmId . '|Init_date=' . $iniDate . '|Transaction_id=' . $transactionId . '|Tax_type=' . $taxType . '|RegNo=' . $firmId . '|Name=' . $firmName . '|Token_no=' . $tokenNo . '|Total_amount=' . $payableAmount . '|Phone_no=' . $firmMobile . '|Email_id=' . $firmEmail . '|Tax_period_from=' . $taxPeriodFrom . '|Tax_period_to=' . $taxPeriodTo . '|Purpose=' . $purpose . '|MerchantId=' . $merchantId;
		/*$key ="aB3dE6gH9jK2mN7pQ4rS8vT5xZ1yC0f";
		$iv = "aB3dE6gH9jK2mN7a";//16 character iv
		$enc_method = "AES-128-CBC";
		$trd = trim($data);
		$encdata = openssl_encrypt($trd, $enc_method, $key, $options = 0, $iv);
		$encryptedDU = openssl_encrypt($DU, $enc_method, $key, $options = 0, $iv);*/
		$encryptedDU = $aesObj->encrypt($DU);
		$encdata = $aesObj->encrypt($data);
        $params = [
			$firmId,
			$firmName,
			$aplNo,
			$submissionId,
			$paymentType,
			$paymentType, // Note: $paymentType is repeated as in your original code
			$transactionId,
			$tokenNo,
			$iniDate,
			$taxType,
			$payableAmount,
			$firmMobile,
			$firmEmail,
			$taxPeriodFrom,
			$taxPeriodTo,
			$purpose,
			$merchantId,
			$RU,
			$DU,
			$data,
			$encdata,
			1,
			1,
			1,
			1,
			1,
			1,
			1
		];
		// Execute the stored procedure
		$result = DB::select('CALL add_online_payment(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', $params);
		// print_r($result);exit;
		// Assuming $result is a non-empty array and fetching the first row
		$priResponse = json_decode($result[0]->_response, true);
		if ($priResponse['code'] == 1) 
		{
		    $a = array('CTP_DATA' => $encdata, 'Dept_call' => 'first', 'RU' => $RU, 'DU' => $encryptedDU);
			echo json_encode($a);
		} else 
		{
			echo $priResponse[0];
		}
	}
}
    public function payment_handshake(Request $request)
    { 
		
		$this->_viewContent['data'] = $this->paymentHandshake($request->input('enc_data'));
	  
	   return view( \Config::get( 'app.theme' ) . '.billgenerate.payment_handshake.blade',  $this->_viewContent );
    }
   
    public function paymentHandshake($data)
    {
        $aesObj = new AESEncryptBase();
		$decryptedString = $aesObj->decrypt($data);
		$myArray = explode('|', $decryptedString);
	//	$transactionId = (explode('=', $myArray[1]))[1];
		$transactionId = 831447240712110831;
	//	$userId = (explode('=', $myArray[2]))[1];
		$userId = 1;
		if (!Session::has('USER')) {
            Session::put('USER', [
                'ID' => '0',
                'ROLEID' => '0',
                'DESIGNATIONID' => '0',
                'OFFICEID' => '0',
                'IPADDRESS' => '',
                'MACADDRESS' => '',
                'LOGINPARAMS' => '',
            ]);
        }
		$userData = Session::get('USER');
		$data='User_id=1|Init_date=12/07/2024|Transaction_id=831447240712110831|Tax_type=WDREC|RegNo=1|Name=abc|Token_no=985467240712110831|Total_amount=100|Phone_no=9999999999|Email_id=test@gmail.com|Tax_period_from=09/07/2024|Tax_period_to=12/07/2024|Purpose=1596-0215-01-103-00~100|MerchantId=1000606';
		$encData='4uSf7fZ9EiNmbQRU0BazDAUzl5FqCprCWK8GMnwrWQk+i90nnHan8VZ0ugo26+57VcPUqKxeB3WouUnxhXEzZOmkJMn1GXxzLgpks4zSlETk2CZ00C3IG46LfhPUeU1N1fgZBnZyoInHiRokdqmPCgYNrQQLDahiP0fqAPg2PXJmvyxlI4MixTcIngwAS/OgDfMa9LVbL/o4NUOKmGOEj4FlFdi+TuIoy4UGz85ftQiQ88XHm0Fdp1ZA4Z76SFbiqvoagcs/PwAGqB7HB3aS1YQrrilES79XRjKvViVUVIih8fpDdgsUka7BazNL6qDGfkpu7Fy7bVA5LyLlgwiVClTZgLurwbWAmpz7v/O2aMMsvHEEKMkwBdQppRR79hSfThcnSNEuwFbbo2lbmCYCfQ==';
        $req = json_encode(array('tokenValid' => 'true', 'transactionId' => $transactionId, 'useId' => $userId));

		// Prepare the stored procedure call
        $schema = env('DB_SCHEMA', 'public'); // Replace 'your_schema' with your actual schema name
        $spStr = sprintf(
            "CALL %s.update_online_payment_kp('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', 'get_response')",
            $schema,
            $transactionId,
            $data,
            $encData,
            $req,
            $userData['ID'],
            $userData['ROLEID'],
            $userData['DESIGNATIONID'],
            $userData['OFFICEID'],
            $userData['IPADDRESS'],
            $userData['MACADDRESS'],
            $userData['LOGINPARAMS']
        );
		// Execute the stored procedure
		$formHtml = '<form  method="POST" id="ctps" name="ctps" action="https://cybertreasuryuat.gujarat.gov.in/CyberTreasury_UAT/connectDept?service=DeptPortalConnection">';
		$formHtml .= '<input id="dept_call" type="hidden" name="Dept_call" value="second">';
		$formHtml .= '<input id="token_valid" type="hidden" name="token_valid" value="true">';
		$formHtml .= '<input  id="Transaction_id" type="hidden" name="Transaction_id" value="' . $transactionId . '">';
		$formHtml .= '<input  id="User_id" type="hidden" name="User_id" value="1">';
		$formHtml .= '</form>';
		$formHtml .= '<script type="text/javascript">';
		$formHtml .= 'document.getElementById("ctps").submit();';
		$formHtml .= '</script>';
			// Return the form HTML as a response
			return response($formHtml);
        try {
            $result = DB::select($spStr);
            $priResponse = json_decode($result[0]->get_response, true);
            
            // Return the response
            return response()->json($priResponse);
        } catch (\Exception $e) {
            // Handle exception
            return response()->json(['error' => $e->getMessage()], 500);
        }
    
    }
	public function payment_response(Request $request)
	{
		dd($request);
	}
}