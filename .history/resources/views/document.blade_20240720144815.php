
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challan Form</title>
    <style>
        body {
            font-family: 'examplefont', sans-serif;
        }
        table, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        td {
            padding: 10px;
        }
        table {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div>
        <div class="row">
            <div class="col-xs-2" style="float: left; width: 50%;">PHONE NO: 079-23259167-68</div>
            <div class="col-xs-2" style="float: right; width: 50%;">Challan No</div>
        </div>
        <h3>Challan of Cheque paid to the State Bank of India, Gandhinagar.</h3>
        <hr>
        <div style="float: left; width: 50%;">
            To be filled by the Remitter
        </div>
        <div style="float: right;">
            To be filled up by the departmental officer of the Treasury
        </div>
        <div style="float: left; width: 50%;">
            Name: Shri xyz <br>
            Designation:
        </div>
        <div style="float: right; width: 50%;">
            Head of Account:
        </div>
        <div class="row">
            <div class="col-md-6">
                By whom rendered
            </div>
        </div>
  
        <table class="padd-3 border-tbl_bdr font-13 text-b mt-25" cellspacing="0" colspacing="0" style="width: 90%;">
      <tbody> 
        <tr class= "bg-dark">
          <td colspan="3" class="text-left">Full Particulars of the remittance & the authotity (if any)</td>
        </tr> 
        <tr>
          <td colspan="3">P.W. Remittance by <br>Cheque/D.D. Details as Under:</td>
        </tr>
        <tr>
          <td><b>Customer No</b></td>
          <td>: </td>
          <td>{{ $data['cust_no'] }}</td>
        </tr>
        <tr>
          <td><b>Name</b></td>
          <td>: </td>
          <td>{{ $data['cust_name']  }}</td>
        </tr>
        <tr>
          <td><b>Sector</b></td>
          <td>: </td>
          <td>{{ $data['sector_no']  }}</td>
        </tr>
        <tr>
          <td><b>Plot No</b></td>
          <td>: </td>
          <td>{{ $data['plot_no']  }}</td>
        </tr>
        <tr>
          <td><b>Cheque No:</b></td>
          <td>: </td>
          <td>{{ $data['cheque_no']  }}</td>
        </tr>
        <tr>
          <td><b>Date</b></td>
          <td>: </td>
          <td>{{$data['created_at']  }}</td>
        </tr>
        <tr>
          <td><b>Bank</b></td>
          <td>: </td>
          <td>{{ $data['bank_name']  }}</td>
          </tr>
          <tr>
          <td><b>Branch</b></td>
          <td>: </td>
          <td>{{ $data['branch_name']  }}</td>
        </tr>
        <tr>
          <td><b>Total Amount Rs.</b></td>
          <td>: </td>
          <td>{{ $data['amount']  }}</td>
          </tr>
          <tr>
          <td><b>Rupees in Words</b></td>
          <td>: </td>
          <td>{{$data['amountword']  }}</td>
        </tr>
        <tr>
          <td colspan="3"><b>Rupees Nil:</b></td>
        </tr>
        <tr>
          <td colspan="3"><b>For Water and Drainage Charges Year Deposit:</b></td>
        </tr>
        
       
        
      </tbody>
    </table>
    <table cellspacing="0" cellpadding="0" style="width:50%; padding-left: 10px; float: left;" class="font-13 text-b mt-25">
  <tbody>
    <tr><td colspan="2">To be filled up by the departmental officer of the Treasury</td></tr>
    <tr><td>Head of Account:</td><td><b>8754 Cash Remettance</b></td></tr>
    <tr><td>Remitteance:</td><td>P.W. Remittance <br>1<sup>st</sup> Payment into Try <br> on The A/C. the Ex. Engr<br> C.P. Dn-No.3, Gandhinagar</td></tr>
    <tr><td class="padd_top50">1<sup>st</sup> Payment into Treasury on the <br> A/c. of</td></tr>
    <tr><td class="padd_top25">Executive Engineer <br> Capital Project Division-3,<br> Gandhinagar</td></tr>
    <tr><td class="padd_top50">Correct Received and Grant Receipt</td></tr>
    <tr><td colspan="2" class="bold padd_top50">Date : 32-09-2025</td></tr>
    <tr><td colspan="2" class="bold padd_top50">Deputy Executive Enginee<br> Capital Project Sub Division-9 <br> Gandhinagar</td></tr>
    <tr><td colspan="2" class="bold padd_top50">(Signature and Full Designation ordering money to be paid in)</td></tr>
    <tr><td colspan="2" class="bold padd_top50">To be Used only in the Cash remittance of the Band Through and officer of Paid in</td></tr>
    <tr><td colspan="2" class="bold padd_top50">Date: 30-11-2013</td></tr>
    
  </tbody>
</table>
            <div style="float: right; width: 40%; margin-top: 10px;">
                Executive Engineer,<br>Capital Project Division-3,<br>Gandhinagar
            </div>
            <div style="float: right; width: 40%; margin-top: 20px;">
                Correct Received and Grant Receipt
            </div>
            <div style="float: right; width: 40%; margin-top: 20px;">
                <b>Date:</b>
            </div>
            <div style="float: right; width: 40%; margin-top: 30px;">
                <b>Deputy Executive Engineer</b><br>Capital Project Sub Division-10<br>Gandhinagar
            </div>
            <div style="float: right; width: 40%; margin-top: 100px;">
                (Signature and seal Designation ordering money to be paid in)
            </div>
            <div style="float: right; width: 40%; margin-top: 50px;">
                To be Used only in the Cash remittance of the Bank Through an Officer of Paid in
            </div>
            <div style="float: right; width: 40%; margin-top: 30px;">
                <b>Date:</b>
            </div>
        </div>
        <div class="row" style="margin-top: 15px;">
            <b>Deputy Executive Engineer,<br>Capital Project Sub Division-10,<br>Gandhinagar. Phone: 23259168</b>
        </div>
        <div style="margin-top: 15px;">Received Payment</div>
        <table style="margin-top: 15px; border: none;">
            <tr>
                <th style="width: 25%; padding: 10px;">Treasurer</th>
                <th style="width: 25%; padding: 10px;">Accountant</th>
                <th style="width: 25%; padding: 20px;">Treasury Officer</th>
                <th style="width: 25%; padding: 10px;">Agent</th>
            </tr>
        </table>
    </div>
</body>
</html>
