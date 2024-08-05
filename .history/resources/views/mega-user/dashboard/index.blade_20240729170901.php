@extends(\Config::get('app.theme').'.master')

@section('content')
<!-- BEGIN PAGE BASE CONTENT -->
<!--/ menu  -->
 
        
           
            <div class="row ">
                
                <div class="col-xl-4 ">
                    <div class="white_card card_height_100 mb_30 user_crm_wrapper">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="single_crm">
                                    <div class="crm_head d-flex align-items-center justify-content-between" >
                                        <div class="thumb">
                                            <img src="{!! URL::asset(Config::get('app.theme_path').'/img/crm/businessman.svg') !!}" alt="">
                                        </div>
                                        <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                    </div>
                                    <div class="crm_body">
                                        <h4>{{$total_cust}}</h4>
                                        <p>Total Customer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single_crm ">
                                    <div class="crm_head crm_bg_1 d-flex align-items-center justify-content-between" >
                                        <div class="thumb">
                                            <img src="{!! URL::asset(Config::get('app.theme_path').'/img/crm/customer.svg') !!}" alt="">
                                        </div>
                                        <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                    </div>
                                    <div class="crm_body">
                                        <h4>{{$total_recei}}</h4>
                                        <p>Total Paid Bill</p>
                                    </div>
                                </div>
                            </div>
                          <!--  <div class="col-lg-6">
                                <div class="single_crm">
                                    <div class="crm_head crm_bg_2 d-flex align-items-center justify-content-between" >
                                        <div class="thumb">
                                            <img src="{!! URL::asset(Config::get('app.theme_path').'/img/crm/infographic.svg') !!}" alt="">
                                        </div>
                                        <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                    </div>
                                    <div class="crm_body">
                                        <h4>0</h4>
                                        <p>User Registrations</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single_crm">
                                    <div class="crm_head crm_bg_3 d-flex align-items-center justify-content-between" >
                                        <div class="thumb">
                                            <img src="{!! URL::asset(Config::get('app.theme_path').'/img/crm/sqr.svg') !!}" alt="">
                                        </div>
                                        <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                    </div>
                                    <div class="crm_body">
                                        <h4>0</h4>
                                        <p>User Registrations</p>
                                    </div>
                                </div>
                            </div>
                        </div>--->
                      
                    </div>
                </div>
             
               
                
                
                
                
            </div>
        </div>
    </div>
@endsection
@push('page-ready-script')
@endpush
@push('footer-script')

@endpush

