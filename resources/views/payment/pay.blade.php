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
<div class="row p-5">
    <div class="container">
        <h3>Payment</h3>
 
        
<form method="POST" action="https://sandbox.payhere.lk/pay/checkout">

    <input type="hidden" name="merchant_id" value="1235376">

    <input type="hidden" name="return_url" value="http://localhost/success">
    <input type="hidden" name="cancel_url" value="http://localhost/cancel">
    <input type="hidden" name="notify_url" value="http://localhost/notify">

    <input type="hidden" name="order_id" value="TEST123">
    <input type="hidden" name="items" value="Test Payment">
    <input type="hidden" name="amount" value="100.00">
    <input type="hidden" name="currency" value="LKR">

    <input type="hidden" name="first_name" value="Test">
    <input type="hidden" name="email" value="test@test.com">
    <input type="hidden" name="phone" value="0771234567">
    <input type="hidden" name="address" value="Colombo">
    <input type="hidden" name="city" value="Colombo">
    <input type="hidden" name="country" value="Sri Lanka">

    <input type="hidden" name="hash" value="3156D02F5B468F39681F98A9C9B57F12">

    <button type="submit">TEST PAY</button>
</form>
    </div>
</div>
@include('includes.adminFooter')