<html>
<head>
    <meta charset="utf-8">
    <title>Test PDF</title>
   <style>
    /* @page { size: A4 portrait; margin: 20px 20px;} */
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
    <h2 class="text-center mt-25">This is a test PDF</h2>
    <p class="text-center">If you see this text, the basic PDF generation is working.</p>
</body>
</html>