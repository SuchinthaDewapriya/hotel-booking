@extends('layouts.app')
@section('title', 'Checkout | Secret Paradise Villa')
@section('meta')
<meta name="description" content="Checkout page for Secret Paradise Villa. Review your booking details, apply coupons, and provide your information to complete your reservation at our luxury villa in Sri Lanka.">
<meta name="keywords" content="Secret Paradise Villa checkout, booking details, apply coupons, reservation information, Sri Lanka villa booking">
@endsection


@section('content')

<section class="check-out-page py-25">
    <div class="container">
        <div class="text-center mb-3" data-aos="fade-up">
            <h1 class="page-title text-center mt-5 hidden">Reservation Checkout </h1>
        </div>
        <div class="gtco-section">
            <div class="gtco-container checkout" data-aos="fade-up">
                <div class="row"> 
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div id="message"></div>
                        <div class="animate-box" data-animate-effect="fadeInRight">
                            <div class="card reservation-card">
                                <div class="card-body">
                                    <div class="card reservation-card1">
                                        <div class="card-body">
                                            <center><h2 class="">Room Details</h2></center><hr><br>
                                            <table class="table table-light">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Name</th>
                                                        <th>Quantity</th>
                                                        <th>
                                                            <div style="float:right;"> 
                                                            Rate ($)
                                                            </div>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <img width="30px" src="{{ asset('public/images/rooms')}}/{{$image}}" alt="">
                                                        </td>
                                                        <td>
                                                            {{$r_name}} for {{$days}} @if($days == 1) Day @else Days @endif
                                                        </td>
                                                        <td>
                                                            {{$quantity}} 
                                                        </td>
                                                        <td>
                                                            <div style="float:right;"> 
                                                                Sub total : ${{$FinalTotal}}
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="row couponRow" >
                                                <div class="col-md-12">
                                                    <div class="float-right" style="float:right;">
                                                        <div >
                                                            <form class="form-inline" id="couponsForm">
                                                                @csrf
                                                                <div class="form-group mx-sm-3 mb-2 float-right">
                                                                    <input type="text" class="form-control float-right" name="coupons" id="coupons" placeholder="Coupons">
                                                                </div>
                                                                <button type="button" onclick="CouponBtn()" class="btn btn-book mb-2 pl-5 pr-5 float-right">Add</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="discountRow"></div>
                                            <div class="finalTotalRow">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="float-right" style="float:right;">
                                                            <div class="" style="padding:7px;">
                                                                Total : ${{$FinalTotal}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="animate-box" data-animate-effect="fadeInRight">
                                <div class="card reservation-card">
                                    <div class="card-body">
                                        <div class="card reservation-card1">
                                            <div class="card-body">
                                                <center><h2 class="card-title">Your Details</h2></center><hr><br>
                                                <form method="post" id="BookingForm">
                                                    @csrf
                                                    <div class="form-row col-md-12">
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
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="bday">Date of Birth</label>
                                                        <input type="date" class="form-control" name="bday" id="bday" placeholder="Date of birth">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="nic">NIC or Passport no</label>
                                                        <input type="text" class="form-control" name="nic" id="nic" placeholder="NIC No or Passport No">
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
                                                    <div class="form-group col-md-12">
                                                        <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="Privacy" id="gridCheck" value="true">
                                                        <label class="form-check-label" for="gridCheck">
                                                            Check me out
                                                        </label>
                                                        </div>
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
                                                        <button type="button" onclick="BookNow()" class="btn btn-book">Reserve Now <img width="20px" src='{{ asset('public/images/reserveLoader.gif') }}' id="bookingLoader" style='display: none;'></button>
                                                    </div>    
                                                </form>
                                                <div id="salutationError"></div>
                                                <div id="fnameError"></div>
                                                <div id="lnameError"></div>
                                                <div id="countryError"></div>
                                                <div id="mobileError"></div>
                                                <div id="emailError"></div>
                                                <div id="checkmeError"></div>
                                                <div id="bdayError"></div>
                                                <div id="nicError"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="col-md-1"></div>
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
                    $('.discountRow').append('<div class="row"><div class="col-md-12"><div class="float-right" style="float:right;"><div class="" style="padding:7px;">Discount : $'+Discount+'</div></div></div></div>')

                    $('.finalTotalRow').empty()
                    $('.finalTotalRow').append('<div class="row"><div class="col-md-12"><div class="float-right" style="float:right;"><div class="" style="padding:7px;">Total : $'+FinalTotal+'</div></div></div></div>')

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

                    swal('Reserved!','Thank you for making a reservation with us. We will notify you soon.','success')
                    $('.checkout').empty()
                    $('.checkout').append('<div class="row"><div class="col-md-1"></div><div class="col-md-10"><div><div class="card reservation-card reservation-card-success"><div class="card-body"><div class="card reservation-card"><div class="card-body"><center><h1>Thank you for making a reservation with us.</h1><span>Reservation is under review, we will get back to you soon.</span></div></div></div></div>')
                }
            },
            complete:function(data){
            // Hide image container
            $("#bookingLoader").hide();
            }
        });
    }

</script>
@endsection