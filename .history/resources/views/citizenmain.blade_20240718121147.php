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

<div class="container-fluid">
  <table class="rwd-table">
    <tbody>
      <tr>
        <th style="width: 3%;">Sl. No.</th>
        <th>Property</th>
        <th  style="width: 20%;">Name & Address</th>
        <th>Annual Value</th>
        <th>Tax/ Half Year</th>
        <th>Class & Category <br><small>Building Type</small></th>
        <th>Total Dues</th>
        <th> Credit Balance</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
      <tr>
        <td data-th="Sl. No.">1</td>
        <td data-th="Property">
          <div class="property_text">
            <p>New Bill Number:</p>
            <p>08/097/013202</p>
          </div>
          <div class="property_text">
            <p>Existing Bill Number:</p>
            <p>08/097/13202/000</p>
          </div>

        </td>
        <td data-th="Name & Address">
        <div class="flex flex-col gap-1.5">
          <div class="flex flex-col gap-0.5">
            <div class="font-sm">Name:</div>
            <div class="bg_name">S.A.SABARI NATHAN</div>
            <div class="font-sm">Address:</div>
            <div class="bg_address">89(42), PALAYAM PILLAI NAGAR 1ST AND 2ND STREET, AYANAVARAM, AYANAVARAM, Chennai - 600023</div>
          </div>
          <div class="font-sm">Mobile Number:</div>
          <div class="bg_mobile">9824091623</div>
        </div>

        </td>
        <td data-th="Annual Value">
        ₹87,097.00<br><small>(22-23/I (Apr-Sep))</small>

        </td>
        <td data-th="Tax/ Half Year">
        ₹3,048.00
        </td>
        <td data-th="Class & Category Building Type">
        001 - Domestic-F-UM <br><small>(2019/04)</small>
        </td>
        <td  data-th="Total Dues">5345346</td>
        <td  data-th=" Credit Balance"> 4634634</td>
        <td  data-th="Status"><span class="clr_green">Active</span></td>
        <td  data-th="Actions"><a class="btn btn-primary">select</a></td>
      </tr>
      <tr>
        <td data-th="Sl. No.">1</td>
        <td data-th="Property">
          <div class="property_text">
            <p>New Bill Number:</p>
            <p>08/097/013202</p>
          </div>
          <div class="property_text">
            <p>Existing Bill Number:</p>
            <p>08/097/13202/000</p>
          </div>

        </td>
        <td data-th="Name & Address">
        <div class="flex flex-col gap-1.5">
          <div class="flex flex-col gap-0.5">
            <div class="font-sm">Name:</div>
            <div class="bg_name">S.A.SABARI NATHAN</div>
            <div class="font-sm">Address:</div>
            <div class="bg_address">89(42), PALAYAM PILLAI NAGAR 1ST AND 2ND STREET, AYANAVARAM, AYANAVARAM, Chennai - 600023</div>
          </div>
          <div class="font-sm">Mobile Number:</div>
          <div class="bg_mobile">9824091623</div>
        </div>

        </td>
        <td data-th="Annual Value">
        ₹87,097.00<br><small>(22-23/I (Apr-Sep))</small>

        </td>
        <td data-th="Tax/ Half Year">
        ₹3,048.00
        </td>
        <td data-th="Class & Category Building Type">
        001 - Domestic-F-UM <br><small>(2019/04)</small>
        </td>
        <td  data-th="Total Dues">5345346</td>
        <td  data-th=" Credit Balance"> 4634634</td>
        <td  data-th="Status"><span class="clr_red">Deactive</span></td>
        <td  data-th="Actions"><a class="btn btn-primary">select</a></td>
      </tr>
      <tr>
        <td data-th="Sl. No.">1</td>
        <td data-th="Property">
          <div class="property_text">
            <p>New Bill Number:</p>
            <p>08/097/013202</p>
          </div>
          <div class="property_text">
            <p>Existing Bill Number:</p>
            <p>08/097/13202/000</p>
          </div>

        </td>
        <td data-th="Name & Address">
        <div class="flex flex-col gap-1.5">
          <div class="flex flex-col gap-0.5">
            <div class="font-sm">Name:</div>
            <div class="bg_name">S.A.SABARI NATHAN</div>
            <div class="font-sm">Address:</div>
            <div class="bg_address">89(42), PALAYAM PILLAI NAGAR 1ST AND 2ND STREET, AYANAVARAM, AYANAVARAM, Chennai - 600023</div>
          </div>
          <div class="font-sm">Mobile Number:</div>
          <div class="bg_mobile">9824091623</div>
        </div>

        </td>
        <td data-th="Annual Value">
        ₹87,097.00<br><small>(22-23/I (Apr-Sep))</small>

        </td>
        <td data-th="Tax/ Half Year">
        ₹3,048.00
        </td>
        <td data-th="Class & Category Building Type">
        001 - Domestic-F-UM <br><small>(2019/04)</small>
        </td>
        <td  data-th="Total Dues">5345346</td>
        <td  data-th=" Credit Balance"> 4634634</td>
        <td  data-th="Status">Active</td>
        <td  data-th="Actions"><a class="btn btn-primary">select</a></td>
      </tr>
      
      
    </tbody>
  </table>

</div>

<div class='clearfix'></div>
<div class='center' style = "margin-top:3%; margin-bottom:5%">

        <ul class="press">
          <li>
          New Bill Number: <span class="sr-only">08/097/013202
          </span>
          </li>
          <li>
          Existing Bill Number:: <span class="sr-only">08/097/13202/000</span>
          </li>
          <li>
          Name: <span class="sr-only">S.A.SABARI NATHAN</span>
          </li>
          <li>
          Address: <span class="sr-only">89(42), PALAYAM PILLAI NAGAR 1ST AND 2ND STREET, AYANAVARAM, AYANAVARAM, Chennai - 600023</span>
          </li>
            
        </ul>
</div>

<div class="container">
<div class="col-md-7">
  <div class="align-self-center b-head-in top-banner-heading">
                    <h2 class="text-center b-left-head">Water/Drainage Connection Billing System</h2>
                    
                    <div class="d-flex flex-column news-login-container">
                        <p class="font-14"><span class="vc">* New</span> Water/Drainage Connection Billing System is a government agency of the Government of Gujarat, a state of India. It was founded in 1982 to control, manage and operate the minor ports of Gujarat.</p>
                        <p class="font-14"><span class="vc">* New</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <p class="font-14"><span class="vc">* New</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    </div>
              </div> </div>


<div class="col-md-5">

<div class="form_wrapper">
  <div class="form_container">
    <div class="title_container">
      <h2 style="padding: 0;"> Citizen Registration Form</h2>
    </div>
    <div class="row clearfix">
      <div class="">
      <form method="POST" action="{{ url('saveregistration') }}" name="saveregistration" id="saveregistration" enctype="multipart/form-data"> 
                        @csrf
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                            <input type="text" id="customer_no" name="customer_no" placeholder="Customer Number" value="{{ old('customer_no') }}" required />
                        </div>
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-phone"></i></span>
                            <input type="text" id="mobile_no" name="mobile_no" placeholder="Mobile Number" value="{{ old('mobile_no') }}" maxlength="10" minlength="10" required />
                        </div>
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                            <input type="email" id="email_id" name="email_id" placeholder="Email" value="{{ old('email_id') }}" required />
                        </div>
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                            <input type="password" id="password" name="password" placeholder="Password" required />
                        </div>
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                            <input type="password" id="c_password" name="c_password" placeholder="Re-type Password" required />
                        </div>
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <input class="button" type="submit" value="Register" />
                    </form>
      </div>
    </div>
  </div>
</div>

<div class="form_wrapper">
  <div class="form_container">
    <div class="title_container">
      <h2 style="padding: 0;"> Citizen login Form</h2>
    </div>
    <div class="row clearfix">
    <!--<div class="input_field radio_option">
              <input type="radio" name="radiogroup1" id="rd1">
              <label for="rd1">Male</label>
              <input type="radio" name="radiogroup1" id="rd2">
              <label for="rd2">Female</label>
              </div>-->
      <div class="">
      <form method="POST" action="{{ url('userlogin') }}"  name="userlogin" id="userlogin" enctype="multipart/form-data"> 
      <input type='hidden' name='_token' value="{{ csrf_token() }}" />
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
            <input type="text" id="customer_no1" name="customer_no1" placeholder="Customer Number" required />
          </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-phone"></i></span>
            <input type="text"  id="mobile_no1" name="mobile_no1" placeholder="Mobile Number" maxlength="10" minlength="10" required />
          </div>
         
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
            <input type="password" id="password1" name="password1" placeholder="Password" required />
          </div>
          
        
          <input class="button" type="submit" value="Login" />
        </form>
      </div>
    </div>
  </div>
</div>

</div>
</div>


</section>
@include('master_theme/footer')
<script src="{{ asset('home_theme/js/jquery.validate.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#saveregistration').validate({
            rules: {
                customer_no: {
                    required: true,
                    digits: true
                },
                mobile_no: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                email_id: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                c_password: {
                    required: true,
                    equalTo: "#password"
                }
            },
            messages: {
                customer_no: {
                    required: "Please enter your customer number",
                    digits: "Please enter only digits"
                },
                mobile_no: {
                    required: "Please enter your mobile number",
                    digits: "Please enter only digits",
                    minlength: "Mobile number must be 10 digits",
                    maxlength: "Mobile number must be 10 digits"
                },
                email_id: {
                    required: "Please enter your email",
                    email: "Please enter a valid email address"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 6 characters long"
                },
                c_password: {
                    required: "Please confirm your password",
                    equalTo: "Passwords do not match"
                }
            },
            errorElement: 'div',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    error.insertAfter(element);
                },
                highlight: function (element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid');
                }
        });
        $('#userlogin').validate({
            rules: {
                customer_no1: {
                    required: true,
                    digits: true
                },
                mobile_no1: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
               
                password1: {
                    required: true,
                    minlength: 6
                },
              
            },
            messages: {
                customer_no: {
                    required: "Please enter your customer number",
                    digits: "Please enter only digits"
                },
                mobile_no: {
                    required: "Please enter your mobile number",
                    digits: "Please enter only digits",
                    minlength: "Mobile number must be 10 digits",
                    maxlength: "Mobile number must be 10 digits"
                },
              
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 6 characters long"
                },
                
            },
            errorElement: 'div',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    error.insertAfter(element);
                },
                highlight: function (element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid');
                }
        });
    });
</script>

</body>
</html>


