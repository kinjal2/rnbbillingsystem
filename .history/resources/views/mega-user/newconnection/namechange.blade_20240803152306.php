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
					<form method="POST" action="{{ url('serchcustomerno') }}"  name="customer_name_change" id="customer_name_change" enctype="multipart/form-data"> 
					<input type='hidden' name='_token' value="{{ csrf_token() }}" />
						<div class="form-row">
							<div class="form-group col-md-8">
								<label for="inputZip">Customer No</label>
								<input type="text" class="form-control" id="customer_no" name="customer_no">
							</div>
							<div class="form-group col-md-2">
								<button type="submit" class="btn btn-primary">Serch</button>
							</div>
						</div>
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
$("#serchcustomerno").validate({
	rules : 
	{
		customer_no:"required",
	}
});
$('#ajaxForm').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('ajax.request.store') }}",
                    data: $(this).serialize(),
                    success: function(response) {
                        toastr.success(response.success);
                    },
                    error: function(response) {
                        toastr.error('There was an error. Please try again.');
                    }
                });
});
</script>
@endpush

