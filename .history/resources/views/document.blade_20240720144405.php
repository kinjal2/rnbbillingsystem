
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challan Form</title>
    <style>
      @page { size: A4 portrait; margin: 20px 20px;}
        body {font-family: 'Poppins', sans-serif; /* background-image: url("logo.png"); background-repeat: repeat-y; */  -webkit-print-color-adjust: exact; }
      footer {display: block;/*position: fixed;*/bottom: 0px;left:0;width: 100%; padding-top: 50px;}
      .page-break {page-break-before: always;}
      h2 {font-size : 18px; line-height: 1.5; margin: 0;}
      h3 {font-size : 12px; line-height: 1.5; margin: 0;}
      h5 {font-size : 13px; line-height: 1.5; margin: 0;}
      table, th, td {border: 0px;line-height:1.2;border-collapse: collapse;}
      .border-tbl_bdr{border: 1px solid #003b64 !important;}
      .border-tbl_bdr_td td{border: 1px solid #003b64 !important; font-size: 12px; padding: 3px;}
      .border-tbl_bdr tr td b{color:#022869;}
      .border-tbl_bdr_td_left td{border: 1px solid #003b64 !important; font-size: 11px; text-align:left; padding: 3px;}
      .border-tbl_bdr_td th{border: 1px solid #003b64 !important; font-size: 12px; padding: 3px; line-height: 1.5;}
      .bg-dark{background:#006ec6; color:#fff;}
      .bg-light{background:#48c0ee; color:#fff;}
      .bg-light1{background:#e3700b; color:#fff;}
      .text-red{color:#b0070d;}
      .text-blue{color:#022869;}
      .text-center{text-align:center;}
      .text-left{text-align:left;}
      .text-right {text-align:right;}
      .top-right{text-align: right; font-weight: bold;font-size: 14px;}
      .top-right span{text-transform: uppercase;}
      .font-12 tr td{font-size: 10px; text-align: center;}
      .font-13 tr td{font-size: 13px; line-height: 1.5;}
      .mt-5{margin-top:10px;}
      .mt-25{margin-top:25px;}
      .mt-50{margin-top:50px;}
      .bold{font-weight: bold;}
      .uppercase{text-transform: uppercase;}
      .capitazile{text-transform: capitalize !important;}
      .padd-3 tr td { padding: 5px; vertical-align: top; line-height: 1.5; font-size: 13px;}
      .padd_top10{padding-top: 10px;}
      .padd_top25{padding-top: 25px;}
      .padd_top50{padding-top: 40px;}
      .padd_top100{padding-top: 100px;}
      .text-capitalize{text-transform: capitalize;}
      .text-uppercase{text-transform: uppercase;}
      .text-lowercase{text-transform: lowercase;}
      /* .text-b tr td b{color:#003b64;} */
      .cash-block {display: block;text-align: center;font-size: 15px;font-weight: bold;text-decoration: underline;text-transform: uppercase;margin-top: 10px;}
      .padd_eql_lr {padding: 0px 25px;}
      .left-right {display: flex;justify-content: space-between;}
      .border-bottom{border-bottom: 2px solid #222222;}
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
