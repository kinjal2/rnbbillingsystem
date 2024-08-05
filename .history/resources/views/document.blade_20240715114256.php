{{dd($data['cust_no'])}}
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
        <div class="row">
            <div style="float: left; width: 60%;">
                <table>
                    <tr><td>Full Particulars of the remittance <br> & the authority (if any)</td></tr>
                    <tr><td>P.W. Remittance by <br>Cheque/D.D. Details as Under:</td></tr>
                    <tr><td>Customer No: {{ $data['cust_no'] }}</td></tr>
                    <tr><td>Name: {{ $data['cust_name']  }}</td></tr>
                    <tr><td>Sector: {{ $data['sector_no']  }}</td></tr>
                    <tr><td>Plot No: {{ $data['plot_no']  }}</td></tr>
                    <tr><td>Cheque No: {{ $data['cheque_no']  }}</td></tr>
                    <tr><td>Date: {{$data['created_at']  }}</td></tr>
                    <tr><td>Bank: {{ $data['bank_name']  }}</td></tr>
                    <tr><td>Branch: {{ $data['branch_name']  }}</td></tr>
                    <tr><td>Total Amount Rs.: {{ $data['amount']  }}</td></tr>
                    <tr><td>Rupees in Words: {{$data['amountword']  }}</td></tr>
                    <tr><td>Rupees Nil:</td></tr>
                    <tr><td>For Water and Drainage Charges Year Deposit:</td></tr>
                </table>
            </div>
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
