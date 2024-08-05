@extends(\Config::get('app.theme').'.master')
@section('content')
 <!-- page title  -->
	<div class="col-lg-12">
		<div class="white_card card_height_100 mb_30">
			<div class="white_card_header">
				<div class="box_header m-0">
					<div class="main-title">
						<h3 class="m-0">Name Change Request  </h3>
					</div>
				</div>
			</div>
			@if($errors->any())
			{{ implode('', $errors->all('<div>:message</div>')) }}
			@endif
			<div class="white_card_body">
				<div class="card-body">
					<form method="POST" id="ajaxForm" enctype="multipart/form-data"> 
						@csrf
						<div class="form-row">
							<div class="form-group col-md-8">
								<label for="inputZip">Customer No</label>
								<input type="text" class="form-control" id="customer_no" name="customer_no" required>
							</div>
							<div class="form-group col-md-2">
								<button type="submit" class="btn btn-primary">Serch</button>
							</div>
						</div>
					</form>
					<div class="form-row">
					<form method="POST" action="{{ url('savenewconnection') }}"  name="newconnection" id="newconnection" enctype="multipart/form-data"> 
								<input type='hidden' name='_token' value="{{ csrf_token() }}" />
								<div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4">Existing Applicant's Name</label>
                                            <input type="text" class="form-control"  name='applicant_name' id="applicant_name" placeholder="Applicant Name">
                                        </div>
                                    </div>
                                <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputCity"> {{ __('connection.plot_area')}}</label>
                                            <input type="text" class="form-control" id="plot_area" name="plot_area" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputState">Construction Area</label>
                                             <input type="text" class="form-control" id="const_area" name="const_area" readonly>
                                   
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="inputZip">Customer No</label>
                                            <input type="text" class="form-control" id="customer_no1" name="customer_no1" readonly >
                                        </div>
                                    </div>
                                   
									  <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="inputAddress">Home Address</label>
										<textarea  class="form-control" name="home_address" id="home_address"></textarea>
                                       
                                    </div>
									 <div class="form-group col-md-4">
                                        <label for="inputAddress"> Phone Number 1</label>
										
                                        <input type="text" class="form-control"  name='home_phone'id="home_phone" placeholder="">
                                    </div>
									 </div>
									 <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="office_address">Office Address </label>
										<textarea  class="form-control" name="office_address" id="office_address"></textarea>
                                        
                                    </div>
									 <div class="form-group col-md-4">
                                        <label for="inputAddress">Phone Number 2</label>
										
                                        <input type="text" class="form-control"  name='office_phone'id="office_phone" placeholder="">
                                    </div>
									  </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Sector Number</label>
                                           
                                            {{ Form::select('sector_number',getSector(),'',['id'=>'sector_number','class'=>'form-control']) }}  
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputState">Plot Number</label>
                                             <input type="text" class="form-control" id="plot_no" name="plot_no" readonly>
                                   
                                        </div>
                                    </div>
									 <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">The duration of the connection</label>
                                            <input type="text" class="form-control" id="conn_duration" name="conn_duration">
                                        </div>
										<div class="form-group col-md-6">
											<label for="inputCity">True copy of the charter</label>
											<div class="custom-file">
											<input type="file" class="custom-file-input" name="true_copy_doc" id="true_copy_doc" aria-describedby="inputGroupFileAddon01">
											<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
											</div> 
										</div>
                                      
                                    </div>
                                
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
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
										<div class="form-group col-md-6">
											<label for="inputCity">True copy of construction approval order and map issued by CTP / GUDA</label>
											<div class="custom-file">
											<input type="file" class="custom-file-input" id="ctp_document" name='ctp_document' aria-describedby="inputGroupFileAddon01">
											<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
											</div> 
										</div>
                                    </div>
                                            
                                            <div class="form-row">
                                      
                                      
                                    </div>
                                      
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
				</div>
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
$("#serchcustomerno").validate({
	rules : 
	{
		customer_no:"required",
	}
});
$('#ajaxForm').submit(function(e) {
	e.preventDefault();
	$.ajax
	({
		type: 'POST',
		url: "{{ route('serchcustomerno') }}",
		data: $(this).serialize(),
		success: function(response) {
			var data=response.data;
			//console.log(data.cust_no);
			$('#customer_no1').val(data.cust_no);
			$('#applicant_name').val(data.cust_name);
			$('#applicant_name').val(data.cust_name);
			$('#plot_area').val(data.plot_no);
			$('#const_area').val(data.const_area);
			$('#home_address').val(data.home_address);
		},
		error: function(response) {
			toastr.error('There was an error. Please try again.');
		}
	});
 });
</script>
@endpush

