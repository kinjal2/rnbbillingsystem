@extends(\Config::get('app.theme').'.master')
@section('content')
 <!-- page title  -->
    <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30 border-light1">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Water's New Temporary connection  </h3>
                                </div>
                            </div>
                        </div>
                        @if($errors->any())
                        {{ implode('', $errors->all('<div>:message</div>')) }}
                        @endif
                        <!-- In your Blade file, typically at the top of the file -->
                        @if (session('Success'))
                        <div class="alert alert-success">
                        {{ session('Success') }}
                        </div>
                        @endif
                        <!-- In your Blade file, typically at the top or within a layout -->
                        @if (session('failed'))
                        <div class="alert alert-danger">
                        {{ session('failed') }}
                        </div>
                        @endif
                        <div class="white_card_body">
                            <div class="card-body">
                             <form method="POST" action="{{ url('savenewconnection') }}"  name="newconnection" id="newconnection" enctype="multipart/form-data"> 
								<input type='hidden' name='_token' value="{{ csrf_token() }}" />
                                <div class="form-row row mb-3">
                                        <div class="form-group col-md-3">
                                            <label for="inputCity"> {{ __('connection.plot_area')}}</label>
                                            <input type="text" class="form-control" id="plot_area" name="plot_area">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputState">Construction Area</label>
                                             <input type="text" class="form-control" id="const_area" name="const_area">
                                   
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputZip">Customer No</label>
                                            <input type="text" class="form-control" id="customer_no" name="customer_no" readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputEmail4">Applicant's Name</label>
                                            <input type="text" class="form-control"  name='applicant_name' id="applicant_name" placeholder="Applicant Name">
                                        </div>
                                    </div>
                                   
									  <div class="form-row row mb-3">
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress">Home Address</label>
										<textarea  class="form-control" name="home_address" id="home_address"></textarea>                                       
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="office_address">Office Address </label>
										<textarea  class="form-control" name="office_address" id="office_address"></textarea>                                        
                                    </div>									
									 </div>

									 <div class="form-row row mb-3">
                                     <div class="form-group col-md-3">
                                        <label for="inputAddress"> Phone Number 1</label>										
                                        <input type="text" class="form-control"  name='home_phone'id="home_phone" placeholder="">
                                    </div>
                                    
									 <div class="form-group col-md-3">
                                        <label for="inputAddress">Phone Number 2</label>										
                                        <input type="text" class="form-control"  name='office_phone'id="office_phone" placeholder="">
                                    </div>
                                    <div class="form-group col-md-2">
                                            <label for="inputCity">Sector Number</label>
                                           
                                            {{ Form::select('sector_number',getSector(),'',['id'=>'sector_number','class'=>'form-control']) }}  
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="inputState">Plot Number</label>
                                             <input type="text" class="form-control" id="plot_no" name="plot_no">                                   
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="inputCity">The duration of the connection</label>
                                            <input type="text" class="form-control" id="conn_duration" name="conn_duration">
                                        </div>
									  </div>
                                  
                                
                                    <div class="form-row row mb-3">
                                    
                                        <div class="form-group col-md-4">
                                            <label for="gridCheck">What is the purpose of getting water connection?</label>
                                           
                                            <div class="form-check ">
                                                <input class="form-check-input" type="radio" name="conn_purpose" id="householdpurpose" value="H" checked="">
                                                <label class="form-check-label" for="gridRadios1">
                                                Household use
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="conn_purpose" id="constructionpurpose" value="C">
                                                <label class="form-check-label" for="gridRadios2">
                                                construction use
                                                </label>
                                            </div>
                                            <div class="form-check ">
                                                <input class="form-check-input" type="radio" name="conn_purpose" id="industrialpurpose" value="I" >
                                                <label class="form-check-label" for="gridRadios3">
                                                industrial use
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
											<label for="inputCity">True copy of the charter</label>
											<div class="custom-file">
											<input type="file" class="custom-file-input" name="true_copy_doc" id="true_copy_doc" aria-describedby="inputGroupFileAddon01">
											
											</div> 
										</div>
										<div class="form-group col-md-4">
											<label for="inputCity">True copy of construction approval order and map issued by CTP / GUDA</label>
											<div class="custom-file">
											<input type="file" class="custom-file-input" id="ctp_document" name='ctp_document' aria-describedby="inputGroupFileAddon01">
											
											</div> 
										</div>
                                    </div>
                                            
                                            <div class="form-row">
                                      
                                      
                                    </div>
                                      
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary1">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>        
     
                @endsection
@push('page-ready-script')
@endpush
@push('footer-script')
<script src="{{ URL::asset(Config::get('app.theme_path').'/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ URL::asset(Config::get('app.theme_path').'/plugins/jquery-validation/additional-methods.min.js')}}"></script>

<script type="text/javascript">
 
$("#newconnection").validate({
		    rules : {
				plot_area		:	"required",
                const_area :	"required",
              //  customer_no :	"required",
                applicant_name :	"required",
                home_address :	"required",
                office_address :	"required",
                home_phone: {
                    required: true,
                    minlength: 10,  // Set minimum length
                    maxlength: 12   // Set maximum length
                },
                office_phone: {
                    required: true,
                    minlength: 10,  // Set minimum length
                    maxlength: 12   // Set maximum length
                },
                sector_number :	"required",
                plot_no :	"required",
                conn_duration :	"required",
                conn_purpose :	"required",
               
                true_copy_doc: {
                    required: true,
                    extension: "pdf"
                },
                ctp_document: {
                    required: true,
                    extension: "pdf"
                }
            },
                messages: {
                true_copy_doc: {
                    required: "Please upload a document.",
                    extension: "Only PDF files are allowed."
                },
                ctp_document: {
                    required: "Please upload a document.",
                    extension: "Only PDF files are allowed."
                }
            },

			
		    
		});
</script>
@endpush

