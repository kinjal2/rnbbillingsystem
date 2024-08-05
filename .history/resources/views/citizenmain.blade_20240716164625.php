@include('master_theme/header')
<!--/.header-wrapper-->
@include('master_theme/navbar')
<section id="fontSize" class="wrapper body-wrapper ">

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


