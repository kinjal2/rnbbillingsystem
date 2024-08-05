@include('master_theme/header')
<!--/.header-wrapper-->
@include('master_theme/navbar')
<section id="fontSize" class="wrapper body-wrapper ">

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


