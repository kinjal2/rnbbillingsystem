
<div class="wrapper carousel-wrapper">
  <div class="container carousel-container">
    <div id="flexCarousel" class="flexslider carousel">
      <ul class="slides">
        <li><a target="_blank" href="https://data.gov.in/" title="Data portal, External Link that opens in a new window" ><img src="{{ asset('home_theme/images/carousel/data-gov.png')}}" alt="Data gov website link"></a></li>
        <li><a target="_blank" href="http://india.gov.in/" title="National Portal of India, External Link that opens in a new window"><img src="{{ asset('home_theme/images/carousel/india-gov.png')}}" alt="India gov website link"></a></li>
        <li><a target="_blank" href="https://www.incredibleindia.org" title="Incredible India, External Link that opens in a new window"><img src="{{ asset('home_theme/images/incredible-india.png')}}" alt="Incredible India website link"></a></li>
        <li><a target="_blank" href="https://digitalindia.gov.in/" title="Digital India, External Link that opens in a new window"><img src="{{ asset('home_theme/images/carousel/digital-india.png')}}" alt="Digital India website link"></a></li>
        <li><a target="_blank" href="https://pmnrf.gov.in/" title="Prime Minister's National Relief Fund, External Link that opens in a new window"><img src="{{ asset('home_theme/images/carousel/ganhri.png')}}" alt="PMNRF website link"></a></li>
        <li><a target="_blank" href="http://www.makeinindia.com/" title="Make In India, External Link that opens in a new window"> <img src="{{ asset('home_theme/images/carousel/makeinindia.png')}}" alt="Make in India website link"></a></li>
        <li><a target="_blank" href="http://goidirectory.nic.in/" title="GOI Web Directory, External Link that opens in a new window"><img src="{{ asset('home_theme/images/carousel/goidirectory.png')}}" alt="GOI Directory website link"></a></li>
        <li><a target="_blank" href="https://mygov.in/" title="MyGov, External Link that opens in a new window"><img src="{{ asset('home_theme/images/carousel/mygov.png')}}" alt="MyGov website link"></a></li>
        <li><a target="_blank" href="https://eci.gov.in/" title="Election Commission of India, External Link that opens in a new window"><img src="{{ asset('home_theme/images/carousel/eci.png')}}" alt="Election Commission of India website link"></a></li>
        <li><a target="_blank" href="http://egazette.nic.in/" title="eGazette, External Link that opens in a new window"><img src="{{ asset('home_theme/images/carousel/e-gazette.png')}}" alt="eGazette website link"></a></li>
        <li><a target="_blank" href="https://evisitors.nic.in" title="MyVisit, External Link that opens in a new window"><img src="{{ asset('home_theme/images/carousel/myvisit-logo.png')}}" alt="eVisitors website link"></a></li>
        <li><a target="_blank" href="https://pgportal.gov.in/" title="Centralized Public Grievance Redress and Monitoring System, External Link that opens in a new window"><img src="{{ asset('home_theme/images/carousel/pg-portal.png')}}" alt="PG Portal website link"></a></li>
      </ul>
    </div>
  </div>
</div>
<!--/.carousel-wrapper-->
<footer class="wrapper footer-wrapper">
  <div class="footer-top-wrapper">
    <div class="container footer-top-container">
      <ul>
        <li><a href="#">About Us</a></li>
        <li>
		<a href="#" onclick="return openWindow();" title="click here to open help" >Contact Us</a>
        </li><li><a href="link.php">Video Tutorial</a></li>
        <li><a href="image/demo.pdf">Registration Tutorial</a></li> 	
      </ul>
    </div>
  </div>
  <div class="footer-bottom-wrapper">
    <div class="container footer-bottom-container">
      <div class="footer-content clearfix">
        <div class="copyright-content"> 
            Website Content Managed by <strong>Gujarat Engineering Research Institute, <a target="_blank" title="GoI, External Link that opens in a new window" href="#"><strong>Government of Gujarat</strong></a></strong> 
            <span>Designed, Developed and Hosted by <a target="_blank" title="NIC, External Link that opens in a new window" href="https://www.nic.in/"><strong>National Informatics Centre</strong></a><strong> (NIC)</strong></span>
            <span class="last-updated">Last Updated: <span id="lastupdated"></span></span>
        </div>

      </div>
    </div>
  </div>
</footer>
<!--/.footer-wrapper-->
<script src="{{ asset('home_theme/js/jquery.min.js')}}"></script>

<script src="{{ asset('home_theme/js/jquery.flexslider.js')}}"></script>
<script src="{{ asset('home_theme/js/font-size.js')}}"></script>
<script src="{{ asset('home_theme/js/swithcer.js')}}"></script>
<script src="{{ asset('home_theme/js/ma5gallery.js')}}"></script>

<script src="{{ asset('home_theme/js/easyResponsiveTabs.js')}}"></script>

<script>

$(window).ready(function(){
// Slider	
			
 $('#flexSlider').flexslider({
        animation: "slide",
		pausePlay: true,
		controlNav: true,
        start: function(slider){
        $('body').removeClass('loading');
        }
 });
  $('#flexSlider1').flexslider({
        animation: "slide",
		controlNav: false,
        start: function(slider){
        $('body').removeClass('loading');
        }
 });
    $('#flexSlider2').flexslider({
        animation: "slide",
		controlNav: false,
        start: function(slider){
        $('body').removeClass('loading');
        }
 });
 
 
  $('#contSlider1').flexslider({
        animation: "swing",
		controlNav: false,
		directionNav: false,
		direction: "vertical",
		easing:'linear',
		prevText: " ",
		nextText: " ", 
		minItems: 2,
        maxItems: 2,
		move: 2,
		itemMargin: 0,
		pausePlay: true,
		pauseOnHover: true,
		slideshowSpeed:1000,
    	animationSpeed:10000,
		
        
 });
  
    $('#contSlider2').flexslider({
        animation: "slide",
		controlNav: false,
        start: function(slider){
        $('body').removeClass('loading');
        }
 });
 
 
 
// Carousel						
 $('#flexCarousel').flexslider({
        animation: "slide",
        animationLoop: false,
        itemWidth: 200,
        itemMargin: 5,
        minItems: 2,
        maxItems: 6,
		slideshow: 1,
		move: 1,
		pausePlay: true,
    	pauseText: 'Pause',
    	playText: 'Play', 
		controlNav: false,
        start: function(slider){
          $('body').removeClass('loading');
		  if (slider.pagingCount === 1) slider.addClass('flex-centered');
        }
      });
 
  $('#flexCarousel1').flexslider({
        animation: "slide",
        animationLoop: false,
        itemWidth: 168,
        itemMargin: 20,
        minItems:1,
        maxItems: 4,
		slideshow: 1,
		move: 1,
		controlNav: false,
        start: function(slider){
          $('body').removeClass('loading');
		  //if (slider.pagingCount === 1) slider.addClass('flex-centered');
        }
      });
 // breaking_news

  $('#breaking_news').flexslider({
    animation: "slide",
  controlNav: false,
  animationLoop: true,
  directionNav: false,
  direction: "horizontal",
  slideshowSpeed: 7000,
   animationSpeed: 600,
        initDelay: 1000,
     pausePlay: true,
    pauseText: '',
    playText: '',
  pauseOnHover: false
  });

 // Gallery
      $('#galleryCarousel').flexslider({
        animation: "fade",
        controlNav: "thumbnails",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
  });
  function openWindow(url)
 { 
     window.open(url,'',"width="+(screen.width/2)+"height=600,scrollbars=1");
     return false;
 }	
</script>
<script>
$(document).ready(function(){
   $('#feedTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'feedTab_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
	
	$('.resp-tabs-list li a').click(function(event){
				event.preventDefault();								 
			})

});
</script>


</body>
</html>