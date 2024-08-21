<!-- footer  -->
<script src="{{ URL::asset(Config::get('app.theme_path').'/js/jquery.min.js')}}"></script>
<!-- popper js -->
<script src="{{ URL::asset(Config::get('app.theme_path').'/js/popper.min.js')}}"></script>
<!-- bootstarp js -->
<script src="{{ URL::asset(Config::get('app.theme_path').'/js/bootstrap.min.js')}}"></script>
<!-- sidebar menu  -->
<script src="{{ URL::asset(Config::get('app.theme_path').'/js/metisMenu.js')}}"></script>
<!-- waypoints js -->
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/count_up/jquery.waypoints.min.js')}}"></script>

<!-- counterup js -->
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/count_up/jquery.counterup.min.js')}}"></script>

<!-- nice select -->
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/niceselect/js/jquery.nice-select.min.js')}}"></script>
<!-- owl carousel -->
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/owl_carousel/js/owl.carousel.min.js')}}"></script>

<!-- responsive table -->
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/datatable/js/jquery.dataTables.min.js')}}"></script>


<!-- datepicker  -->
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/datepicker/datepicker.js')}}"></script>
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/datepicker/datepicker.en.js')}}"></script>
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/datepicker/datepicker.custom.js')}}"></script>


<!-- progressbar js -->
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/progressbar/jquery.barfiller.js')}}"></script>
<!-- tag input -->
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/tagsinput/tagsinput.js')}}"></script>
<!-- text editor js -->
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/text_editor/summernote-bs4.js')}}"></script>
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/am_chart/amcharts.js')}}"></script>

<!-- scrollabe  -->
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/scroll/perfect-scrollbar.min.js')}}"></script>
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/scroll/scrollable-custom.js')}}"></script>


<!-- custom js -->

<script src="{{ URL::asset(Config::get('app.theme_path').'/js/custom.js')}}"></script>
<script type="text/javascript">
var oTable = null;
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/*let warningTime = 2 * 60 * 1000; // 10 minutes in milliseconds
        let timeoutWarning = setTimeout(function() {
            alert('Your session will expire soon. Please save your work.');
        }, warningTime);

        function resetTimer() {
            clearTimeout(timeoutWarning);
            timeoutWarning = setTimeout(function() {
                alert('Your session will expire soon. Please save your work.');
            }, warningTime);
        }

        window.onload = resetTimer;
        document.onmousemove = resetTimer;
        document.onkeypress = resetTimer;*/

        
</script>
@stack('footer-script')
<script type="text/javascript">
$(document).ready(function () {
        @stack('page-ready-script')
    });
   
</script>