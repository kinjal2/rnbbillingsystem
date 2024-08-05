@extends(\Config::get('app.theme').'.master')
@section('content')

<div class="col-lg-12">
	<div class="white_card card_height_100 mb_30">
		<div class="white_card_header">
			<div class="box_header m-0">
				<div class="main-title">
				<h3 class="m-0">Payment Status </h3>
				</div>
			</div>
		</div>
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
							<input type="text" class="form-control" id="total_amount" name="total_amount" value ="{{$amount}}">
							<input type="hidden" class="form-control" id="cust_no" name="cust_no" value ="{{$cust_no}}"> 
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
					<button type="submit" class="btn btn-primary">Registration</button>
				</form>
			</div>
		</div>
		<div class="white_card_body">
			<div class="card-body">
				<form name="payment" method="post" id="FormEdit" enctype="multipart/form-data" action="#" > 
					<input type='hidden' name='_token' value="{{ csrf_token() }}" />
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="payment mode">Charge Back Policy</label>
							<u>Terms & Conditions :-</u>
						</div>
						<div class="form-group col-md-6">
						<ul class="fw-bold danger">
							<li>The transaction once done cannot be cancelled.</li>
							<li>Fees once paid is not refundable in any case.</li>
							<li>Refund claims (if found eligible and admissible) will be entertained ONLY OFFLINE and NO ONLINE REFUNDS will be done.</li>
							<li>Convenience fees / Bank charges, Commission of Bank plus service tax would be charged (if applicable) in addition to the fee Amount and can't be claim back as refund.</li>
							<li>“This transaction is payment towards Government dues, fees hence would not be covered under chargeback policy.”</li>
						</ul>
						</div>
					</div>
					<div class="form-row bank" >
						<div class="form-group col-md-4">
						<input name="payment" class="payment check" type="checkbox" value="1" id="payment">
						<label class="form-check-label danger" for="payment">
							I/We agree and accept all the terms and conditions mention above and I/We hereby certify that no online chargeback claim will be made in this regards.
						</label><br>
						<span class="red" id="payment-error"></span>
						<h4 class="fw-bold danger text-md-center">Please check all details before clicking on confirm button</h4>
						</div>
						<div class="form-group col-md-4">
						<button type="submit" id="btnSubmit" name="btnSubmit" class="btn btn-primary">
                                                                                <i class="icon-check2"></i>
                                                                                Confirm
                                                                            </button>
						</div>
						<div class="form-group col-md-4">
						<button type="button" class="btn btn-warning mr-1" onclick="window.close()">
                                                                                <i class="icon-cross2"></i> Cancel
                                                                            </button>
						</div>
					</div>
					<input type="hidden" id="aplNo" class="form-control" name="aplNo" value="1">
					<input type="hidden" id="apl_type" class="form-control" name="apl_type" value="single">
					<input type="hidden" id="form_type" class="form-control" name="form_type" value="test">
					<input type="hidden" name="action" value="add" />
					<input type="hidden" style="display:none;" id="RandomNumberHash" name="RandomNumberHash" value="" />
					<input type="hidden" id="submission_id" class="form-control" name="submission_id" value="1">
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
   $('body').on('click', '#pay_mode', function () {
	var pay_mode = $(this).val();
	if(pay_mode=='C'){
		  $('.bank').hide();
	  }
	  else{
		  $('.bank').show();
	  }
     });

$("#savepayment").validate({
		    rules : {
				pay_mode:"required",
			
		    }
});
$('#FormEdit').on("submit", function(event) { alert(event);
    event.preventDefault();

    var formData = new FormData(this);

    $.ajax({
        url: '{{ route('make.payment') }}',
        type: "POST",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        dataType: 'json',
        success: function(output) {
            console.log(output);

            if (output.code == 0 || output.code == -1) {
                var formArray = ['payment'];
                return showAlert(output.code, output.message, 'online_payment.php', 'form', formArray);
            } else {
                $("#ctp_data").val(output.CTP_DATA);
                $("#ru").val(output.RU);
                $("#du").val(output.DU);

                $("#ctp").submit(); // Assuming this triggers another form submission
            }
        }
    });
});

</script>
@endpush