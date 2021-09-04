@extends(\Config::get('app.theme').'.master')
@section('content')
 <!-- page title  -->
				
<div class="row">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30 pt-4">
                        <div class="white_card_body">
                            <div class="QA_section">
                                <div class="white_box_tittle list_header">
                                    <h4>Custmor's Bill Collection </h4>
									<div class="serach_field-area d-flex align-items-center">
                        <div class="search_inner">
                        <form  id="generateragister" action='#'>
                                <div class="search_field">
                                    <input type="text" name='custmor_no' id='custmor_no' placeholder="Search Customer  Number here " style="border:1px solid black" >
                                </div>
                                <button type="button"  class='serchcustomer'> 
                                <img src="{!! URL::asset(Config::get('app.theme_path').'/img/icon/icon_search.svg') !!}" alt="">
					
                                
                             </button>
                            </form>
                        </div>
                    </div>	</div>
                                        <div class="QA_table mb_30" id='customer_list'>
                                   
                                   
                                        
                                </div>
                                      
                                    
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
@push('page-ready-script')
console.log('page is ready');
@endpush
@push('footer-script')
<script type="text/javascript">
   $('body').on('click', '.serchcustomer', function () {
        var custmor_no = $('#custmor_no').val(); 
        $.ajax({
            url: "{{ url('serchcustomer') }}",
            data: {custmor_no:custmor_no},
            method: "POST",
            success: function (result) {
                $('#customer_list').html('');
                $('#customer_list').append(result);
            }
        });
    
   });
</script>
@endpush


