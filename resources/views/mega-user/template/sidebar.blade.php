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
@php
	$sidebar_menu = getMenu();
	@endphp
		@if(count($sidebar_menu) > 0)
			@foreach($sidebar_menu as $key=>$menu)
				<li class="{{checkRequestIs($menu['route'])}}">
				<a  href="{{$menu['link'] === '#' ? 'javascript:;' :route($menu['link'])}}" aria-expanded="false"  
				 class="{{ (isset($menu['submenu']) && !empty($menu['submenu'])) ? 'has-arrow' :''}}">
				<div class="nav_icon_small">
				<img src="{!! URL::asset(Config::get('app.theme_path').'/'.$menu['icon']) !!}" alt="">
				</div>
				<div class="nav_title">
				<span>{{trans($menu['title'])}}</span>
				</div>
				</a>
				@if(isset($menu['submenu']) && !empty($menu['submenu']))
				<ul>
				@foreach($menu['submenu'] as $submenu)

				<li><a href="{{$submenu['link'] === '#' ? 'javascript:;' :route($submenu['link'])}}">{{trans($submenu['title'])}}</a></li>
				@endforeach
				</ul> 
				@endif
				</li>
			@endforeach
		@endif
		@endphp

      </ul>		   
</nav>
 <!--/ sidebar  -->