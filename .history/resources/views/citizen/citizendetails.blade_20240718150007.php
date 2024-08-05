@include('master_theme/header')
<!--/.header-wrapper-->
@include('master_theme/navbar')
{{ dd($bill_detail,true)}}
<section id="fontSize" class="wrapper body-wrapper ">

<div class="container-fluid">
  <table class="rwd-table">
    <tbody>
      <tr>
        <th style="width: 3%;">Sl. No.</th>
        <th>Property</th>
        <th  style="width: 20%;">Name & Address</th>
        <th>Annual Value</th>
        <th>Tax/ Half Year</th>
        <th>Class & Category <br><small>Building Type</small></th>
        <th>Total Dues</th>
        <th> Credit Balance</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
      @foreach ($bill_detail as $bill)
<tr>
    <td data-th="Sl. No.">{{ $loop->iteration }}</td>
    <td data-th="Property">
        <div class="property_text">
            <p>New Bill Number:</p>
            <p>{{ $bill->cust_no }}</p>
        </div>
        <div class="property_text">
            <p>Existing Bill Number:</p>
            <p>{{ $bill->cust_no }}</p>
        </div>
    </td>
    <td data-th="Name & Address">
        <div class="flex flex-col gap-1.5">
            <div class="flex flex-col gap-0.5">
                <div class="font-sm">Name:</div>
                <div class="bg_name">{{ $bill->name }}</div>
                <div class="font-sm">Address:</div>
                <div class="bg_address">{{ $bill->address }}</div>
            </div>
            <div class="font-sm">Mobile Number:</div>
            <div class="bg_mobile">{{ $bill->mobile }}</div>
        </div>
    </td>
    <td data-th="Annual Value">
        ₹{{ number_format($bill->annual_value, 2) }}<br><small>({{ $bill->financial_year }})</small>
    </td>
    <td data-th="Tax/ Half Year">
        ₹{{ number_format($bill->tax, 2) }}
    </td>
    <td data-th="Class & Category Building Type">
        {{ $bill->building_type }}<br><small>({{ $bill->assessment_year }})</small>
    </td>
    <td data-th="Total Dues">{{ $bill->total_dues }}</td>
    <td data-th="Credit Balance">{{ $bill->credit_balance }}</td>
    <td data-th="Status"><span class="clr_green">{{ $bill->status }}</span></td>
    <td data-th="Actions"><a class="btn btn-primary">select</a></td>
</tr>
@endforeach

    </tbody>
  </table>

</div>

<div class='clearfix'></div>
<div class='center' style = "margin-top:3%; margin-bottom:5%">

        <ul class="press">
          <li>
          New Bill Number: <span class="sr-only">08/097/013202
          </span>
          </li>
          <li>
          Existing Bill Number:: <span class="sr-only">08/097/13202/000</span>
          </li>
          <li>
          Name: <span class="sr-only">S.A.SABARI NATHAN</span>
          </li>
          <li>
          Address: <span class="sr-only">89(42), PALAYAM PILLAI NAGAR 1ST AND 2ND STREET, AYANAVARAM, AYANAVARAM, Chennai - 600023</span>
          </li>
            
        </ul>
</div>


</section>
@include('master_theme/footer')
</body>
</html>


