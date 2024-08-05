@extends(\Config::get('app.theme').'.master')

@section('content')

<div class="form-row">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30 pt-4">
                        <div class="white_card_body">
                            <div class="QA_section"> 
                                 <form  id="generateragister" action='#'>
                                <div class="white_box_tittle list_header">
                                         <div class="form-group col-md-3">
                                            <label for="date"> <strong>From Date</strong></label>
                                            <input type="date" class="form-control" name="rdate" id="rdate">
                                        </div>
										  <div class="form-group col-md-3">
                                            <label for="date"> <strong>To Date</strong></label>
                                            <input type="date" class="form-control" name="todate" id="todate">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="payment mode"><strong>Select Payment Mode</strong></label>
                                            
                                            {{ Form::select('pay_mode',[null=>'select payment mode','-1'=>'Select All']+ paymentStatus(),'',['id'=>'pay_mode','class'=>'form-control']) }}  
										 </div>
                                         
                                           <div class="form-group col-md-2">
                                            <label for="showbill"><strong>Show Bill Ragiser</strong></label>
											<button type="button" class="btn btn-primary generateRagister">Show Bill</button>
                                           </div>
                                  </div>
</form>
                                  <div class="QA_table mb_30" id='customerbill_list'>
                                    <!-- table-responsive -->
                                   
                                        
                                </div>
							</div>
                        </div>
									
					</div>
                                       
                                      
                                    
                                
                </div>
</div>
                    
                
@endsection

@push('page-ready-script')
console.log('page is ready');
@endpush
@push('footer-script')
<script src="{{ URL::asset(Config::get('app.theme_path').'/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ URL::asset(Config::get('app.theme_path').'/plugins/jquery-validation/additional-methods.min.js')}}"></script>
<script type="text/javascript">
var generateragister =$("#generateragister").validate({
		    rules : {
				pay_mode		:	"required",
                rdate           :    "required",
		    }
		});
   $('body').on('click', '.generateRagister', function () {
      var pay_mode = $('#pay_mode').val(); 
      var rdate = $('#rdate').val(); 
      var todate = $('#todate').val(); 

      if ($('#generateragister').valid()) {
      
      $.ajax({
                        url: "{{ url('generateRagister1') }}",
                         data: {pay_mode:pay_mode,rdate:rdate,todate:todate},
                        method: "POST",
                        success: function (result) {
                           
                            //var data = $.parseJSON(result);
							$('#customerbill_list').html('')
                            $('#customerbill_list').append(result);
                            
                        }
                    });
                }           
       
   });
   

   
</script>
@endpush



