
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="format-detection" content="telephone=no" />
<link rel="apple-touch-icon" href="{{ asset('home_theme/images/favicon/apple-touch-icon.png')}}">
<link rel="icon" href="{{ asset('home_theme/images/favicon/favicon.png')}}">
<meta name="keywords" content="ministry, department">
<meta name="description" content="Ministry/Department">
<meta name="author" content="National Informatics Center">
<title>Home | Ministry | Department | GoI</title>
<!-- Custom styles for this template -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="{{ asset('home_theme/css/base.css')}}" rel="stylesheet" media="all">
<link href="{{ asset('home_theme/css/base-responsive.css')}}" rel="stylesheet" media="all">
<link href="{{ asset('home_theme/css/grid.css')}}" rel="stylesheet" media="all">
<link href="{{ asset('home_theme/css/font.css')}}" rel="stylesheet" media="all">
<link href="{{ asset('home_theme/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
<link href="{{ asset('home_theme/css/flexslider.css')}}" rel="stylesheet" media="all">
<link href="{{ asset('home_theme/css/print.css')}}" rel="stylesheet" media="print" />
<!-- Theme styles for this template -->
<link href="{{ asset('home_theme/css/megamenu.css')}}" rel="stylesheet" media="all" />
<link href="{{ asset('home_theme/css/site.css')}}" rel="stylesheet" media="all">
<link href="{{ asset('home_theme/css/site-responsive.css')}}" rel="stylesheet" media="all">
<link href="{{ asset('home_theme/css/ma5gallery.css')}}" rel="stylesheet" type="text/css">
<link href="{{ asset('home_theme/css/print.css')}}" rel="stylesheet" type="text/css" media="print">
    <style>
        .image-video {}
  
        .invalid-feedback {
            color: red;
            font-size: 0.875em;
        }
        .is-invalid {
            border-color: red;
        }
    </style>
<noscript>
  <link href="{{ asset('home_theme/css/no-js.css')}}" type="text/css" rel="stylesheet">
</noscript>

</head>
<body>
<div id="fb-root"></div>


<header>
    <div class="region region-header-top">
    <div id="block-cmf-content-header-region-block" class="block block-cmf-content first last odd">

      
  <noscript class="no_scr">"JavaScript is a standard programming language that is included to provide interactive features, Kindly enable Javascript in your browser. For details visit help page"
     </noscript>
  <div class="wrapper common-wrapper">
    <div class="container common-container four_content ">
      <div class="common-left clearfix">
          <ul>
            <li class="gov-india"><a title="Government of Gujarat,External Link that opens in a new window" href="#" target="_blank"><span title="ગુજરાત સરકાર">ગુજરાત સરકાર</span>GOVERNMENT OF GUJARAT</a></li>
            <li class="ministry"><a title="Ministry / Department Name" href="home.html" target="_blank"><span title="test">Road & Building Department</span>  </a></li>
            
          </ul>

        </div>
      
    </div>
</div>
</div>
  </div>
      <!--Top-Header Section end-->
  <section class="wrapper header-wrapper border-bottom">
      <div class="container header-container">
          <h1 class="logo">
              <a href="home.html" title="Home" rel="home" class="header__logo" id="logo">
                 <img class="national_emblem" src="{{ asset('home_theme/images/emblem-dark.png')}}" alt="National Emblem Logo">
                 <strong style="font-size: 107%;">પાણી / ડ્રેનેજ કનેક્શન બિલિંગ સિસ્ટમ</strong>
                <span>Water/Drainage Connection Billing System</span>
              </a>
            </h1>
            
        <div class="header-right clearfix">
            <div class="right-content clearfix">
                
                <div class="float-element">
    <nav class="main-menu clearfix" id="main_menu">
      <ul class="nav-menu">
        			    
			<li> <a href="#" class="home"><i class="fa fa-home"></i></a> </li>
	
			<li class="home" ><a  href="https://staging5.gujarat.gov.in/SSOtest/SSO.aspx?Rurl={{ route('departmentlogin') }}">
        <b> LOG IN &nbsp;<i class="fa fa-sign-in"></i></b></a></li>
        @if empty(Session::get('user'))
     <li class="home" ><a  href="{{ route('citizenlogin') }}"><b>Citizen login &nbsp;<i class="fa fa-sign-in"></i></b></a></li>
	   @else
     <li class="home" ><a  href="{{ route('citizenlogout') }}"><b>Logout &nbsp;<i class="fa fa-sign-in"></i></b></a></li>
     @endif
     </ul>
    </nav>
    <nav class="main-menu clearfix" id="overflow_menu">
      <ul class="nav-menu clearfix">
      </ul>
    </nav>
                   <!-- <a class="sw-logo" target="_blank" href="https://swachhbharat.mygov.in/" title="Swachh Bharat, External link that open in a new windows"><img src="{{ asset('home_theme/images/swach-bharat.png')}}" alt="Swachh Bharat"></a> -->
                </div>
            </div>
        </div>
    </div>
  </section>

