<!-- footer  -->
<script src="{{ URL::asset(Config::get('app.theme_path').'/js/jquery-3.4.1.min.js')}}"></script>
<!-- popper js -->
<script src="{{ URL::asset(Config::get('app.theme_path').'/js/popper.min.js')}}"></script>
<!-- bootstarp js -->
<script src="{{ URL::asset(Config::get('app.theme_path').'/js/bootstrap.min.js')}}"></script>
<!-- sidebar menu  -->
<script src="{{ URL::asset(Config::get('app.theme_path').'/js/metisMenu.js')}}"></script>
<!-- waypoints js -->
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/count_up/jquery.waypoints.min.js')}}"></script>
<!-- waypoints js -->
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/chartlist/Chart.min.js')}}"></script>
<!-- counterup js -->
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/count_up/jquery.counterup.min.js')}}"></script>

<!-- nice select -->
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/niceselect/js/jquery.nice-select.min.js')}}"></script>
<!-- owl carousel -->
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/owl_carousel/js/owl.carousel.min.js')}}"></script>

<!-- responsive table -->
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/datatable/js/buttons.flash.min.js')}}"></script>
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/datatable/js/jszip.min.js')}}"></script>
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/datatable/js/buttons.print.min.js')}}"></script>

<!-- datepicker  -->
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/datepicker/datepicker.js')}}"></script>
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/datepicker/datepicker.en.js')}}"></script>
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/datepicker/datepicker.custom.js')}}"></script>

<script src="{{ URL::asset(Config::get('app.theme_path').'/js/chart.min.js')}}"></script>
<script src="{{ URL::asset(Config::get('app.theme_path').'/vendors/chartjs/roundedBar.min.js')}}"></script>

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

</script>
@stack('footer-script')
<script type="text/javascript">
$(document).ready(function () {
        @stack('page-ready-script')
    });
   
</script>