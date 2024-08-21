<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BIlling</title> </head>
<body id="body">

    <main id="main">

        <div class="app-content content container-fluid">
            <div class="content-wrapper">
                <div class="content-body">

                    <!-- Registration form start here -->
                    <div role="tabpanel" aria-labelledby="heading2">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-form-center">Payment Receipt Details</h4>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                        </div>

                        <div class="card-body row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;" colspan="2" scope="col">-: Payment Receipt :-</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="width: 50%;">Reg Id</td>
                                                <td style="width: 50%;">{{ $data['regNo'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Firm Id</td>
                                                <td>{{ $data['userId'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Firm Name</td>
                                                <td>{{ $data['firmName'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Application Type</td>
                                                <td>{{ $data['aplType'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Paid Amount (Rs.)</td>
                                                <td>{{ $data['amount'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Ayudmla Transaction No</td>
                                                <td>{{ $data['transactionId'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Ayudmla Transaction Date</td>
                                                <td>{{ $data['payDate'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Payment Gateway CIN</td>
                                                <td>{{ $data['cin'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Payment Gateway Bank Name</td>
                                                <td>{{ $data['bankName'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Payment Gateway Bank Reference No</td>
                                                <td>{{ $data['bankRefNo'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Payment Gateway DLR Reference No</td>
                                                <td>{{ $data['dlrRefNo'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Payment Gateway Status</td>
                                                <td>{{ $data['status'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Payment Gateway Status Description</td>
                                                <td>{{ $data['statusDesc'] }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5"></div>
                            <div class="col-md-4">
                                <button onClick="window.print()" name="submit_button" class="btn btn-primary">Print</button>
                                <a href="{{ route('citizendetails') }}">
                                    <button type="button" class="btn btn-warning mr-1">
                                        <i class="icon-cross2"></i>GO Back
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Registration form end here -->
            </div>
        </div>
    </main>
</body>
	</html>