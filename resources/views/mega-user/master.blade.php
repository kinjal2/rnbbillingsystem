<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Management Admin</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
          <meta name="csrf-token" content="{{ csrf_token() }}">
        @include(Config::get('app.theme').'.template.styles')
    </head>
    <!-- END HEAD -->
 <body class="crm_body_bg">
  <!-- main content part here -->
 <!-- sidebar  -->
  <!-- BEGIN SIDEBAR -->
        @include(Config::get('app.theme').'.template.sidebar')
<!-- END SIDEBAR -->


<!-- BEGIN HEADER -->
         @include(Config::get('app.theme').'.template.header')
        
        <!-- END HEADER -->
    <!--/ menu  -->
    <div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">
            <!-- page title  -->
           
			@yield('content')
			 </div>
    </div>

<!-- footer part -->
 @include(Config::get('app.theme').'.template.footer')

<!-- main content part end -->

<!-- ### CHAT_MESSAGE_BOX   ### -->



<!--/### CHAT_MESSAGE_BOX  ### -->

<div id="back-top" style="display: none;">
    <a title="Go to Top" href="#">
        <i class="ti-angle-up"></i>
    </a>
</div>

<!-- footer  -->
@include(Config::get('app.theme').'.template.scripts')

</html>
