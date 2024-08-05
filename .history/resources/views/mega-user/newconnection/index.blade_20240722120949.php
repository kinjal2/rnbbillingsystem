@extends(\Config::get('app.theme').'.master')
@section('content')
 <!-- page title  -->
				
 <div class="row">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30 pt-4">
                        <div class="white_card_body">
                            <div class="QA_section">
                                <div class="white_box_tittle list_header">
                                    <h4>Custmoer list</h4>
                                  
                                </div>
        
                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <table class="table lms_table_active3 " id='customer_list'>
                                        <thead>
                                            <tr>
                                                <th scope="col">customer No</th>
                                                <th scope="col">customer Name</th>
                                                <th scope="col">sector</th>
                                                <th scope="col">Plot No</th>
                                                <th scope="col">generate bill</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
$(document).ready(function () { 
    var table = $('#customer_list').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        ajax: {
            url: "{{ route('getcustomerlist1') }}",
            type: 'POST', // Ensure the POST method is used
            // Removed CSRF token for testing
            // data: function (d) {
            //     d._token = '{{ csrf_token() }}';
            // }
        },
        columns: [
            {data: 'cust_no', name: 'cust_no'},
            {data: 'cust_name', name: 'cust_name'},
            {data: 'sector_no', name: 'sector_no'},
            {data: 'plot_no', name: 'plot_no'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
});
</script>

</script>
@endpush



