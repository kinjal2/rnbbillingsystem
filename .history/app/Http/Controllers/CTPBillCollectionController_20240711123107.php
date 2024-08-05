<?php  namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class CTPBillCollectionController extends Controller
{
   
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
	DB::statement('TRUNCATE TABLE public.t_online_payment');
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
		$taxPeriodTo = '09/07/2024';
		$purpose = $temPurpose . $payableAmount;

		$merchantId = 1000606;
		$transactionId = $this->transactionId();
		$tokenNo = $this->generateTokenNo();
		$RU = 'http://10.154.3.99/rnbbillingsystem/payment_response';
		$DU = 'http://10.154.3.99/rnbbillingsystem/payment_handshake';
		$data = 'User_id=' . $firmId . '|Init_date=' . $iniDate . '|Transaction_id=' . $transactionId . '|Tax_type=' . $taxType . '|RegNo=' . $firmId . '|Name=' . $firmName . '|Token_no=' . $tokenNo . '|Total_amount=' . $payableAmount . '|Phone_no=' . $firmMobile . '|Email_id=' . $firmEmail . '|Tax_period_from=' . $taxPeriodFrom . '|Tax_period_to=' . $taxPeriodTo . '|Purpose=' . $purpose . '|MerchantId=' . $merchantId;
		$key ="aB3dE6gH9jK2mN7pQ4rS8vT5xZ1yC0f";
		$iv = "aB3dE6gH9jK2mN7a";//16 character iv
		$enc_method = "AES-128-CBC";
		$trd = trim($data);
		$encdata = openssl_encrypt($trd, $enc_method, $key, $options = 0, $iv);
		$encryptedDU = openssl_encrypt($DU, $enc_method, $key, $options = 0, $iv);
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
			$formData = [
			'CTP_DATA' => $encdata,
			'Dept_call' => 'first',
			'RU' => $RU,
			'DU' => $encryptedDU,
			];
			//error_log($formData);
			if (isset($transactionId) && !empty($transactionId) && isset($firmId) && !empty($firmId)) 
			{
				// Debug output to ensure we enter the if condition
				echo 'Debug: Entered the if condition<br>';
				// Generate form HTML
				$formHtml = '<form  method="POST" id="ctp" name="ctp" action="https://cybertreasuryuat.gujarat.gov.in/CyberTreasury_UAT/connectDept?service=DeptPortalConnection">';
				$formHtml .= '<input id="ctp_data" type="hidden" name="CTP_DATA" value="' . $encdata . '">';
				$formHtml .= '<input id="dept_call" type="hidden" name="Dept_call" value="first">';

				$formHtml .= '<input  id="ru" type="hidden" name="RU" value="' . $RU . '">';
				$formHtml .= '<input  id="du" type="hidden" name="DU" value="' . $encryptedDU . '">';
				$formHtml .= '</form>';

				// Debug output to check the generated form HTML
				echo 'Debug: Form HTML generated<br>';
				echo 'Form HTML: ' . htmlspecialchars($formHtml) . '<br>'; // This will print the raw HTML
				// Output the form HTML
				echo $formHtml;
			//exit;
			} else 
			{
				echo 'Transaction ID or Firm ID is not set.<br>';
			//  exit;
			}
			$formHtml .= '<script type="text/javascript">';
			$formHtml .= 'document.getElementById("ctp").submit();';
			$formHtml .= '</script>';
			// Return the form HTML as a response
			return response($formHtml);
		} else 
		{
			echo $priResponse[0];
		}
	}
}
    public function payment_handshake(Request $request)
    { 
	dd($request);
      /*  $request->validate([
            'enc_data' => 'required|string',
        ]);*/
       // dd($request);
        // Process the enc_data using the OnlinePayment service
        $data = $this->paymentHandshake($request->input('enc_data'));

        // Generate the form HTML
        $formHtml = view(\Config::get( 'app.theme' ) .'.billgenerate.payment_handshake', ['data' => $data])->render();

        return response($formHtml);
    }
   
    public function paymentHandshake($data)
    {

        echo "<pre>";print_r($data);die("hnd");
        //$this->db->log(__FILE__ . "-" . __LINE__ . date('his') . json_encode($_POST));
        $key ="aB3dE6gH9jK2mN7pQ4rS8vT5xZ1yC0f";
        $iv = "aB3dE6gH9jK2mN7a";//16 character iv

        $enc_method = "AES-128-CBC";


        $encdata = openssl_decrypt($data, $enc_method, $key, $options = 0, $iv);

        $myArray = explode('|', $encdata);

        $transactionId = (explode('=', $myArray[1]))[1];

        $userId = (explode('=', $myArray[2]))[1];

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
