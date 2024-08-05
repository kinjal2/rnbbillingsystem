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
  $(document).on('click', '.GenrateBill', function () {
            $.ajax({
                url: "{{ url('savegenratenewbill') }}",
                method: "POST",
                beforeSend: function() {
                    $('#save').attr('disabled', 'disabled');
                    $('#process').css('display', 'block');
                },
                success: function(result) {
                    var percentage = 0;
                    var timer = setInterval(function() {
                        percentage = percentage + 20;
                        progress_bar_process(percentage, timer);
                        if (percentage >= 100) {
                            clearInterval(timer);
                            $('#message').removeClass('alert-success alert-danger').addClass(result.status == 'success' ? 'alert-success' : 'alert-danger').text(result.message).show();
                        }
                    }, 1000);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    $('#message').removeClass('alert-success').addClass('alert-danger').text('Failed to generate the bill. Please try again.').show();
                },
                complete: function() {
                    $('#save').removeAttr('disabled');
                    $('#process').css('display', 'none');
                }
            });
        });

        function progress_bar_process(percentage, timer) {
            $('#progress_bar').css('width', percentage + '%');
            if (percentage >= 100) {
                clearInterval(timer);
                $('#progress_bar').css('width', '0%');
            }
        }

</script>
@endpush