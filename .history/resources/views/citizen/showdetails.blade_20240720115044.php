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
          <h6 class="mb-0"><label>Eff. from</label><span>:</span></h6>
        </div>
        <div class="col-md-7"></div>
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
          <h6 class="mb-0"><label>Class & Category:</label><span>:</span></h6>
        </div>
        <div class="col-md-7"></div>
      </div>
    </li>
    <li class="admin-basic-list px-3">
      <div class="row">
        <div class="col-md-5">
          <h6 class="mb-0"><label>Eff. from</label><span>:</span></h6>
        </div>
        <div class="col-md-7"></div>
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
		<a id="t2"></a>
		  <a href="#t2">Receipt</a>
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
		<a id="t1"></a>
		  <a href="#t1">Make Payment</a>
		  <div>
        
      <table class="rwd-table">
    <tbody>
      <tr>
        <th style="width: 3%;">Sl. No.</th>
        <th>Collected for</th>
        <th>Total Due Amount <br><small>(Selected for payment)</small></th>
        <th>Advance Amount</th>
        <th>Total Amount</th>
      </tr>
      
      
      <tr>
        <td data-th="Sl. No.">1</td>
        <td data-th="Collected for">Water Charges</td>
        <td data-th="Total Due Amount(Selected for payment)">₹87,097.00</td>
        <td data-th="Advance Amount">₹87,097.00</small></td>
        <td data-th="Total Amount">₹3,048.00</td>
      </tr>
      <tr>
        <td data-th="Sl. No.">2</td>
        <td data-th="Collected for">drainage  Charges</td>
        <td data-th="Total Due Amount(Selected for payment)">₹87,097.00</td>
        <td data-th="Advance Amount">Pay in Advance</small></td>
        <td data-th="Total Amount">₹3,048.00</td>
      </tr>
    
      
    </tbody>
  </table>
      </div>
</div>



<!--modals-->
<div id="openModal-about" class="modalDialog" style="height: 100vh; overflow-y:scroll;">
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


</section>
@include('master_theme/footer')
</body>
</html>


