@extends(\Config::get('app.theme').'.master')
@section('content')

               
               
<!-- page title  -->

        
                        
                            <div class="container">
                                <div   style="text-align: center">
                                <button type="submit" class="btn btn-primary" id="printMe">Print</button>
                                </div>
                            </div>
                        
                  <div id="wraptable"> 
                <div class="row ">
                    <div class="col-12 QA_section" >
                        <div class="card QA_table ">
                            
                            <div class="card-header">
                               Receipt : 
                                <strong>{{date("d/m/Y")}}</strong>
                                <span class="float-right"> <strong>Status:</strong> Paid</span>
                                </div>
                           
                            <div class="card-body">
                           <table border="1" style=" width:100%" >
                    
                    <tr>
                        <td colspan="2">
                            <div >name :: {{$cus_detail->cust_name}}</div>
                            <div >plot :: {{$cus_detail->sector_no}} </div>
                            <div >sector :: {{$cus_detail->sector_no}}</div>
                            <div >phone no. :: +0000</div>

                            </td>
                        <td colspan="2">address of office:</td>
                    </tr>
                    <tr>
                        <td style="width:25%" >serial no:</td>
                        <td style="width:25%">Year : {{$bill_detail-> fin_year}}</td>
                        <td style="width:25%">water</td>
                        <td style="width:25%">drainage</td>
                    </tr>
                    <tr>
                        <td colspan="2">Date</td>
                        <td style="width:25%" >{{$bill_detail->wp_os_amt}}</td>
                        <td style="width:25%">{{$bill_detail->dp_os_amt}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div>Year water and drainage bill :</div>
                            <div>Year water bill :</div>
                            <div>year drainage bill :</div>
                        </td>

                            
                        <td >
                            <div>{{$bill_detail->w_os_amt_wo_d}}</div>
                            <div> - </div>
                        </td>
                        <td>
                            <div> - </div>
                            <div> {{$bill_detail->d_os_amt_wo_d}} </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Value on 20% :</td>
                        <td style="width:25%" > - </td>
                        <td style="width:25%">{{$bill_detail->pint20}}</td>
                    </tr>
                    <tr> 
                        <td colspan="2">Total :</td>
                        <td style="width:25%" >{{$bill_detail->w_os_amt_wo_d}}</td>
                        <td style="width:25%">{{$bill_detail->d_os_amt_wo_d}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Discount Amount :</td>
                        <td style="width:25%" >{{ $bill_detail->w_os_amt_wo_d-$bill_detail->w_os_amt_wi_d}}</td>
                        <td style="width:25%">{{ $bill_detail->d_os_amt_wo_d-$bill_detail->d_os_amt_wi_d}}</td>
                    </tr>
                    <tr>
                        <td colspan="2"> After Discount Net Amount : </td>
                        <td style="width:25%">{{$bill_detail->w_os_amt_wi_d}}</td>
                        <td style="width:25%">{{$bill_detail->d_os_amt_wi_d}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div>Without Dicount Total : </div>
                            <div>With Dicount Total : </div>
                            <div>Date Connection :</div>
                            <div>Date Connetion :  </div>
                        </td>
                        <td colspan="2">
                            <div>  {{$bill_detail-> w_os_amt_wo_d + $bill_detail->d_os_amt_wo_d}}</div>
                            <div> {{$bill_detail-> w_os_amt_wi_d + $bill_detail->d_os_amt_wi_d}}</div>
                            <div> {{ date('d-m-Y',strtotime($cus_detail->tmp_c_dt));}}</div>
                            <div>  {{ date('d-m-Y',strtotime($cus_detail->prm_c_dt));}} </div>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>Time Accepted Between 9 to 12 AM :</td>
                        <td  colspan="3">
                            <div>a)Address of office </div>
                            <div>b)Address of another office</div>
                        </td>
                        
                    </tr>
                    <tr>
                        <td colspan="4">Note : Something can be written here</td>
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
 
                 