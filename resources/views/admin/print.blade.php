@include('includes.adminHeader')
<style>
@media print {
  .hidden-print {
    display: none !important;
  }
  @page { size: auto;  margin: 0mm; }
}
.main-footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  text-align: center;
}
.page {
    padding:50px;
}
.header-print{
    padding-left: 50px;
    padding-right: 50px;
}
.i-box{
    color: #fff;
    font-weight: bold;
    
    background-color: #666666; 
    padding: 10px;
    padding-top:17px;
}    
.thankYou{
    font-family: 'Pacifico', cursive;
    font-size: 70px;
}
.comeagain{
    font-family: 'Lexend Tera', sans-serif;
    font-size: 20px;
}
.footer{
    font-family: 'Lexend Tera', sans-serif;
    font-size:12px;
    text-align: center;
}
.name{
    padding-top:40px; 
}
</style>
<link href="https://fonts.googleapis.com/css?family=Lexend+Tera|Pacifico&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
<br>
@php
    date_default_timezone_set('Asia/Colombo');
@endphp
<center><button onclick="CreatePrint()" class="btn btn-danger hidden-print">Print</button></center>
    <div class="container" >
        <div class="header-print">
        <div class="row">
            <div class="col-3">
                 <img class="logo" src="{{ asset('public/images/project-logo.png')}}" width="100px" alt="">
            </div>
            <div class="col-9">
                <div class="name float-right">
                    <h3>INVOICE Secret Paradise Villa | Hiriketiya</h3>
                   Issue Date : {{date("F j, Y, g:i a")}}
                </div>
            </div>
        </div>
    </div> 
        <hr>
        <div class="page">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <p><b>Billed to:</b> <span id="CustomerId"></span> </P>
                {{$BillName}},<br>
                {{$BillCustomerCountry}},<br>
                {{$BillCustomerEmail}} <br>
                {{$BillCustomerContact}}
            </div>
            <div class="col-md-3 col-sm-3">
                <center>
                    <p><b>Arrival date:</b> <span id="CustomerId"></span> </P>
                    {{$BillArrivalDate}}
                </center>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="float-right">
                    <p><b>Departure date:</b> <span id="CustomerId"></span> </P>
                    {{$BillDepartureDate}}
                </div>    
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="float-right">
                    <p><b>Booking No:</b> <span id="CustomerId"></span> </P>
                    {{$BillBookingId}}
                </div>    
            </div>
        </div>
        <br><br>
        <div class="row">
            <table width="100%" class="table table-bordered">
                <thead >
                    <tr>
                        <th style="width:70%">Description</th>
                        <th style="width:15%">Qty</th>
                        <th style="width:15%">Rate ($)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="RoomDetails">
                        <td>{{$BillRoomName}}</td>
                        <td>{{$BillRoomQty}}</td>
                        <td><span class="float-right">{{number_format($BillRoomRate,2)}}</span></td>
                    </tr>
                    @if ($BillPackageName != null)
                        <tr id="PackageDetails">
                            <td>{{$BillPackageName}}</td>
                            <td>-</td>
                            <td><span class="float-right">{{number_format($BillPackageRate,2)}}</span></td>
                        </tr>
                    @endif
                    @if ($BillBedRate != null)
                    <tr id="AdditionalBedDetails">
                        <td>Additional Bed</td>
                        <td>{{$BillBedQty}}</td>
                        <td><span class="float-right">{{number_format($BillBedRate,2)}}</span></td>
                    </tr>
                    @endif
                    @foreach ($billDetails as $item)
                    <tr id="OrdersDetails">
                        <td>
                            <span>{{$item->bill_pro_name}} </span> 
                        </td>
                        <td>{{$item->bill_pro_qty}}</td>
                        <td><span class="float-right">{{number_format($item->bill_pro_price,2)}}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <br><br>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-3"></div>
            <div class="col-5 ">
            <p class="float-right"><b>Sub total : ${{number_format($OrdersSubTotal,2)}}</b></p>
            </div>
        </div>
        @if ($OrdersDiscount != 0)
        <div class="row">
            <div class="col-4"></div>
            <div class="col-3"></div>
            <div class="col-5 ">
            <p class="float-right"><b>Discount : ${{number_format($OrdersDiscount,2)}}</b></p>
            </div>
        </div>
        @endif
        @php
            $tax = $OrdersSubTotal * 10 / 100;
        @endphp
        <div class="row">
            <div class="col-4"></div>
            <div class="col-3"></div>
            <div class="col-5 ">
            <p class="float-right"><b>Service Charge(10%) : ${{number_format($tax,2)}}</b></p>
            </div>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-3"></div>
            <div class="col-5 ">
                <p class="float-right"><b>{{$paymentMethod}} payment</b></p>
            </div>
        </div>
        @php
            $Total = $OrdersGrandTotal + $tax;
        @endphp
        <div class="row">
            <div class="col-4"></div>
            <div class="col-3"></div>
            <div class="col-5">
                <div class="float-right">
                    <p>Invoice  Total: <span style="font-size:25px">${{number_format($Total,2)}}<span></p>
                </div>
            </div>
        </div>
       <div class="row float-right payment-btn">
        <form method="POST" action="https://sandbox.payhere.lk/pay/checkout">
            <input type="hidden" name="merchant_id" value="1235376">    
            <input type="hidden" name="return_url" value="http://localhost/secretparadise/public/payment-success">
            <input type="hidden" name="cancel_url" value="http://localhost/secretparadise/public/payment-cancel">
            <input type="hidden" name="notify_url" value="http://localhost/secretparadise/public/payment-notify">

            <input type="hidden" name="items" value="Room Booking">
            <input type="hidden" name="order_id" value="{{ $BillBookingId }}">
            <input type="hidden" name="amount" value="{{ $amount }}">
            <input type="hidden" name="currency" value="LKR">

            <input type="hidden" name="first_name" value="{{ $BillName }}">
            <input type="hidden" name="email" value="{{ $BillCustomerEmail }}">
            <input type="hidden" name="phone" value="{{ $BillCustomerContact }}">
            <input type="hidden" name="address" value="Hiriketiya">
            <input type="hidden" name="city" value="Dikwella">
            <input type="hidden" name="country" value="Sri Lanka">

            <input type="hidden" name="hash" value="{{ $hash }}">

            <input type="submit" class="btn btn-book btn-block">
                Pay Now
            </button>
        </form>
        </div>

        <!-- <div class="row float-right payment-btn"><p><a href="" target="_blank" class="btn btn-book pay btn-block">Pay Now</a></p></div> -->
        <br><br>
        
        
        <div class="row main-footer" style="margin-top:100px">
            <div class="col-md-12">
                <center>
                <span class="footer">
                    Secret Paradise Villa, Hiriketiya Beach, Dikwella, Sri Lanka
                </span>
                </center>
            </div>
            <div class="col-md-12">
                <center>
                <span class="footer">
                    info@secretparadise.lk
                </span>
                </center>
            </div>
            <div class="col-md-12">
                <center>
                <span class="footer">
                   +94 71 215 6430
                </span>
                </center>
            </div>
        </div>
    </div>
</div>   

<script>
    function CreatePrint() {
        window.print();
    }
    
</script>
@include('includes.adminFooter')