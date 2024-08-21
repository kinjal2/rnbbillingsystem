@include('master_theme/header1')
<!--/.header-wrapper-->
@include('master_theme/navbar')

<section id="fontSize" class="wrapper body-wrapper ">



<ul class="vesell-view press container">
    <li class="admin-basic-list px-3">
      <div class="row">
      <div class="col-md-5">
        <h6 class="mb-0"><label>Customer Number</label><span>:</span></h6>
      </div>
      <div class="col-md-7">{{$bill_detail->cust_no}}</div>
      </div>
    </li>
    <li class="admin-basic-list px-3">
      <div class="row">
        <div class="col-md-5">
          <h6 class="mb-0"><label> Existing Bill Number</label><span>:</span></h6>
        </div>
        <div class="col-md-7"></div>
      </div>
    </li>
    <li class="admin-basic-list px-3">
      <div class="row">
        <div class="col-md-5">
          <h6 class="mb-0"><label>Name</label><span>:</span></h6>
        </div>
        <div class="col-md-7">{{$bill_detail->cust_name}}</div>
      </div>
    </li>
    <li class="admin-basic-list px-3">
      <div class="row">
        <div class="col-md-5">
          <h6 class="mb-0"><label>Address</label><span>:</span></h6>
        </div>
        <div class="col-md-7">{{$bill_detail->home_address}}</div>
      </div>
    </li>
    <li class="admin-basic-list px-3">
      <div class="row">
        <div class="col-md-5">
          <h6 class="mb-0"><label>Status</label><span>:</span></h6>
        </div>
        <div class="col-md-7">Active</div>
      </div>
    </li>
    <li class="admin-basic-list px-3">
      <div class="row">
        <div class="col-md-5">
          <h6 class="mb-0"><label>Annual Value</label><span>:</span></h6>
        </div>
        <div class="col-md-7">{{$bill_detail->tb_amount}}</div>
      </div>
    </li>
    
    <li class="admin-basic-list px-3">
      <div class="row">
        <div class="col-md-5">
          <h6 class="mb-0"><label>Permanent Connection Date</label><span>:</span></h6>
        </div>
        <div class="col-md-7">{{ date('d-m-Y',strtotime($bill_detail->prm_c_dt))}}</div>
      </div>
    </li>
    <li class="admin-basic-list px-3">
      <div class="row">
        <div class="col-md-5">
          <h6 class="mb-0"><label>Tax</label><span>:</span></h6>
        </div>
        <div class="col-md-7">{{$bill_detail->tb_amount}}</div>
      </div>
    </li>
    <li class="admin-basic-list px-3">
      <div class="row">
        <div class="col-md-5">
          <h6 class="mb-0"><label>Drainage Connection Date:</label><span>:</span></h6>
        </div>
        <div class="col-md-7">{{ date('d-m-Y',strtotime($bill_detail->dran_c_dt))}}</div>
      </div>
    </li>
    <li class="admin-basic-list px-3">
      <div class="row">
        <div class="col-md-5">
          <h6 class="mb-0"><label>Temporary Connection Date</label><span>:</span></h6>
        </div>
        <div class="col-md-7">{{ date('d-m-Y',strtotime($bill_detail->tmp_c_dt))}}</div>
      </div>
    </li>
    <li class="admin-basic-list px-3">
      <div class="row">
        <div class="col-md-5">
          <h6 class="mb-0"><label>Dues</label><span>:</span></h6>
        </div>
        <div class="col-md-7">No dues found.</div>
      </div>
    </li>
    <li class="admin-basic-list px-3">
      <div class="row">
        <div class="col-md-5">
          <h6 class="mb-0"><label>Credit Balance</label><span>:</span></h6>
        </div>
        <div class="col-md-7">No dues found.</div>
      </div>
    </li>
</ul>



<!-- simplest demo tab -->

<div class="tabs container table_cus">
  <a id="t2"></a> <a href="#t2">Receipt</a>
	<div>
      <table class="rwd-table m-0">
        <tbody>
          <tr>
            <th style="width: 3%;">Sl. No.</th>
            <th>Receipt Date</th>
            <th>Receipt No.</th>
            <th>Type</th>
            <th>Payment Mode</th>
            <th>Amount</th>
            <th>Actions</th>
          </tr>
          
          
          <tr>
            <td data-th="Sl. No.">1</td>
            <td data-th="Receipt Date">10/06/2024</td>
            <td data-th="Receipt No.">24-25/OLP/122472</td>
            <td data-th="Type">Receipt</td>
            <td data-th="Payment Mode">OLP</td>
            <td data-th="Amount">₹3,048.00</td>
            <td data-th="Actions">₹3,048.00</td>
          </tr>
          <tr>
            <td data-th="Sl. No.">2</td>
            <td data-th="Receipt Date">10/06/2024</td>
            <td data-th="Receipt No.">24-25/OLP/122472</td>
            <td data-th="Type">Receipt</td>
            <td data-th="Payment Mode">OLP</td>
            <td data-th="Amount">₹3,048.00</td>
            <td data-th="Actions"><a class="btn btn-sm btn-primary" href="#openModal-about">View</a></td>
          </tr>
          
          
        </tbody>
      </table>   
  </div>
	<a id="t1"></a><a href="#t1">Make Payment</a>
    <div>    
      <table class="rwd-table m-0">
        <tbody>
          <tr>
            <th style="width: 3%;">Sl. No.</th>
            <th>Collected for</th>
            <th>Total Due Amount <small>(Selected for payment)</small></th>
          </tr>    
          <tr>
            <td data-th="Sl. No.">1</td>
            <td data-th="Collected for">Water Charges</td>
            <td data-th="Total Due Amount(Selected for payment)">₹{{$bill_detail->w_os_amt_wi_d}}</td>
          </tr>
          <tr>
            <td data-th="Sl. No.">2</td>
            <td data-th="Collected for">Drainage  Charges</td>
            <td data-th="Total Due Amount(Selected for payment)">₹{{$bill_detail->d_os_amt_wi_d}}</td>
          </tr>
          <tr>
            <td data-th="Sl. No.">3</td>
            <td data-th="Collected for">Total</td>
            <td data-th="Total Due Amount(Selected for payment)">₹{{$bill_detail->tb_amount}}</td>
          </tr>          
        </tbody>
      </table>
      <div class="d-flex justify-content-center mt-3"><a class="btn btn-warning btn-sm" href="#openModal-make-payment">Make Payment</a></div>
    </div>
</div>



<!--modals-->
<div id="openModal-about" class="modalDialog">
  <div>
         <a href="#close" title="Close" class="close">X</a>
        <ul class="vesell-view press mt-4">
          <li class="admin-basic-list px-3">
            <div class="row">
            <div class="col-md-5">
              <h6 class="mb-0"><label>CMC No.</label><span>:</span></h6>
            </div>
            <div class="col-md-7">08/097/13202/000</div>
            </div>
          </li>
          <li class="admin-basic-list px-3">
            <div class="row">
              <div class="col-md-5">
                <h6 class="mb-0"><label> Receipt No</label><span>:</span></h6>
              </div>
              <div class="col-md-7">24-25/OLP/122472</div>
            </div>
          </li>
          <li class="admin-basic-list px-3">
            <div class="row">
              <div class="col-md-5">
                <h6 class="mb-0"><label>Name</label><span>:</span></h6>
              </div>
              <div class="col-md-7">S.A.SABARI NATHAN</div>
            </div>
          </li>
          <li class="admin-basic-list px-3">
            <div class="row">
              <div class="col-md-5">
                <h6 class="mb-0"><label>Address</label><span>:</span></h6>
              </div>
              <div class="col-md-7">89(42), PALAYAM PILLAI NAGAR 1ST AND 2ND STREET, AYANAVARAM, AYANAVARAM, Chennai - 600023</div>
            </div>
          </li>
          <li class="admin-basic-list px-3">
            <div class="row">
              <div class="col-md-5">
                <h6 class="mb-0"><label>Receipt Date</label><span>:</span></h6>
              </div>
              <div class="col-md-7">10/06/2024</div>
            </div>
          </li>
          <li class="admin-basic-list px-3">
            <div class="row">
              <div class="col-md-5">
                <h6 class="mb-0"><label>Receipt Amount</label><span>:</span></h6>
              </div>
              <div class="col-md-7">₹30.00</div>
            </div>
          </li>
          
          <li class="admin-basic-list px-3">
            <div class="row">
              <div class="col-md-5">
                <h6 class="mb-0"><label>Type</label><span>:</span></h6>
              </div>
              <div class="col-md-7">Receipt</div>
            </div>
          </li>
          <li class="admin-basic-list px-3">
            <div class="row">
              <div class="col-md-5">
                <h6 class="mb-0"><label>Mode of Payment</label><span>:</span></h6>
              </div>
              <div class="col-md-7">Online Payment</div>
            </div>
          </li>
          <li class="admin-basic-list px-3">
            <div class="row">
              <div class="col-md-5">
                <h6 class="mb-0"><label>Transaction No</label><span>:</span></h6>
              </div>
              <div class="col-md-7">I240600063451</div>
            </div>
          </li>
          <li class="admin-basic-list px-3">
            <div class="row">
              <div class="col-md-5">
                <h6 class="mb-0"><label>Transaction Date</label><span>:</span></h6>
              </div>
              <div class="col-md-7">10/06/2024</div>
            </div>
          </li>
          <li class="admin-basic-list px-3">
            <div class="row">
              <div class="col-md-5">
                <h6 class="mb-0"><label>Bank Ref. No</label><span>:</span></h6>
              </div>
              <div class="col-md-7">pay_OKyxwPq4pwvIya</div>
            </div>
          </li>
          <li class="admin-basic-list px-3">
            <div class="row">
              <div class="col-md-5">
                <h6 class="mb-0"><label>Status</label><span>:</span></h6>
              </div>
              <div class="col-md-7">Success</div>
            </div>
          </li>
      </ul>


      <table class="rwd-table" style="margin-top: 20px;">
          <tbody>
            <tr>
              <th style="width: 3%;">Sl. No.</th>
              <th>Term</th>
              <th>Demand</th>
              <th>Advance Amount</th>
              <th>Total Amount</th>
            </tr>

            
            <tr>
              <td data-th="Tax" colspan="5">Tax</td>
            </tr>
            
            <tr>
              <td data-th="Sl. No.">1</td>
              <td data-th="Term">24-25/I (Apr-Sep)</td>
              <td data-th="Demand">₹87,097.00</td>
              <td data-th="Surcharge"></td>
              <td data-th="Total Amount">₹3,048.00</td>
            </tr>
            <tr>
              <td data-th="Total" colspan="2" style="text-align: right;">Total</td>
              <td data-th="Demand">₹87,097.00</td>
              <td data-th="Surcharge"></td>
              <td data-th="Total Amount">₹3,048.00</td>
            </tr>
            <tr>
              <td data-th="Tax" colspan="5">Charges</td>
            </tr>
            
            <tr>
              <td data-th="Sl. No.">1</td>
              <td data-th="Term">24-25/I (Apr-Sep)</td>
              <td data-th="Demand">₹87,097.00</td>
              <td data-th="Surcharge"></td>
              <td data-th="Total Amount">₹3,048.00</td>
            </tr>
            <tr>
              <td data-th="Total" colspan="2" style="text-align: right;">Total</td>
              <td data-th="Demand">₹87,097.00</td>
              <td data-th="Surcharge"></td>
              <td data-th="Total Amount">₹3,048.00</td>
            </tr>
            <tr>
              <td data-th="Grand Total" colspan="2" style="text-align: right;">Grand Total</td>
              <td data-th="Demand">₹87,097.00</td>
              <td data-th="Surcharge"></td>
              <td data-th="Total Amount">₹3,048.00</td>
            </tr>
            
          </tbody>
      </table>
</div>
</div>





<div id="openModal-make-payment" class="modalDialog">
  <div>
         <a href="#close" title="Close" class="close">X</a>
         <div class="white_card_body">
			<div class="card-body">
			<form name="payment" method="post" id="FormEdit" enctype="multipart/form-data" action="#" > 
				<input type='hidden' name='_token' value="{{ csrf_token() }}" />
				<div class="form-row charge_back_policy">
          <h2 class="text-center pt-0 pb-2">Charge Back Policy</h2>     
          <h3 class="term_txt">Terms & Conditions :-</h3>
            <ul class="fw-bold danger list-group list-group-flush list-group-numbered">
            <li class="list-group-item">The transaction once done cannot be cancelled.</li>
            <li class="list-group-item">Fees once paid is not refundable in any case.</li>
            <li class="list-group-item">Refund claims (if found eligible and admissible) will be entertained ONLY OFFLINE and NO ONLINE REFUNDS will be done.</li>
            <li class="list-group-item">Convenience fees / Bank charges, Commission of Bank plus service tax would be charged (if applicable) in addition to the fee Amount and can't be claim back as refund.</li>
            <li class="list-group-item">“This transaction is payment towards Government dues, fees hence would not be covered under chargeback policy.”</li>
            </ul>
          </div>
          <div class="form-row mt-3" >
            <ul class="list-group">
              <li class="list-group-item" style="border: 0px;">
                <input  name="payment" class="form-check-input me-1 payment check" id="payment" type="checkbox" value="" aria-label="...">
                I/We agree and accept all the terms and conditions mention above and I/We hereby certify that no online chargeback claim will be made in this regards.<br> &nbsp; &nbsp;&nbsp;&nbsp; Please check all details before clicking on confirm button.
              </li>
            </ul>				
          </div>
          <div class="form-group mt-3">
            <button type="submit" id="btnSubmit" name="btnSubmit" class="btn btn-primary">Confirm</button>
            <button type="button" class="btn btn-danger mx-2">Cancle</button>
          </div>          
				</div>

				<input type="hidden" id="aplNo" class="form-control" name="aplNo" value="1">
        <input type="hidden" id="cust_no" class="form-control" name="cust_no" value="{{$bill_detail->cust_no}}">
        <input type="hidden" id="cust_name" class="form-control" name="cust_name" value="{{$bill_detail->cust_name}}">
				<input type="hidden" id="apl_type" class="form-control" name="apl_type" value="single">
				<input type="hidden" id="form_type" class="form-control" name="form_type" value="test">
				<input type="hidden" name="action" value="add" />
				<input type="hidden" style="display:none;" id="RandomNumberHash" name="RandomNumberHash" value="" />
				<input type="hidden" id="submission_id" class="form-control" name="submission_id" value="1">
			</form>

			<form method="POST" id="ctp" name="ctp" action="https://cybertreasuryuat.gujarat.gov.in/CyberTreasury_UAT/connectDept?service=DeptPortalConnection">
				<input id="ctp_data" type="hidden" name="CTP_DATA" value="">
				<input id="dept_call" type="hidden" name="Dept_call" value="first">
				<input id="ru" type="hidden" name="RU" value=""><!-- Return url -->
				<input id="du" type="hidden" name="DU" value="">
			</form>
			</div>
		</div>
</div>
      </div>


</section>
@include('master_theme/footer')
</body>
@push('footer-script')

<script type="text/javascript">
$('#FormEdit').on("submit", function(event) { alert(event);
    event.preventDefault();

    var formData = new FormData(this);

    $.ajax({
        url: '{{ route('makepayment') }}',
        type: "POST",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        dataType: 'json',
        success: function(output) {
            ///console.log(output);

            if (output.code == 0 || output.code == -1) {
               /* var formArray = ['payment'];
                return showAlert(output.code, output.message, 'online_payment.php', 'form', formArray);*/
            } else {
                $("#ctp_data").val(output.CTP_DATA);
                $("#ru").val(output.RU);
                $("#du").val(output.DU);

                $("#ctp").submit(); // Assuming this triggers another form submission
            }
        }
    });
});
</script>
</html>


