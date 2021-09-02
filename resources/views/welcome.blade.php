@include('master_theme/header')
<!--/.header-wrapper-->
@include('master_theme/navbar')

<!--/.nav-wrapper-->
<div class="wrapper banner-wrapper">
  <div id="flexSlider" class="flexslider">
    <ul class="slides">
    
    	<li title="Banner 1"> <img src="{{ asset('home_theme/images/banner/slider-1.jpg')}}" alt="Banner 1 image">
         <div class="container">
          <div class="slide-caption">
           Description of the banner 1 goes here.
          </div>
       </div>
      </li>
      <li title="Banner 2"> <img src="{{ asset('home_theme/images/banner/slider-1.jpg')}}" alt="Banner 2 image">
        <div class="container">
          <div class="slide-caption">
           Description of the banner 2 goes here.
          </div>
       </div>
      </li>
    
      <li title="Banner 3"> <img src="{{ asset('home_theme/images/banner/slider-1.jpg')}}" alt="Banner 3 image">
        <div class="container">
          <div class="slide-caption">
           Description of the banner 3 goes here.
          </div>
       </div>
      </li>
     
    </ul>

  </div>
</div>
<div class="wrapper" id="skipCont"></div>
<!--/#skipCont-->
<section id="fontSize" class="wrapper body-wrapper ">
  <div class="bg-wrapper top-bg-wrapper gray-bg padding-top-bott">
 <div class="container body-container top-body-container padding-top-bott2">

      <div class="minister clearfix">
         <div class="minister-box">

            <div class="text-heading ">Hon'ble Minister</div>
            <div class="minister-image"><img src="{{ asset('home_theme/images/minister1.jpg')}}" alt="Minister image"></div>
            <div class="min-info">

               <div class="text-heading color-blue">Minister Name</div>
               <!--<a href="#" class="bttn">View Profile</a>-->
            </div>
         </div>
         <div class="minister-box clearfix">
            <div class="text-heading ">Hon'ble Minister</div>
            
            <div class="minister-sub">
               <div class="minister-image"><img src="{{ asset('home_theme/images/minister1.jpg')}}" alt="Minister image"></div>
               <div class="min-info">
                  <h4 class="color-blue">Minister Name</h4>
               </div>
            </div>
         </div>
        
      </div>
      <div class="left-block">
     
      
      <div class="whats-new-maincontainer">
      <div id="feedTab">
            <ul class="resp-tabs-list feedTab_1 clearfix">
                <li> <a href="inner.html"><i class="fa fa-refresh"></i> Latest Updates</a></li>
               
                
            </ul>
            <div class="resp-tabs-container feedTab_1">
                <div>
                      <ul class="list">
                      	<li>content will update soon</li>
                       
                      </ul>    
                      
                      <a class="read-more" href="#">Read more</a> 
                </div>
               
              </div>
        </div>
        
      </div>
      
    </div>
    </div>
  </div>
  
  
   <div class="wrapper padding-top-bott">
  	<div class="container">
    	
    	 <div class="statistics" id="counter">
            <h2>Statistics<small>Below are the data of the Statistics</small></h2>
            <div>
                <div class="col-md-12">
                    
                        <span class="count">6298</span>
                        <p>Statistics 1</p>
                    
                </div>
               
              
            </div>
            
        </div>
        
        
    </div>
  </div>      
  
  </section>
<!--/.body-wrapper-->
<!--/.banner-wrapper-->

@include('master_theme/footer')
    </body>
</html>


