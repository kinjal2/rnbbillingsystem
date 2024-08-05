<html><head>
  <meta charset="utf-8">
  <title></title>
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

<table class="text-center" cellspacing="0" cellpadding="0" style="width:100%;">
  <tbody>
    <tr>
      <td class="text-blue text-left"><h3>Phone No: 079-23259165/66</h3></td>
      <td class="text-blue text-right"><h3>Challan No.(687)</h3></td>
    </tr>
    <tr><td class="text-blue padd_top10 border-bottom" colspan="2"><h2>Challan of Cash paid the State Bank of India, Gandhinagar</h2></td></tr>
  </tbody>
</table>

<table class=" mt-25" cellspacing="0" cellpadding="0" style="width:50%; float: left;">
  <tbody>
    <tr><td>
    <table class="padd-3" cellspacing="0" cellpadding="0" style="width:100%;">
      <tr><td>To be filled bt the Remitter</td></tr>
      <tr><td class="padd_top50">By whom rendered</td></tr>
      <tr><td class="padd_top25 text-uppercase">NAME.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b>C.M.vyas</b></span></td></tr>
      <tr><td class="padd_top10">& Designation.&nbsp;&nbsp;<span class="text-uppercase">SR. Clerk</span></td></tr>
      <!-- <tr><td class="padd_top10">(Name of Designation and address of the Person on whose behalf money is paid)</td></tr>
      <tr><td class="padd_top5">Deputy Executive Enginee,</td></tr>
      <tr><td class="padd_top5">Capital Project Sub Divison-9, Ghandhinagar. Phone:23259166</td></tr> -->
    </table>
  </td></tr>
  <tr><td>
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
  </td></tr>
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

<table cellspacing="0" cellpadding="0" style="width: 100%; padding-left: 10px;" class="font-13 text-b mt-25">
<tr><td colspan="3" class="bold padd_top25">Deputy Executive Enginee<br> Capital Project Sub Division-9 <br> Gandhinagar</td></tr>
<tr><td colspan="3"   class="padd_top25">Received Payment</td></tr>
<tr>
  <td class="padd_top25">Treasurey</td>
  <td class="padd_top25">Accountant</td>
  <td class="padd_top25">Treasury officer</td>
  <td class="padd_top25">Agent</td>
</tr>
</table>
</body>
</html>