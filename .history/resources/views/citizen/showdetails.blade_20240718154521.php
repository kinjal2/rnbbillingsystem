@include('master_theme/header')
<!--/.header-wrapper-->
@include('master_theme/navbar')

<section id="fontSize" class="wrapper body-wrapper ">



<ul class="vesell-view press mt-4">
    <li class="admin-basic-list px-3">
      <div class="row">
      <div class="col-md-5">
        <h6 class="mb-0"><label>New Bill Number</label><span>:</span></h6>
      </div>
      <div class="col-md-7">08/097/013202</div>
      </div>
    </li>
    <li class="admin-basic-list px-3">
      <div class="row">
        <div class="col-md-5">
          <h6 class="mb-0"><label> Existing Bill Number</label><span>:</span></h6>
        </div>
        <div class="col-md-7">08/097/13202/000</div>
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
        <div class="col-md-7">₹87,097.00</div>
      </div>
    </li>
    
    <li class="admin-basic-list px-3">
      <div class="row">
        <div class="col-md-5">
          <h6 class="mb-0"><label>Eff. from</label><span>:</span></h6>
        </div>
        <div class="col-md-7">22-23/I (Apr-Sep)</div>
      </div>
    </li>
    <li class="admin-basic-list px-3">
      <div class="row">
        <div class="col-md-5">
          <h6 class="mb-0"><label>Tax</label><span>:</span></h6>
        </div>
        <div class="col-md-7">₹3,048.00 / Half Year</div>
      </div>
    </li>
    <li class="admin-basic-list px-3">
      <div class="row">
        <div class="col-md-5">
          <h6 class="mb-0"><label>Class & Category:</label><span>:</span></h6>
        </div>
        <div class="col-md-7">Domestic-F-UM</div>
      </div>
    </li>
    <li class="admin-basic-list px-3">
      <div class="row">
        <div class="col-md-5">
          <h6 class="mb-0"><label>Eff. from</label><span>:</span></h6>
        </div>
        <div class="col-md-7">2019/04</div>
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
        <td data-th="Actions">view</td>
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
        <td data-th="Collected for">Tax</td>
        <td data-th="Total Due Amount(Selected for payment)">₹87,097.00</td>
        <td data-th="Advance Amount">₹87,097.00</small></td>
        <td data-th="Total Amount">₹3,048.00</td>
      </tr>
      <tr>
        <td data-th="Sl. No.">2</td>
        <td data-th="Collected for">Charges</td>
        <td data-th="Total Due Amount(Selected for payment)">₹87,097.00</td>
        <td data-th="Advance Amount">Pay in Advance</small></td>
        <td data-th="Total Amount">₹3,048.00</td>
      </tr>
    
      
    </tbody>
  </table>
      </div>
</div>




</section>
@include('master_theme/footer')
</body>
</html>


