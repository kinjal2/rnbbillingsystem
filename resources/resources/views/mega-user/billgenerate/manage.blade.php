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
                        <div class="white_card_body">
                            <div class="card-body">
                             <form method="POST" action="{{ url('savegenratenewbill') }}"  name="newconnection" id="newconnection" enctype="multipart/form-data"> 
								<input type='hidden' name='_token' value="{{ csrf_token() }}" />
                                <div class="form-row">
                               
                                    <button type="submit" class="btn btn-primary">Genrate Bill</button>
                                </form>
                            </div>
                        </div>
						</div></div></div>
 @endsection
@push('page-ready-script')
@endpush
@push('footer-script')

@endpush