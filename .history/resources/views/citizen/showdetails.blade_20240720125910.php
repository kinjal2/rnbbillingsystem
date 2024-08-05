@include('master_theme/header')
<!--/.header-wrapper-->
@include('master_theme/navbar')

<section id="fontSize" class="wrapper body-wrapper ">



<ul class="vesell-view press mt-4">
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

<div class="tabs">
  <a id="t2"></a> <a href="#t2">Receipt</a>
	<div>
      <table class="rwd-table">
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
            <td data-th="Actions"><a href="#openModal-about">View</a></td>
          </tr>
          
          
        </tbody>
      </table>   
  </div>
	<a id="t1"></a><a href="#t1">Make Payment</a>
    <div>    
      <table class="rwd-table">
        <tbody>
          <tr>
            <th style="width: 3%;">Sl. No.</th>
            <th>Collected for</th>
            <th>Total Due Amount <br><small>(Selected for payment)</small></th>
            <th>Payment </th>
          </tr>    
          <tr>
            <td data-th="Sl. No.">1</td>
            <td data-th="Collected for">Water Charges</td>
            <td data-th="Total Due Amount(Selected for payment)">₹{{$bill_detail->w_os_amt_wi_d}}</td>
            <td data-th="Advance Amount"></small></td>
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
            <td data-th="Advance Amount"> <a href="#openModal-make-payment">Make Payment</a></small></td>
          </tr>          
        </tbody>
      </table>
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
				<div class="form-row">
				<div class="form-group col-md-6">
				<label for="payment mode">Charge Back Policy</label>
				<h4>Terms & Conditions :-</h4>
        <ul class="fw-bold danger">
				<li>The transaction once done cannot be cancelled.</li>
				<li>Fees once paid is not refundable in any case.</li>
				<li>Refund claims (if found eligible and admissible) will be entertained ONLY OFFLINE and NO ONLINE REFUNDS will be done.</li>
				<li>Convenience fees / Bank charges, Commission of Bank plus service tax would be charged (if applicable) in addition to the fee Amount and can't be claim back as refund.</li>
				<li>“This transaction is payment towards Government dues, fees hence would not be covered under chargeback policy.”</li>
				</ul>
				</div>
				<div class="form-group col-md-6">
				
				</div>
				</div>
				<div class="form-row bank" >
				<div class="form-group col-md-4">
				<input name="payment" class="payment check" type="checkbox" value="1" id="payment">
				<label class="form-check-label danger" for="payment">
				I/We agree and accept all the terms and conditions mention above and I/We hereby certify that no online chargeback claim will be made in this regards.
				</label><br>
				<span class="red" id="payment-error"></span>
				<h4 class="fw-bold danger text-md-center">Please check all details before clicking on confirm button</h4>
				</div>
				<div class="form-group col-md-4">
				<button type="submit" id="btnSubmit" name="btnSubmit" class="btn btn-primary">
											<i class="icon-check2"></i>
											Confirm
										</button>
				</div>
				<div class="form-group col-md-4">
				<button type="button" class="btn btn-warning mr-1" onclick="window.close()">
											<i class="icon-cross2"></i> Cancel
										</button>
				</div>
				</div>
				<input type="hidden" id="aplNo" class="form-control" name="aplNo" value="1">
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
</html>


