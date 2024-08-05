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
				<form method="POST" action="{{ url('saveregistration') }}"  name="saveregistration" id="saveregistration" enctype="multipart/form-data"> 
					<input type='hidden' name='_token' value="{{ csrf_token() }}" />
					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="payment mode">Customer Number</label>
							<input type="text" class="form-control" id="customer_no" name="customer_no" value ="" required>  
						</div>
					</div>	
					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="totalamount"> Mobile Number </label>
							<input type="text" class="form-control" id="mobile_no" name="mobile_no" value="" required maxlength="10" minlength="10">
						</div>
					</div>	
					<div class="form-row">	
					    <div class="form-group col-md-12">
							<label for="totalamount"> Email Id</label>
							<input type="text" class="form-control" id="email_id" name="email_id" value ="" required> 
						</div>
					</div>	
					<div class="form-row">	
						<div class="form-group col-md-12">
							<label for="totalamount">Password</label>
							<input type="text" class="form-control" id="password" name="password" value ="" required>
						</div>
					</div>	
					<div class="form-row">	
						<div class="form-group col-md-12">
							<label for="totalamount"> Retype Password</label>
							<input type="text" class="form-control" id="c_password" name="c_password" value ="" required>
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Registration</button>
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


