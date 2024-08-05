<section class="main_content dashboard_part large_header_bg">
        <!-- menu  -->
    <div class="container-fluid no-gutters">
        <div class="row">
            <div class="col-lg-12 p-0 ">
                <div class="header_iner d-flex justify-content-between align-items-center">
                    <div class="sidebar_icon d-lg-none">
                        <i class="ti-menu"></i>
                    </div>
                    <div class="line_icon open_miniSide d-none d-lg-block">
                        <img src="{!! URL::asset(Config::get('app.theme_path').'/img/line_img.png') !!}" alt="">
					 </div>
                    <div class="serach_field-area d-flex align-items-center">
                        
                    </div>
                    <div class="header_right d-flex justify-content-between align-items-center">
                    <div class="">
                   <a href="{{ url('locale/gn') }}" style="color: black;"><i class="fa fa-language"></i> ગુજરાતી</a>
<a href="{{ url('locale/en') }}" style="color: black;" > <i class="fa fa-language"></i> English</a>
                    </div>
                        <div class="profile_info">
                            <img src="{!! URL::asset(Config::get('app.theme_path').'/img/user.png') !!}" alt="#">
                            <div class="profile_info_iner">
                                <div class="profile_author_name">
                                    <h5>Customer Name</h5>
                                </div>
                                <div class="profile_info_details">
                                  
                                    <a href="{{ url('logout') }}">Log Out </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ menu  -->