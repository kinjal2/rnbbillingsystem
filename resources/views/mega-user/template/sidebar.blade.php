<!-- main content part here -->
 
 <!-- sidebar  -->
<nav class="sidebar dark_sidebar">
    <div class="logo d-flex justify-content-between">
        <a class="large_logo" href="index.html"><img style="width: 30px;height: 35px;" src="{!! URL::asset(Config::get('app.theme_path').'/img/national_emblem.gif') !!}" alt=""></a>
        <a class="small_logo" href="index.html"><img src="#" alt=""></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
 
		    <li class="">
            <a  href="{{ route('departmentlogin')}}" aria-expanded="true">
              <div class="nav_icon_small">
                <img src="{!! URL::asset(Config::get('app.theme_path').'/img/menu-icon/dashboard.svg') !!}" alt="">
            </div>
            <div class="nav_title">
                <span>Dashboard</span>
            </div>
            </a>
        </li>
      
        <li class="">
            <a  class="has-arrow" href="#" aria-expanded="true">
              <div class="nav_icon_small">
                  <img src="{!! URL::asset(Config::get('app.theme_path').'/img/menu-icon/8.svg') !!}" alt="">
              </div>
              <div class="nav_title">
                  <span>Connection</span>
              </div>
            </a>
            <ul>
              
              <li><a href="{{ route('newtconnection') }}">New Water Temporary Connection</a></li>
              <li><a href="{{ route('getcustomerlist') }}">Customer List</a></li>
              <li><a href="Max_Length.html">change(Permanent to Temporary )</a></li>
            </ul>
          </li>
          <li class="">
          <a href="{{ route('generatenewbill') }}">
              <div class="nav_icon_small">
                <img src="{!! URL::asset(Config::get('app.theme_path').'/img/menu-icon/dashboard.svg') !!}" alt="">
            </div>
            <div class="nav_title">
                <span>Bill Generate</span>
            </div>
            </a>
        </li>
        <li class="">
          <a href="{{ route('billcollection') }}">
              <div class="nav_icon_small">
                <img src="{!! URL::asset(Config::get('app.theme_path').'/img/menu-icon/dashboard.svg') !!}" alt="">
            </div>
            <div class="nav_title">
                <span>Bill Collection</span>
            </div>
            </a>
        </li>

          </ul>
</nav>
 <!--/ sidebar  -->