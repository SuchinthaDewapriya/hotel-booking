@extends('layouts.admin')

@section('adminContent')
<section class="content">
    <div class="row main-padding">
        <h3>Admin Checkout</h3>
    </div>

    <div class="Admincheckout">
        <div class="row main-padding checkout" style="padding-right:20px;">
            <div class="col-md-6">
                <div class="card reservation-card">
                    <div class="card-body">
                        <div class="card reservation-card1">
                            <div class="card-body">
                                <div id="message"></div>
                                <div class="row">
                                    <div class="col-3">
                                        <span>Subtotal ($):</span> 
                                    </div>
                                    <div class="col-2">
                                        <span class="float-right">{{$FinalTotal}}</span>
                                    </div>
                                </div>
                                <div class="row couponRow">
                                    <form id="couponsForm" style="padding-top:10px;">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <input type="text" style="border: 1px solid #6AC7B4;" class="form-control" name="coupons" id="coupons" placeholder="Coupon code">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="button" onclick="CouponBtn()" class="btn btn-danger"  value="Add">
                                            </div>
                                        </div>    
                                    </form>
                                </div>
                                <div class="discountRow"></div>
                                <div class="row finalTotalRow">
                                    <div class="col-3">
                                        <span>Total ($):</span> 
                                    </div>
                                    <div class="col-2">
                                        <span class="float-right">{{$FinalTotal}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>

        <div class="row main-padding checkout" style="padding-right:20px;">
            <div class="col-md-12">
                <div class="card reservation-card">
                    <div class="card-body">
                        <div class="card reservation-card1">
                            <div class="card-body">
                                <div class="card-title"><center><h4 class="admin-checkout-heading">Already Customer</h4></center><hr><br></div>
                                <form method="post" id="CheckCustomersForm">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-10">
                                            <input type="text" style="border: 1px solid #6AC7B4;" class="form-control" name="nic" id="fname" placeholder="Customer NIC or Passport No">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="button" onclick="checkCustomers()" class="btn btn-danger"  value="Check">
                                        </div>
                                    </div>    
                                </form>
                                <div id="Customersresult">
                                    <div class="row">
                                        <div class="col-12">
                                            <center><img width="20px" src='{{ asset('public/images/reserveLoader.gif') }}' id="CustomerLoader" style='display:none ; width:100px; color:#6AC7B4;'></center>
                                        </div>
                                    </div>                                
                                    <div id="DetailsResult">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>

        <div class="row main-padding checkout" style="padding-right:20px;">
            <div class="col-md-12">
                <div class="card reservation-card">
                    <div class="card-body">
                        <div class="card reservation-card1">
                            <div class="card-body">
                                <div class="card-title"><center><h4 class="admin-checkout-heading">New Customer</h4></center><hr><br></div>
                                    <form method="post" id="BookingForm">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label for="Salutation">Salutation</label>
                                                <select name="salutation" id="Salutation" class="form-control">
                                                    <option value="Mr">Mr</option>
                                                    <option value="Miss">Miss</option>
                                                    <option value="Mrs">Mrs</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="fname">First Name</label>
                                                <input type="text" class="form-control" name="FirstName" id="fname" placeholder="First Name">
                                            </div>
                                            <div class="form-group col-md-5">
                                            <label for="lname">Last Name</label>
                                            <input type="text" class="form-control" name="LastName" id="lname" placeholder="Last Name">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="bday">Date of Birth</label>
                                                <input type="date" class="form-control" name="bday" id="bday" placeholder="Date of birth">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="nic">NIC or Passport no</label>
                                                <input type="text" class="form-control" name="nic" id="nic" placeholder="NIC No or Passport No">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            @php
                                                $country = DB::table('apps_countries')->get();
                                            @endphp
                                            <label for="country">Country</label>
                                            <select name="country" class="form-control" id="country">
                                                <option value="Sri Lanka">Select country</option>
                                                @foreach ($country as $item)
                                                    <option value="{{$item->country_name}}">{{$item->country_name}}</option>    
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="mobile">Mobile</label>
                                            <input type="tel" class="form-control" name="mobile" id="mobile" placeholder="Contact number">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="note">Note</label>
                                            <textarea id="note" class="form-control" name="note" rows="3" placeholder="Note"></textarea>
                                        </div>
                                        <input type="hidden" name="quantity" value="{{$quantity}}">
                                        @if ($bed != '')
                                        @foreach ($bed as $item)
                                        <input type="hidden" name="bed[]" value="{{$item}}">
                                        @endforeach
                                        @endif
                                        
                                        {{-- <input type="hidden" name="bed[]" value="{{$bed}}"> --}}
                                        @foreach ($setting as $item)
                                            <input type="hidden" name="OwnerMail" value="{{$item->s_mail}}">
                                        @endforeach
                                        
                                        <input type="hidden" name="package" value="{{$package}}">
                                        <input type="hidden" name="ratebed" value="{{$ratebed}}">
                                        <input type="hidden" name="fixedrate"  value="{{$fixedrate}}">
                                        <input type="hidden" name="id" value="{{$id}}">
                                        <input type="hidden" name="r_name" value="{{$r_name}}">
                                        <input type="hidden" name="additionalPackage" value="{{$additionalPackage}}">
                                        <input type="hidden" name="TotalRoomRate" id="TotalRoomRate" value="{{$TotalRoomRate}}">
                                        <input type="hidden" name="TotalBedRate" id="TotalBedRate" value="{{$TotalBedRate}}">
                                        <input type="hidden" name="TotalPackageRate" id="TotalPackageRate" value="{{$TotalPackageRate}}">
                                        <input type="hidden" name="Discount" id="Discount" value="">
                                        <input type="hidden" name="CouponName" id="CouponID" value="">
                                        <input type="hidden" name="FinalTotal" id="FinalTotal" value="{{$FinalTotal}}">
                                        <input type="hidden" name="packagerate" value="{{$packagerate}}">
                                        <input type="hidden" name="days" value="{{$days}}">
                                        <input type="hidden" name="checkIn" value="{{$checkIn}}">
                                        <input type="hidden" name="checkOut" value="{{$checkOut}}">
                                        <div style="padding:15px;">
                                            <button type="button" onclick="BookNow()" class="btn btn-primary">Reserve Now <img width="20px" src='{{ asset('public/images/reserveLoader.gif') }}' id="bookingLoader" style='display: none;'></button>
                                        </div>    
                                    </form><br>
                                    <div id="salutationError"></div>
                                    <div id="fnameError"></div>
                                    <div id="lnameError"></div>
                                    <div id="countryError"></div>
                                    <div id="mobileError"></div>
                                    <div id="emailError"></div>
                                    <div id="bdayError"></div>
                                    <div id="nicError"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</section>

<script>
    function CouponBtn() {
        let CouponForm = $('#couponsForm').serialize()
        $.ajax({
            type: "Post",
            url: "{{ url('discount')}}",
            data: CouponForm,
            success: function (response) {
                if (response.coupon != null) {
                    $('#message').empty()
                    $('#message').append('<div class="alert alert-success" role="alert">Successful added coupon!</div>')
                    $('.couponRow').empty()
                    
                    let NewPackage = 0
                    let oldPackage = $('#TotalPackageRate').val()

                    let NewRoom = 0 
                    let oldRoom = $('#TotalRoomRate').val() 

                    let NewBed = 0
                    let oldBed = $('#TotalBedRate').val()

                    let NewTotal = 0
                    let oldTotal = $('#FinalTotal').val()

                    if (response.coupon.coupon_type === "Fixed") {
                        if (response.coupon.coupon_package != null) {
                            NewPackage =  parseInt(response.coupon.coupon_package)
                        }
                        if (response.coupon.coupon_room != null) {
                            NewRoom =  parseInt(response.coupon.coupon_room)
                        }
                        if (response.coupon.coupon_bed != null) {
                            NewBed =  parseInt(response.coupon.coupon_bed)
                        }
                        if (response.coupon.coupon_total != null) {
                            NewTotal =  parseInt(response.coupon.coupon_total)
                        }
                    } else {
                        if (response.coupon.coupon_package != null) {
                            NewPackage =  parseInt(oldPackage) * parseInt(response.coupon.coupon_package) / 100
                        }
                        if (response.coupon.coupon_room != null) {
                            NewRoom =  parseInt(oldRoom) * parseInt(response.coupon.coupon_room) / 100
                        }
                        if (response.coupon.coupon_bed != null) {
                            NewBed =  parseInt(oldBed) * parseInt(response.coupon.coupon_bed) / 100
                        }
                        if (response.coupon.coupon_total != null) {
                            NewTotal =  parseInt(oldTotal) * parseInt(response.coupon.coupon_total) / 100
                        }
                    }

                    let Discount = parseInt(NewPackage) + parseInt(NewRoom) + parseInt(NewBed) + parseInt(NewTotal)
                    let FinalTotal = parseInt(oldTotal) - parseInt(Discount)

                    $('.discountRow').empty()
                    $('.discountRow').append('<div class="row"><div class="col-3">Discount ($):</div><div class="col-2"><span class="float-right">'+Discount+'</span></div></div>')

                    $('.finalTotalRow').empty()
                    $('.finalTotalRow').append('<div class="col-3">Total ($):</div><div class="col-2"><span class="float-right">'+FinalTotal+'</span></div>')

                    let RoomField = parseInt(oldRoom) - parseInt(NewRoom)
                    let BedField = parseInt(oldBed) - parseInt(NewBed)
                    let PackageField = parseInt(oldPackage) - parseInt(NewPackage)
                    let TotalField = parseInt(oldTotal) - parseInt(NewTotal)

                    $('#Discount').attr({"value":Discount})
                    // $('#TotalRoomRate').attr({"value":RoomField})
                    // $('#TotalBedRate').attr({"value":BedField})
                    // $('#TotalPackageRate').attr({"value":PackageField})
                    // $('#FinalTotal').attr({"value":TotalField}) 
                    $('#CouponID').attr({"value":response.coupon.coupon_name}) 
                    
                } else {
                    $('#message').empty()
                    $('#message').append('<div class="alert alert-warning" role="alert">Coupon code is invalid!</div>')
                }
            }
        });
    }
    
        function BookNow() {
            let BookNow = $('#BookingForm').serialize()
            $.ajax({
                type: "POST",
                url: "{{ url('storeData')}}",
                data: BookNow,
                beforeSend: function(){
                // Show image container
                $("#bookingLoader").show();
                },
                success: function (response) {
                    if (response.errors) {
                        $('#salutationError').empty()
                        $('#fnameError').empty()
                        $('#lnameError').empty()
                        $('#countryError').empty()
                        $('#mobileError').empty()
                        $('#emailError').empty()
                        $('#bdayError').empty()
                        $('#nicError').empty()
                        // $('#checkmeError').empty()
    
                        if (response.errors[0] != null) {
                            $('#salutationError').append('<div class="alert alert-danger">'+response.errors[0]+'</div>')
                        }
                        if (response.errors[1] != null) {
                            $('#fnameError').append('<div class="alert alert-danger">'+response.errors[1]+'</div>')
                        }
                        if (response.errors[2] != null) {
                            $('#lnameError').append('<div class="alert alert-danger">'+response.errors[2]+'</div>')
                        }
                        if (response.errors[3] != null) {
                            $('#countryError').append('<div class="alert alert-danger">'+response.errors[3]+'</div>')
                        }
                        if (response.errors[4] != null) {
                            $('#mobileError').append('<div class="alert alert-danger">'+response.errors[4]+'</div>')
                        }
                        if (response.errors[5] != null) {
                            $('#emailError').append('<div class="alert alert-danger">'+response.errors[5]+'</div>')
                        }
                        // if (response.errors[6] != null) {
                        //     $('#checkmeError').append('<div class="alert alert-danger">'+response.errors[6]+'</div>')
                        // }
                        if (response.errors[6] != null) {
                            $('#bdayError').append('<div class="alert alert-danger">'+response.errors[6]+'</div>')
                        }
                        if (response.errors[7] != null) {
                            $('#nicError').append('<div class="alert alert-danger">'+response.errors[7]+'</div>')
                        }
                    } else {
                        $('#salutationError').empty()
                        $('#fnameError').empty()
                        $('#lnameError').empty()
                        $('#countryError').empty()
                        $('#mobileError').empty()
                        $('#emailError').empty()
                        $('#bdayError').empty()
                        $('#nicError').empty()
                        $('#checkmeError').empty()
                        $('.checkoutError').empty()
    
                        swal('Reserved!','Thank you for making reservation with us. We will notify you soon.','success')
                        $('.Admincheckout').empty()
                        $('.Admincheckout').append('<div class="row main-padding checkout" style="padding-right:20px;"><div class="col-12"><div class="card reservation-card reservation-card-success"><div class="card-body"><center><h1>Thank you for making a reservation with us.</h1><span>Reservation is under review, we will get back to you soon.</span></div></div></div></div>')
                    }
                },
                complete:function(data){
                // Hide image container
                $("#bookingLoader").hide();
                }
            });
        }
    function checkCustomers() {
        let CustomersData = $('#CheckCustomersForm').serialize()
        $.ajax({
            type: "POST",
            url: "{{ url('admin/checkCustomers')}}",
            data: CustomersData,
            beforeSend: function(){
            $('#DetailsResult').empty()
            // Show image container
            $("#CustomerLoader").show();
            },
            success: function (response) {
                if (response.length != 0) {
                    $('#DetailsResult').append('<form method="post" id="BookingForm">@csrf<div class="row"><div class="col-md-2"></div><div class="col-md-8"><div class="card"><div class="card-body"><div class="row"><div class="col-md-3"><span><b>Full Name:</b></span></div><div class="col-md-9"><div class="form-group"><input id="my-input" class="form-control" type="text" value="'
                    +response.cd_salutation+'.'+response.cd_first_name+' '+response.cd_last_name+'" disabled><input type="hidden" name="salutation" id="Salutation" value="'
                    +response.cd_salutation+'"><input type="hidden" name="FirstName" id="fname" value="'
                    +response.cd_first_name+'"><input type="hidden" name="LastName" id="lname"  value="'
                    +response.cd_last_name+'"></div></div></div><div class="row"><div class="col-md-3"><span><b>Date of Birth:</b></span></div><div class="col-md-9"><div class="form-group"><input class="form-control" type="date" value="'
                    +response.cd_bday+'" disabled><input type="hidden" name="bday" id="bday" value="'
                    +response.cd_bday+'"></div></div></div><div class="row"><div class="col-md-3"><span><b>NIC or Passport:</b></span></div><div class="col-md-9"><div class="form-group"><input class="form-control" type="text" value="'
                    +response.cd_nic+'" disabled><input type="hidden" name="nic" id="nic" value="'
                    +response.cd_nic+'" ></div></div></div><div class="row"><div class="col-md-3"><span><b>Country:</b></span></div><div class="col-md-9"><div class="form-group"><input class="form-control" type="text" value="'
                    +response.cd_country+'" disabled><input type="hidden" name="country" id="country" value="'
                    +response.cd_country+'"></div></div></div><div class="row"><div class="col-md-3"><span><b>Mobile:</b></span></div><div class="col-md-9"><div class="form-group"><input class="form-control" type="text" name="mobile" id="mobile" value="'
                    +response.cd_phone+'"></div></div></div><div class="row"><div class="col-md-3"><span><b>Email:</b></span></div><div class="col-md-9"><div class="form-group"><input class="form-control" type="email" name="email" id="email" value="'
                    +response.cd_email+'"></div></div></div><div class="row"><div class="col-md-3"><span><b>Note:</b></span></div><div class="col-md-9"><div class="form-group"><textarea id="note" class="form-control" name=""  rows="3">'
                    +response.cd_note+'</textarea></div></div></div><div class="row"><div class="col-12"><input type="hidden" name="quantity" value="{{$quantity}}">@if($bed != '')@foreach($bed as $item)<input type="hidden" name="bed[]" value="{{$item}}">@endforeach'+" "+'@endif'+" "+'@foreach($setting as $item)<input type="hidden" name="OwnerMail" value="{{$item->s_mail}}">@endforeach<input type="hidden" name="package" value="{{$package}}"><input type="hidden" name="ratebed" value="{{$ratebed}}"><input type="hidden" name="fixedrate" value="{{$fixedrate}}"><input type="hidden" name="id" value="{{$id}}"><input type="hidden" name="r_name" value="{{$r_name}}"><input type="hidden" name="TotalPackageRate" id="TotalPackageRate" value="{{$TotalPackageRate}}"><input type="hidden" name="additionalPackage" value="{{$additionalPackage}}"><input type="hidden" name="TotalRoomRate" value="{{$TotalRoomRate}}"><input type="hidden" name="TotalBedRate" value="{{$TotalBedRate}}"><input type="hidden" name="TotalPackageRate" value="{{$TotalPackageRate}}"><input type="hidden" name="Discount" id="Discount" value=""><input type="hidden" name="CouponName" id="CouponID" value=""><input type="hidden" name="TotalPackageRate" value="{{$TotalPackageRate}}"><input type="hidden" name="FinalTotal" value="{{$FinalTotal}}"><input type="hidden" name="packagerate" value="{{$packagerate}}"><input type="hidden" name="days" value="{{$days}}"><input type="hidden" name="checkIn" value="{{$checkIn}}"><input type="hidden" name="checkOut" value="{{$checkOut}}"><center><button type="button" onclick="BookNow()" class="btn btn-primary">Reserve Now <img width="20px" src="{{ asset('public/images/reserveLoader.gif') }}" id="bookingLoader" style="display: none;"></button></center></div></div></div></div></div><div class="col-md-2"></div></div></form>')
                } else {
                    $('#DetailsResult').append('<span>Customer not found</span>')
                }
            },
            complete:function(data){
            // Hide image container
            $("#CustomerLoader").hide();
            }      
            
        });
    }
    </script>
@endsection