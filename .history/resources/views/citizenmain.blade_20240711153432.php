@include('master_theme/header')
<!--/.header-wrapper-->
@include('master_theme/navbar')
<section id="fontSize" class="wrapper body-wrapper ">
<div class="bg-wrapper top-bg-wrapper gray-bg padding-top-bott">
	<div class="container body-container top-body-container padding-top-bott2">
		<div class="left-block">
			<div class="whats-new-maincontainer">
				<div id="feedTab">
					<ul class="resp-tabs-list feedTab_1 clearfix">
						<li> <a href="inner.html"><i class="fa fa-refresh"></i>Citizen Window</a></li>
					</ul>
            <div class="resp-tabs-container feedTab_1">
            <div class="white_card_body">
			<div class="card-body">
				<form method="POST" action="{{ url('savepayment') }}"  name="savepayment" id="savepayment" enctype="multipart/form-data"> 
					<input type='hidden' name='_token' value="{{ csrf_token() }}" />
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="payment mode">Select Payment Mode</label>
							{{ Form::select('pay_mode',[null=>'select payment mode']+ paymentStatus(),'',['id'=>'pay_mode','class'=>'form-control']) }}  
						</div>
						<div class="form-group col-md-6">
							<label for="totalamount"> Amount</label>
							<input type="text" class="form-control" id="total_amount" name="total_amount" value ="">
							<input type="hidden" class="form-control" id="cust_no" name="cust_no" value =""> 
						</div>
					</div>
					<div class="form-row bank" style='display:none;'>
						<div class="form-group col-md-4">
							<label for="totalamount"> Bank name</label>
							<input type="text" class="form-control" id="bank_name" name="bank_name" value ="" required> 
						</div>
						<div class="form-group col-md-4">
							<label for="totalamount"> Branch  name</label>
							<input type="text" class="form-control" id="branch_name" name="branch_name" value ="" required>
						</div>
						<div class="form-group col-md-4">
							<label for="totalamount"> Cheque number</label>
							<input type="text" class="form-control" id="cheque_no" name="cheque_no" value ="" required>
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Pay</button>
				</form>
			</div>
		</div>
            <div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
@include('master_theme/footer')
</body>
</html>


