<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Redirecting...</title>
</head>
<body onload="document.forms['ctps'].submit()">

<form method="POST" id="ctps" name="ctps" action="https://cybertreasuryuat.gujarat.gov.in/CyberTreasury_UAT/connectDept?service=DeptPortalConnection">
    <input type="hidden" name="Dept_call" value="second">
    <input type="hidden" name="token_valid" value="{{ $data['tokenValid'] }}">
    <input type="hidden" name="Transaction_id" value="{{ $data['transactionId'] }}">
    <input type="hidden" name="User_id" value="{{ $data['useId'] }}">
</form>

</body>
</html>
