@extends(\Config::get('app.theme').'.master')
@section('content')
 <!-- page title  -->
 <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Generate Bill </h3>
                                </div>
                            </div>
                        </div>
                        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
                        <div class="white_card_body">
                            <div class="card-body">
							<!--{{ url('savegenratenewbill') }} -->
                             <form method="POST" action="#"  name="newconnection" id="newconnection" > 
								<input type='hidden' name='_token' value="{{ csrf_token() }}" />
                                <div class="form-row">
                               
                                    <button type="button" class="btn btn-primary GenrateBill">Genrate Bill</button>
									 </div>
                                </form>
								<div class="form-group" id="process" style="display:none;">
        <div class="progress">
       <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="">
       </div>
      </div>
       </div>
                           
                        </div>
						</div></div></div>
 @endsection
@push('page-ready-script')
console.log('page is ready');
@endpush
@push('footer-script')
<script type="text/javascript">
   $('body').on('click', '.GenrateBill', function () {
      
        $.ajax({
            url: "{{ url('savegenratenewbill') }}",
           // data: {custmor_no:custmor_no},
            method: "POST",
			beforeSend:function()
     {
      $('#save').attr('disabled', 'disabled');
      $('#process').css('display', 'block');
     },
            success: function (result) {
                var percentage = 0;

      var timer = setInterval(function(){
       percentage = percentage + 20;
       progress_bar_process(percentage, timer);
      }, 1000);
            }
        });
    
   });
   function progress_bar_process(percentage, timer)
  {    //alert(percentage);
      var percentage1=percentage;
   $('.progress-bar').css('width', percentage + '%');
   if(percentage > 100)
   {  //alert(percentage+'HI');
    clearInterval(timer);
    $('#newconnection')[0].reset();
    $('#process').css('display', 'none');
    $('.progress-bar').css('width', '0%');
    $('#save').attr('disabled', false);
    $('#success_message').html("<div class='alert alert-success'>Data Saved</div>");
    setTimeout(function(){
     $('#success_message').html('');
    }, 5000);
   }
  }
</script>
@endpush