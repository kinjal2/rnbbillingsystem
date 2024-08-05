@include('master_theme/header')
<!--/.header-wrapper-->
@include('master_theme/navbar')
<section id="fontSize" class="wrapper body-wrapper ">
<!-- <div class="bg-wrapper top-bg-wrapper gray-bg padding-top-bott">
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
							<input type="text" class="form-control" id="customer_no" name="customer_no" value ="" >  
						</div>
					</div>	
					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="totalamount"> Mobile Number </label>
							<input type="text" class="form-control" id="mobile_no" name="mobile_no" value=""  maxlength="10" minlength="10">
						</div>
					</div>	
					<div class="form-row">	
					    <div class="form-group col-md-12">
							<label for="totalamount"> Email Id</label>
							<input type="text" class="form-control" id="email_id" name="email_id" value ="" > 
						</div>
					</div>	
					<div class="form-row">	
						<div class="form-group col-md-12">
							<label for="totalamount">Password</label>
							<input type="text" class="form-control" id="password" name="password" value ="" >
						</div>
					</div>	
					<div class="form-row">	
						<div class="form-group col-md-12">
							<label for="totalamount"> Retype Password</label>
							<input type="text" class="form-control" id="c_password" name="c_password" value ="" >
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
</div> -->







<div class="form_wrapper">
  <div class="form_container">
    <div class="title_container">
      <h2 style="padding: 0;"> Citizen login Form</h2>
    </div>
    <div class="row clearfix">
      <div class="">
      <form method="POST" action="{{ url('saveregistration') }}"  name="saveregistration" id="saveregistration" enctype="multipart/form-data"> 
      <input type='hidden' name='_token' value="{{ csrf_token() }}" />
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
            <input type="text" id="customer_no" name="customer_no" placeholder="Customer Number" required />
          </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-phone"></i></span>
            <input type="text"  id="mobile_no" name="mobile_no" placeholder="Mobile Number" maxlength="10" minlength="10" required />
          </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
            <input type="email" id="email_id" name="email_id" placeholder="Email" required />
          </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
            <input type="password" id="password" name="password" placeholder="Password" required />
          </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
            <input type="password" id="c_password" name="c_password" placeholder="Re-type Password" required />
          </div>
          <!-- <div class="row clearfix">
            <div class="col_half">
              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                <input type="text" name="name" placeholder="First Name" />
              </div>
            </div>
            <div class="col_half">
              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                <input type="text" name="name" placeholder="Last Name" required />
              </div>
            </div>
          </div> -->
            	<!-- <div class="input_field radio_option">
              <input type="radio" name="radiogroup1" id="rd1">
              <label for="rd1">Male</label>
              <input type="radio" name="radiogroup1" id="rd2">
              <label for="rd2">Female</label>
              </div>
              <div class="input_field select_option">
                <select>
                  <option>Select a country</option>
                  <option>Option 1</option>
                  <option>Option 2</option>
                </select>
                <div class="select_arrow"></div>
              </div> -->
            <!-- <div class="input_field checkbox_option">
            	<input type="checkbox" id="cb1">
    			<label for="cb1">I agree with terms and conditions</label>
            </div>
            <div class="input_field checkbox_option">
            	<input type="checkbox" id="cb2">
    			<label for="cb2">I want to receive the newsletter</label>
            </div> -->
          <input class="button" type="submit" value="Register" />
        </form>
      </div>
    </div>
  </div>
</div>






</section>
@include('master_theme/footer')
</body>
</html>


