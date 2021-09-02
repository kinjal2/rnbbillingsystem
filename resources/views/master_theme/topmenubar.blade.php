<nav class="bottom-navbar">
        <div class="container">
		@php
        $sidebar_menu = getMenu();
        // dd($sidebar_menu);  
        @endphp
		 @if(count($sidebar_menu) > 0)
          <ul class="nav page-navigation">
	  @foreach($sidebar_menu as $key=>$menu)
            <li class="nav-item {{checkRequestIs($menu['route'])}}">
              <a class="nav-link" href="{{$menu['link'] === '#' ? 'javascript:;' :route($menu['link'])}}">
                <i class="{{$menu['icon']}}"></i>
                <span class="menu-title"> {{trans($menu['title'])}}</span>
				@if(isset($menu['submenu']) && !empty($menu['submenu']))
                <i class="menu-arrow"></i> @endif
              </a>
			    @if(isset($menu['submenu']) && !empty($menu['submenu']))
				 <div class="submenu">
                <ul class="submenu-item">
				@foreach($menu['submenu'] as $submenu)
                  <li class="nav-item"><a class="nav-link" href="{{$submenu['link'] === '#' ? 'javascript:;' :route($submenu['link'])}}">{{trans($submenu['title'])}}</a>
				  </li> @endforeach
                 
                </ul>@endif
              </div>	
			  
            </li>
           
            
            
			@endforeach 
          </ul>
		  @endif
        </div>
      </nav>