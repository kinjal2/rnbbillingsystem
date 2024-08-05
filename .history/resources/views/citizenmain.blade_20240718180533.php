@include('master_theme/header')
<!--/.header-wrapper-->
@include('master_theme/navbar')
<section id="fontSize" class="wrapper body-wrapper ">



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


