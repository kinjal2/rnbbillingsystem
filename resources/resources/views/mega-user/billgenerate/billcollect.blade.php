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
                        @if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
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
	<button type="submit" class="btn btn-primary">Pay</button>
    
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
				pay_mode		:	"required",
			
		    }
		});

</script>
@endpush