@extends(\Config::get('app.theme').'.master')
@section('content')



<!-- page title  -->





                  <div id="wraptable">
                <div class="row ">
                    <div class="col-12 QA_section" >
                        <div class="card QA_table ">



                            <div class="card-body">
                           <table border="1" style=" width:100%" >

                    <tr>
                        <td colspan="2">
                            <div >Applicant's Name :: {{$cus_detail->cust_name}}</div>
                            <div >Plot Area :: {{$cus_detail->plot_area}} </div>
                            <div >Construction Area :: {{$cus_detail->const_area}} </div>
                            <div >Customer No:: {{$cus_detail->cust_no}} </div>

                            <div >Home Address :: {{$cus_detail->home_address}}</div>
                            <div >Office Address :: {{$cus_detail->office_address}}</div>

                            <div >phone no1. :: {{$cus_detail->phone_no}}</div>
                            <div > Plot Number :: {{$cus_detail->plot_no}}</div>

                            </td>
                        <td colspan="2">Document
                            @if($file_details)
                            @foreach($file_details as $k => $value)
                            <a href="{{ route('viewdoc', ['cust_no' => base64_encode($value->cust_no), 'doc_id' => base64_encode($value->doc_id)]) }}" target="_blank">View Document {{ ($value->doc_id==1)?'True copy of the charter':'True copy of construction approval order and map issued by CTP / GUDA'; }}</a><br>
                            <br>
                            @endforeach
                        @else
                            {{ "There is no document" }}
                        @endif

                        </td>
                    </tr>





                    </table>
                        </div>

						</div>
						</div>
						</div>
</div>

 @endsection
@push('page-ready-script')
@endpush
@push('footer-script')
<script>



$('#printMe').click(function () {

    var divToPrint=document.getElementById('wraptable');


var newWin=window.open('','Print-Window');

newWin.document.open();

newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

newWin.document.close();

//setTimeout(function(){newWin.close();},10);


});

</script>
@endpush

