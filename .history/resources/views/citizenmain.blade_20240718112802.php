@include('master_theme/header')
@include('master_theme/navbar')

<section id="fontSize" class="wrapper body-wrapper">
    <div class="form_wrapper">
        <div class="form_container">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="title_container">
                <h2 style="padding: 0;"> Citizen Register Form</h2>
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
</section>

@include('master_theme/footer')
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
    });
</script>

</body>
</html>
