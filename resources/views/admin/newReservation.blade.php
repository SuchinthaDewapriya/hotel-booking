@extends('layouts.admin')

@section('adminContent')

<section class="content">
    <div class="row main-padding">
        <h3>New Reservations</h3> 
    </div>
    <form id="checkForm"> 
        @csrf
    <div class="main-padding">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="my-textarea">Arrival Date</label> 
                <input type="date" name="checkIn" id="checkIn" min="<?php echo date('Y-m-d'); ?>" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="my-textarea">Departure Date</label>
                <input type="date" name="checkOut" id="checkOut" min="<?php echo date('Y-m-d'); ?>"  class="form-control" >
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="adults">Adults*</label>
                <input type="number" name="adults" id="adults"  class="form-control" required>                                                   
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="child">Child*</label>
                <input type="number" name="child" id="child"  class="form-control" required>                                                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="my-textarea" > </label>
                <input type="button" onClick="Check()" class="btn btn-primary btn-block" value="Check">
            </div>
        </div> 
    </div> 
    </div> 
    </form>
    <div class="row main-padding">
        <div class="col-md-12">
        <center>
            <div id='searchLoader' style='display: none;'>
                <img src='{{ asset('public/images/dataloader.gif') }}'>
            </div>
        </center>
        <form method="post" id="BookingForm">@csrf
        <div class=" row rooms">
        </div>
        <div id="checkInError"></div>
        <div id="checkOutError"></div>
        <div id="adultsError"></div>
        <div id="childError"></div>
    </div>
    </div>
    </div>
 
</section>

<script type="text/javascript">
    var packagePrice = {}
    var packageBRate = {}
    var packageRate = {
      'price': 0,
      'bedRate': 0
    }
    var additionalBeds = {}
    var roomRates = {}
    var roomQty = {}
    var totalBedRate = {}
    var totalPackageRate = {}
    
    
    function Check() {
        var checkForm = $("#checkForm").serialize();
        $.ajax({
            type: "POST",
            url: "{{ url('checkAvailability') }}",
            data: checkForm,
            beforeSend: function(){
                // Show image container
                $('.rooms').empty();
                $("#searchLoader").show();
            },
            success: function (response) {
                packagePrice = {}
                packageBRate = {}
                packageRate = {
                'price': 0,
                'bedRate': 0
                }
                additionalBeds = {}
                roomRates = {}
                roomQty = {}
                totalBedRate = {}
                totalPackageRate = {}
                    
                let booked_rooms = {}
                if(response.booked_rooms != null){
                    booked_rooms = response.booked_rooms
                }
                                                  
                if (response.errors) {
                    $('#checkInError').empty()
                    $('#checkOutError').empty()
                    $('#adultsError').empty()
                    $('#childError').empty()
    
                    if (response.errors[0] != null) {
                        $('#checkInError').append('<div class="alert alert-danger">'+response.errors[0]+'</div>')
                    }
                    if (response.errors[1] != null) {
                        $('#checkOutError').append('<div class="alert alert-danger">'+response.errors[1]+'</div>')
                    }
                    if (response.errors[2] != null) {
                        $('#adultsError').append('<div class="alert alert-danger">'+response.errors[2]+'</div>')
                    }
                    if (response.errors[3] != null) {
                        $('#childError').append('<div class="alert alert-danger">'+response.errors[3]+'</div>')
                    }
                }
                else{
                    $('#checkInError').empty()
                    $('#checkOutError').empty()
                    $('#adultsError').empty()
                    $('#childError').empty()
                if (response.checkRoom.length != 0) {
                $.each(response.checkRoom, function(k,v){
                    
                    if(!objectHasKey(booked_rooms, v.r_id)){
                        booked_rooms[v.r_id] = 0
                    }
                    // console.log(booked_rooms)
                    var maxquantity = 0;
                    if (response.id ==  1) {
                        maxquantity = parseInt(v.r_quantity) - parseInt(booked_rooms[v.r_id]);
                    } else if(response.id ==  2) { 
                        maxquantity = v.r_quantity;
                    }
                    var pack = ''
                    let room_id = v.r_id
                    $.each(response.packages, function(k,v){
                         pack += '<div class="col-md-6"><section class="custom-section"><div><input type="radio" class="package" id="control_0'
                         +v.p_id+room_id+'" data-idpackage="'+room_id+'" onchange="radioChange('+v.p_additional_bed+', '+v.p_price+', '+room_id+')"  name="package" value="'
                         +v.p_price+'"><label for="control_0'+v.p_id+room_id+'" class="custom-label">'+v.p_name+'</label></div></section></div>'
                    })
                    var roomFirstPrice = v.r_price * response.days
                    $('.rooms').append('<div class="col-md-6"><form id="CartForm" method="POST" action="{{ url('admin/admin-checkout')}}">@csrf<div class="card reservation-card"><div class="card-body"><div class="card reservation-card1"><div class="card-body"><div class="row"><div class="col-md-5"><img src="{{ asset('public/images/rooms')}}/'
                        +v.r_image+'" width="100%" alt=""></div><div class="col-md-7"><h2 class="room-name">'
                        +v.r_name+'<span style="float:right; font-size:16px; padding-top:10px;">($'+v.r_price+'.00)</span></h2><span class="room-name">'+v.r_description+'</span></div></div><hr><div class="row">'
                        +pack+'<input type="radio" class="package unchecked" id="unchecked" name="package" value="0" checked><label for="unchecked" class="custom-label unchecked"></label></div><hr><div class="row"><div class="col-md-12"><div class="additionalRoom'+v.r_id+'"></div></div></div><br><div class="row"><div class="col-md-4">'
                        +'<input onchange="roomQuantityChange('+v.r_id+', '+v.r_price+', '+v.r_additional_bed+')" class="form-control roomQuantity roomQuantity2_'
                        +v.r_id+'" name="quantity" placeholder="Number of Rooms" type="number" max="'
                        +maxquantity+'" data-id="'
                        +v.r_id+'" value="" min="1" id="r_newquantity'
                        +v.r_id+'" required></div><div class="col-md-2"></div><div class="col-md-6 align-middle"><div><span class="rates rates_'
                        +v.r_id+'"><span class="float-left"><small class="small">Total Rates ($): </small></span><span class="float-right">00.00/<small class="small">'+response.days+' Night(s)</small></span></span></div></div><input type="hidden" id="rate" class="totalratebed_'
                        +v.r_id+'" name="ratebed" value="'
                        +v.r_price+'"><input type="hidden" id="rate" class="totalrate_'
                        +v.r_id+'" name="rate" value="'
                        +v.r_price+'"><input type="hidden" id="fixedrate_'
                        +v.r_id+'" name="fixedrate" value="'
                        +v.r_price+'"></div><div class="packageRate_'
                        +v.r_id+'"></div><div class="bedRate_'+v.r_id+'"></div><br><div class="row"><div class="col-md-4"></div><div class="col-md-2"></div><div class="col-md-6"><div id="TotalRate_'
                        +v.r_id+'" ><small class="small totalrate1_'
                        +v.r_id+'"></small></div></div><br><br><input type="hidden" name="id" value="'
                        +v.r_id+'" ><input type="hidden" value="'
                        +v.r_image+'" id="image'
                        +v.r_id+'" name="image"><input type="hidden" name="r_name" id="r_name'
                        +v.r_id+'" value="'
                        +v.r_name+'" ><input type="hidden" class="additionalPackage_'
                        +v.r_id+'" value="" name="additionalPackage"><input type="hidden" id="roomid" value="'
                        +v.r_id+'"><input type="hidden" class="TotalRoomRate_'
                        +v.r_id+'" name="TotalRoomRate" value="0"><input type="hidden" class="TotalBedRate_'
                        +v.r_id+'" name="TotalBedRate" value="0"><input type="hidden" class="TotalPackageRate_'
                        +v.r_id+'" name="TotalPackageRate" value="0"><input type="hidden" class="FinalTotal_'
                        +v.r_id+'" name="FinalTotal" value="0"><input type="hidden" id="additionalbed'
                        +v.r_id+'" name="additionalbed" data-roomid="'
                        +v.r_id+'" value="'
                        +v.r_additional_bed+'"><input type="hidden" name="checkIn" value="'
                        +response.checkIn+'"><input type="hidden" name="adults" value="'
                        +response.adults+'"><input type="hidden" name="child" value="'
                        +response.child+'"><input type="hidden" name="checkOut" value="'
                        +response.checkOut+'"><input type="hidden" name="packagerate" value="" id="packagerate"><input type="hidden" value="'
                        +response.days+'" id="days'
                        +v.r_id+'" name="days"></div><div class="row"><div class="col-12 mobile-padding"><button type="submit" onClick="addToCart('
                        +v.r_id+')" class="btn btn-warning float-right">Reserve</button></div></div></div></form></div>')
                    })
                } else {
                    $('.rooms').append('<div class="alert alert-warning">Sorry! Room is not available.</div>')
                }
                }
                
                
            },
            complete:function(data){
                // Hide image container
                $("#searchLoader").hide();
            }
        });
    }
    
    // Room quantity
    function roomQuantityChange(id, price, bedRate){
      checkPackageValue(id)
      roomQty[id] = $('.roomQuantity2_'+id).val()
      var days = $(".rooms #days"+id).val()
      roomRates[id] = (roomQty[id] * price ) * parseInt(days)
      $('.rates_'+id).html('<span class="float-left"><small class="small">Room Rates ($): </small></span><span class="float-right">'
                            + parseFloat(roomRates[id])
                            + '/<small class="small">'+days+' Night(s)</small></span>')
      $('.rooms .TotalRoomRate_'+id).attr({"value":roomRates[id]});                   
    
      $(".rooms .packageRate_"+id).empty()
      $(".rooms .additionalRoom"+id).empty()
      $(".rooms .bedRate_"+id).empty()
      totalBedRate[id] = 0
      additionalBeds = {}
      console.log(totalBedRate[id])
      if (roomQty[id] > 0) { 
          $(".rooms .additionalRoom"+id).append('<div class="row"><div class="col-md-12"><span style="font-weight:bold; color:#70706A;" class="room-name">Please select room number that you need a additional bed</span><br><br></div></div>')
            $(".rooms .additionalRoom"+id).append('<div style="padding-left:30px;" class="row NewBed'+id+'"></div>')
          for (i = 0; i < roomQty[id]; i++) {
              $(".rooms .NewBed"+id).append('<div class="col-md-6" style="padding:5px;"><div class="custom-control custom-checkbox mr-sm-2"><input type="checkbox" class="custom-control-input additionalbedquantity'+i+'" name="bed[]" value="1" onchange="addBeds('+i+','+bedRate+',this, '+id+')" id="additionalbedquantity'+(i+1)+id+'" placeholder="Room number '+(i+1)+'"><label class="custom-control-label" for="additionalbedquantity'+(i+1)+id+'">Room number '+(i+1)+'</label></div></div>')
          }
          $(".rooms .additionalRoom"+id).append('</div>')
      }
      calBedRate(id)
      radioChange(packageBRate[id], packagePrice[id], id)
      calculateTotal(id)
    
    }
    // Add beds
    function addBeds(id, bedRate, obj, room_id){
        checkPackageValue(room_id)
        var days = $(".rooms #days"+room_id).val()
        let bedQty
        if ($(obj).prop('checked') == true) {
            bedQty = 1
            console.log(bedQty)
        } 
        else {
            bedQty = 0
            console.log(bedQty)
        }
        let bedVal = (bedQty * bedRate) * parseInt(days)
        additionalBeds[id] = {
            'value': bedVal,
            'qty': bedQty
        }
        calBedRate(room_id)
        radioChange(packageBRate[room_id], packagePrice[room_id], room_id)
        calculateTotal(room_id)
    }
    function calBedRate(room_id){
      let id = $(".rooms #roomid").val()
      var days = $(".rooms #days"+id).val()
    //   console.log(id)
      let bedTotal = 0
      $.each(additionalBeds, function(k, v){
        bedTotal += v.value
      })
      totalBedRate[room_id] = 0
      totalBedRate[room_id] = bedTotal
      console.log(totalBedRate[room_id])
      $('.rooms .TotalBedRate_'+room_id).attr({"value":totalBedRate[room_id]});   
      $(".rooms .bedRate_"+room_id).html('<div class="row rates"><div class="col-md-4"></div><div class="col-md-2"></div><div class="col-md-6"><div><span class="float-left"><small class="small">Bed Rates ($):</small></span><span class="float-right">'+totalBedRate[room_id]+'/<small class="small">'+days+' Night(s)</small></span></div></div></div>');
    
    }
    // Radio button
    function radioChange(additionalBedRate, price, id){
      checkPackageValue(id)
      let totalBeds = 0
      let packageBedRate = 0
      var days = $(".rooms #days"+id).val()
    //   packageRate['price'] = price
    //   packageRate['bedRate'] = additionalBedRate
      packagePrice[id] = price
      packageBRate[id] = additionalBedRate
        // console.log(packagePrice)
      $.each(additionalBeds, function(k,v){
        totalBeds += parseInt(v.qty)
      })
      packageBedRate = (parseInt(totalBeds) * parseInt(additionalBedRate)) * parseInt(days)
      if (roomQty[id] > 0) {
        tempPackageRate = (parseInt(price) * roomQty[id]) * parseInt(days)
      } else {
        tempPackageRate = parseInt(price) * parseInt(days)
      }
    
      totalPackageRate[id] = parseInt(packageBedRate) + parseInt(tempPackageRate)
      $('.rooms .TotalPackageRate_'+id).attr({"value":totalPackageRate[id]})
      $(".rooms .packageRate_"+id).html('<div class="row rates"><div class="col-md-4"></div><div class="col-md-2"></div><div class="col-md-6"><div"><span class="float-left"><small class="small">Package Rates ($):</small></span><span class="float-right">'+totalPackageRate[id]+'/<small class="small">'+days+' Night(s)</small></span></div></div></div>');
      calculateTotal(id)
    
    }
    // Calculate total
    function calculateTotal(id){
        var days = $(".rooms #days"+id).val()
        checkPackageValue(id)
        // console.log(roomRates[id])
        // console.log(totalBedRate[id])
        // console.log(totalPackageRate[id])
      let grandTotal = roomRates[id] + totalBedRate[id] + totalPackageRate[id]
    //   console.log(grandTotal)
      $(".rooms .FinalTotal_"+id).attr({"value":grandTotal})
      $(".rooms #TotalRate_"+id).html('<span class="rates"><span class="float-left"><small class="totalrate_'+id+'">Total Rates ($): </small></span><span class="float-right">'+grandTotal+'/<small class="small">'+days+' Night(s)</small></span></span>')
    //   console.log('---')
    //   console.log(roomRates)
    // console.log(roomQty)
    // console.log(totalBedRate)
    // console.log(totalPackageRate)
    // console.log('package---')
    // console.log(packagePrice)
    // console.log(packageBRate)
    }
    
    function checkPackageValue(id){
        // console.log(objectHasKey(packagePrice, id))
        if($.isEmptyObject(packagePrice) || !objectHasKey(packagePrice, id)){
            packagePrice[id] = 0
        }
        if($.isEmptyObject(packageBRate) || !objectHasKey(packageBRate, id)){
            packageBRate[id] = 0
        }
    
        if($.isEmptyObject(roomRates) || !objectHasKey(roomRates, id)){
            roomRates[id] = 0
        }
    
        if($.isEmptyObject(totalBedRate) || !objectHasKey(totalBedRate, id)){
            totalBedRate[id] = 0
        }
    }
    
    function objectHasKey(obj, key){
        // let k = Object.keys(obj)
        if(obj.hasOwnProperty(key)){
            return true
        }
        return false
    }
        document.addEventListener("DOMContentLoaded", function () {

    const checkIn = document.getElementById("checkIn");
    const checkOut = document.getElementById("checkOut");

    checkIn.addEventListener("change", function () {

        if (!this.value) return;

        let date = new Date(this.value);

        // add 1 day
        date.setDate(date.getDate() + 1);

        // format to YYYY-MM-DD
        let year = date.getFullYear();
        let month = String(date.getMonth() + 1).padStart(2, '0');
        let day = String(date.getDate()).padStart(2, '0');

        let nextDay = `${year}-${month}-${day}`;

        // set checkout
        checkOut.value = nextDay;

        // also update min checkout date
        checkOut.min = nextDay;
    });

});
    //Add to Cart
    // function addToCart(id) {
    //     $('#CartForm'+id).on('submit',(function(e) {
    //     e.preventDefault()
    //     let CartForm = new FormData(this)
    //         $.ajax({
    //             type: "POST",
    //             url: "{{ url('addtoCart')}}"+ '/' + id,
    //             data: CartForm,
    //             cache:false,
    //             contentType: false,
    //             processData: false,
    //             success: function (response) {
    //                 $('#cart-content').empty()
                    
    //                 let Total = 0
    //                 let subtotal = 0
    //                 $.each(response, function(k,v){
    //                     subtotal = parseInt(v.price) / parseInt(v.attributes.days)
    //                     Total = parseInt(Total) + parseInt(v.price)
    //                     $('#cart-content').append('<div class="row"><div class="col-2"><img src="{{ asset('public/images/rooms')}}/'
    //                     +v.attributes.image+'"width="100%" alt=""></div><div class="col-6">'
    //                     +v.quantity+' '+v.name+'</div><div class="col-4"><button onclick="RemoveItemCart('+k+')"><small style="color:brown;">Remove</small></button></div> </div><div class="row"><div class="col-2"></div><div class="col-6">$'
    //                     +subtotal+' x '+v.attributes.days+'days</div><div class="col-4">'
    //                     +v.price+'</div></div><br>')
    //                 })
    //                 $('#cart-content').append('<div class="total"><div class="row"><div class="col-4"></div><div class="col-4">Total</div><div class="col-4">'
    //                 +Total+'</div></div></div><br><div class="row"><div class="col-12"><a href="{{ url('confirm-order')}}" class="btn btn-primary btn-block">Checkout</a></div></div>')
    //                 swal('sd','dsd','success')
    //             }
    //         })
    //     }))
    // }
    
    //Remove Cart Item
    
    // function RemoveItemCart(id) {
    //     $.ajax({
    //         type: "POST",
    //         url: "{{ url('remove-cartItem')}}"+ '/' + id,
    //         data : {'_method' : 'GET'},
    //         success: function (response) {
                
    //             if (response.length == 0) {
    //                 $('#cart-content').empty()
    //             } else {
    //                 $('#cart-content').empty()
    //                 let Total = 0
    //                 let subtotal = 0
    //                 $.each(response, function(k,v){
    //                     subtotal = parseInt(v.price) / parseInt(v.attributes.days)
    //                     Total = parseInt(Total) + parseInt(v.price)
    //                     $('#cart-content').append('<div class="row"><div class="col-2"><img src="{{ asset('public/images/rooms')}}/'
    //                     +v.attributes.image+'"width="100%" alt=""></div><div class="col-6">'
    //                     +v.quantity+' '+v.name+'</div><div class="col-4"><button onclick="RemoveItemCart('+k+')"><small style="color:brown;">Remove</small></button></div> </div><div class="row"><div class="col-2"></div><div class="col-6">$'
    //                     +subtotal+' x '+v.attributes.days+'days</div><div class="col-4">'
    //                     +v.price+'</div></div><br>')
    //                 })
    //                 $('#cart-content').append('<div class="total"><div class="row"><div class="col-4"></div><div class="col-4">Total</div><div class="col-4">'
    //                 +Total+'</div></div></div><br><div class="row"><div class="col-12"><a href="{{ url('confirm-order')}}" class="btn btn-primary btn-block">Checkout</a></div></div>')
    //                 swal('sd','dsd','success')
    //             }    
                    
    //         }
    //     });
    // }
    
    // </script> 



{{-- <script type="text/javascript">
    var packagePrice = {}
    var packageBRate = {}
    var packageRate = {
      'price': 0,
      'bedRate': 0
    }
    var additionalBeds = {}
    var roomRates = {}
    var roomQty = {}
    var totalBedRate = {}
    var totalPackageRate = {}
    
    
    function Check() {
        var checkForm = $("#checkForm").serialize();
        $.ajax({
            type: "POST",
            url: "{{ url('checkAvailability') }}",
            data: checkForm,
            beforeSend: function(){
                // Show image container
                $('.rooms').empty();
                $("#searchLoader").show();
            },
            success: function (response) {
                packagePrice = {}
                    packageBRate = {}
                    packageRate = {
                    'price': 0,
                    'bedRate': 0
                    }
                    additionalBeds = {}
                    roomRates = {}
                    roomQty = {}
                    totalBedRate = {}
                    totalPackageRate = {}
                    
                let booked_rooms = {}
                if(response.booked_rooms != null){
                    booked_rooms = response.booked_rooms
                }
                                                  
                if (response.errors) {
                    $('#checkInError').empty()
                    $('#checkOutError').empty()
    
                    if (response.errors[0] != null) {
                        $('#checkInError').append('<div class="alert alert-danger">'+response.errors[0]+'</div>')
                    }
                    if (response.errors[1] != null) {
                        $('#checkOutError').append('<div class="alert alert-danger">'+response.errors[1]+'</div>')
                    }
                }
                else{
                    $('#checkInError').empty()
                    $('#checkOutError').empty()
                if (response.checkRoom.length != 0) {
                $.each(response.checkRoom, function(k,v){
                    
                    if(!objectHasKey(booked_rooms, v.r_id)){
                        booked_rooms[v.r_id] = 0
                    }
                    console.log(booked_rooms)
                    var maxquantity = 0;
                    if (response.id ==  1) {
                        maxquantity = parseInt(v.r_quantity) - parseInt(booked_rooms[v.r_id]);
                    } else if(response.id ==  2) {
                        maxquantity = v.r_quantity;
                    }
                    var pack = ''
                    let room_id = v.r_id
                    $.each(response.packages, function(k,v){
                         pack += '<div class="col-md-4"><section class="custom-section"><div><input type="radio" class="package" id="control_0'
                         +v.p_id+room_id+'" data-idpackage="'+room_id+'" onchange="radioChange('+v.p_additional_bed+', '+v.p_price+', '+room_id+')"  name="package" value="'
                         +v.p_price+'"><label for="control_0'+v.p_id+room_id+'" class="custom-label">'+v.p_name+'</label></div></section></div>'
                    })
                    var roomFirstPrice = v.r_price * response.days
                    $('.rooms').append('<div class="col-md-6"><form id="CartForm" method="POST" action="{{ url('admin/admin-checkout')}}">@csrf<div class="card reservation-card"><div class="card-body"><div class="card reservation-card1"><div class="card-body"><div class="row"><div class="col-md-127"><h2 class="room-name">'
                        +v.r_name+'</h2></div></div><hr><div class="row">'
                        +pack+'<input type="radio" class="package unchecked" id="unchecked" name="package" value="0" checked><label for="unchecked" class="custom-label unchecked"></label></div><hr><div class="row"><div class="col-md-12"><div class="additionalRoom'+v.r_id+'"></div></div></div><br><div class="row"><div class="col-md-12">'
                        +'<input onchange="roomQuantityChange('+v.r_id+', '+v.r_price+', '+v.r_additional_bed+')" class="form-control roomQuantity roomQuantity2_'
                        +v.r_id+'" value="" name="quantity" placeholder="Quantity" type="number" max="'
                        +maxquantity+'" data-id="'
                        +v.r_id+'" min="1" id="r_newquantity'
                        +v.r_id+'" required></div><input type="hidden" id="rate" class="totalratebed_'
                        +v.r_id+'" name="ratebed" value="'
                        +v.r_price+'"><input type="hidden" id="rate" class="totalrate_'
                        +v.r_id+'" name="rate" value="'
                        +v.r_price+'"><input type="hidden" id="fixedrate_'
                        +v.r_id+'" name="fixedrate" value="'
                        +v.r_price+'"></div><div class="row rates"><div class="packageRate_'
                        +v.r_id+'"></div></div><div class="row rates"><div class="bedRate_'+v.r_id+'"></div></div><br><div class="row"><div class="col-md-12"><div id="TotalRate_'+v.r_id+'"><small class="totalrate1_'+v.r_id+'">Total Rates: </small>$00.00 /<small class="small">'+response.days+' Night(s)</small></div></div></div><br><div class="row"><div class="col-md-4 mobile-padding"><input type="hidden" name="id" value="'
                        +v.r_id+'" ><input type="hidden" value="'
                        +v.r_image+'" id="image'
                        +v.r_id+'" name="image"><input type="hidden" name="r_name" id="r_name'
                        +v.r_id+'" value="'
                        +v.r_name+'" ><input type="hidden" class="additionalPackage_'
                        +v.r_id+'" value="" name="additionalPackage"><input type="hidden" id="roomid" value="'
                        +v.r_id+'"><input type="hidden" class="TotalRoomRate_'
                        +v.r_id+'" name="TotalRoomRate" value="0"><input type="hidden" class="TotalBedRate_'
                        +v.r_id+'" name="TotalBedRate" value="0"><input type="hidden" class="TotalPackageRate_'
                        +v.r_id+'" name="TotalPackageRate" value="0"><input type="hidden" class="FinalTotal_'
                        +v.r_id+'" name="FinalTotal" value="0"><input type="hidden" id="additionalbed'
                        +v.r_id+'" name="additionalbed" data-roomid="'
                        +v.r_id+'" value="'
                        +v.r_additional_bed+'"><input type="hidden" name="checkIn" value="'
                        +response.checkIn+'"><input type="hidden" name="checkOut" value="'
                        +response.checkOut+'"><input type="hidden" name="packagerate" value="" id="packagerate"><input type="hidden" value="'
                        +response.days+'" id="days'
                        +v.r_id+'" name="days"><button type="submit" onClick="addToCart('
                        +v.r_id+')" class="btn btn-warning">Select</button></div></div></div></div></form></div>')
                    })
                } else {
                    $('.rooms').append('<div class="alert alert-warning">Sorry! Room is not available.</div>')
                }
                }
                
                
            },
            complete:function(data){
                // Hide image container
                $("#searchLoader").hide();
            }
        });
    }
    
    // Room quantity
    function roomQuantityChange(id, price, bedRate){
        
        checkPackageValue(id)
      roomQty[id] = $('.roomQuantity2_'+id).val()
      var days = $(".rooms #days"+id).val()
      roomRates[id] = (roomQty[id] * price ) * parseInt(days)
      $('.rates_'+id).html('<small class="small">Room Rates: </small>$'
                            + parseFloat(roomRates[id])
                            + '/<small class="small">'+days+' Night(s)</small>')
      $('.rooms .TotalRoomRate_'+id).attr({"value":roomRates[id]});                   
    
      $(".rooms .packageRate_"+id).empty()
      $(".rooms .additionalRoom"+id).empty()
      $(".rooms .bedRate").empty()
      totalBedRate[id] = 0
      if (roomQty[id] > 0) { 
          $(".rooms .additionalRoom"+id).append('<div class="row"><div class="col-md-12"><h5 class="room-name">Additional Bed</h5></div></div><div class="row">')
          for (i = 0; i < roomQty[id]; i++) {
              $(".rooms .additionalRoom"+id).append('<div class="col-md-12" style="padding:5px;"><input type="number" class="form-control additionalbedquantity" min="0" max="1" name="bed[]" onChange="addBeds('+i+','+bedRate+',this, '+id+')" id="additionalbedquantity'+(i+1)+'" placeholder="Room number '+(i+1)+'"></div>')
          }
          $(".rooms .additionalRoom"+id).append('</div></br></br>')
      }
      radioChange(packageBRate[id], packagePrice[id], id)
      calculateTotal(id)
    
    }
    // Add beds
    function addBeds(id, bedRate, that, room_id){
        checkPackageValue(room_id)
      var days = $(".rooms #days"+room_id).val()
      let bedQty = $(that).val()
      let bedVal = (bedQty * bedRate) * parseInt(days)
      additionalBeds[id] = {
        'value': bedVal,
        'qty': bedQty
      }
      calBedRate(room_id)
      radioChange(packageBRate[room_id], packagePrice[room_id], room_id)
      calculateTotal(room_id)
    }
    function calBedRate(room_id){
      let id = $(".rooms #roomid").val()
      var days = $(".rooms #days"+id).val()
      console.log(id)
      let bedTotal = 0
      $.each(additionalBeds, function(k, v){
        bedTotal += v.value
      })
      totalBedRate[room_id] = bedTotal
      $('.rooms .TotalBedRate_'+room_id).attr({"value":totalBedRate[room_id]});   
    
    }
    // Radio button
    function radioChange(additionalBedRate, price, id){
      checkPackageValue(id)
      let totalBeds = 0
      let packageBedRate = 0
      var days = $(".rooms #days"+id).val()
    //   packageRate['price'] = price
    //   packageRate['bedRate'] = additionalBedRate
      packagePrice[id] = price
      packageBRate[id] = additionalBedRate
        console.log(packagePrice)
      $.each(additionalBeds, function(k,v){
        totalBeds += parseInt(v.qty)
      })
      packageBedRate = (parseInt(totalBeds) * parseInt(additionalBedRate)) * parseInt(days)
      if (roomQty[id] > 0) {
        tempPackageRate = (parseInt(price) * roomQty[id]) * parseInt(days)
      } else {
        tempPackageRate = parseInt(price) * parseInt(days)
      }
    
      totalPackageRate[id] = parseInt(packageBedRate) + parseInt(tempPackageRate)
      $('.rooms .TotalPackageRate_'+id).attr({"value":totalPackageRate[id]})
      calculateTotal(id)
    
    }
    // Calculate total
    function calculateTotal(id){
        var days = $(".rooms #days"+id).val()
        checkPackageValue(id)
        // console.log(roomRates[id])
        // console.log(totalBedRate[id])
        // console.log(totalPackageRate[id])
      let grandTotal = roomRates[id] + totalBedRate[id] + totalPackageRate[id]
    //   console.log(grandTotal)
      $(".rooms .FinalTotal_"+id).attr({"value":grandTotal})
      $(".rooms #TotalRate_"+id).html('<small class="totalrate_'+id+'">Total Rates: </small>$'+grandTotal+'/<small class="small">'+days+' Night(s)</small>')
    //   console.log('---')
    //   console.log(roomRates)
    // console.log(roomQty)
    // console.log(totalBedRate)
    // console.log(totalPackageRate)
    // console.log('package---')
    // console.log(packagePrice)
    // console.log(packageBRate)
    }
    
    function checkPackageValue(id){
        // console.log(objectHasKey(packagePrice, id))
        if($.isEmptyObject(packagePrice) || !objectHasKey(packagePrice, id)){
            packagePrice[id] = 0
        }
        if($.isEmptyObject(packageBRate) || !objectHasKey(packageBRate, id)){
            packageBRate[id] = 0
        }
    
        if($.isEmptyObject(roomRates) || !objectHasKey(roomRates, id)){
            roomRates[id] = 0
        }
    
        if($.isEmptyObject(totalBedRate) || !objectHasKey(totalBedRate, id)){
            totalBedRate[id] = 0
        }
    }
    
    function objectHasKey(obj, key){
        // let k = Object.keys(obj)
        if(obj.hasOwnProperty(key)){
            return true
        }
        return false
    }
    </script>
 --}}
{{-- <script type="text/javascript">
    var packagePrice = {}
    var packageBRate = {}
    var packageRate = {
      'price': 0,
      'bedRate': 0
    }
    var additionalBeds = {}
    var roomRates = {}
    var roomQty = {}
    var totalBedRate = {}
    var totalPackageRate = {}
    
    
    function Check() {
        var checkForm = $("#checkForm").serialize();
        $.ajax({
            type: "POST",
            url: "{{ url('checkAvailability') }}",
            data: checkForm,
            beforeSend: function(){
                // Show image container
                $('.rooms').empty();
                $("#searchLoader").show();
            },
            success: function (response) {
                packagePrice = {}
                packageBRate = {}
                packageRate = {
                'price': 0,
                'bedRate': 0
                }
                additionalBeds = {}
                roomRates = {}
                roomQty = {}
                totalBedRate = {}
                totalPackageRate = {}

                let booked_rooms = {}
                if(response.booked_rooms != null){
                    booked_rooms = response.booked_rooms
                }
                                                  
                if (response.errors) {
                    $('#checkInError').empty()
                    $('#checkOutError').empty()
    
                    if (response.errors[0] != null) {
                        $('#checkInError').append('<div class="alert alert-danger">'+response.errors[0]+'</div>')
                    }
                    if (response.errors[1] != null) {
                        $('#checkOutError').append('<div class="alert alert-danger">'+response.errors[1]+'</div>')
                    }
                }
                else{
                    $('#checkInError').empty()
                    $('#checkOutError').empty()
                if (response.checkRoom.length != 0) {
                    if ((parseInt(response.roomQty) - parseInt(response.BookingQty)) != 0) {
                $.each(response.checkRoom, function(k,v){
                    
                    if(!objectHasKey(booked_rooms, v.r_id)){
                        booked_rooms[v.r_id] = 0
                    }
                    console.log(booked_rooms)
                    var maxquantity = 0;
                    if (response.id ==  1) {
                        maxquantity = parseInt(v.r_quantity) - parseInt(booked_rooms[v.r_id]);
                    } else if(response.id ==  2) {
                        maxquantity = v.r_quantity;
                    }
                    var pack = ''
                    let room_id = v.r_id
                    $.each(response.packages, function(k,v){
                         pack += '<div class="col-md-12"><section class="custom-section"><div><input type="radio" class="package" id="control_0'
                         +v.p_id+room_id+'" data-idpackage="'+room_id+'" onchange="radioChange('+v.p_additional_bed+', '+v.p_price+', '+room_id+')"  name="package" value="'
                         +v.p_price+'"><label for="control_0'+v.p_id+room_id+'" class="custom-label">'+v.p_name+'</label></div></section></div>'
                    })
                    var roomFirstPrice = v.r_price * response.days
                    $('.rooms').append('<div class="col-md-6"><form id="CartForm" method="POST" action="{{ url('admin/admin-checkout')}}">@csrf<div class="card reservation-card"><div class="card-body"><div class="card reservation-card1"><div class="card-body"><div class="row"><div class="col-md-127"><h2 class="room-name">'
                        +v.r_name+'</h2></div></div><hr><div class="row">'
                        +pack+'<input type="radio" class="package unchecked" id="unchecked" name="package" value="0" checked><label for="unchecked" class="custom-label unchecked"></label></div><hr><div class="row"><div class="col-md-12"><div class="additionalRoom'+v.r_id+'"></div></div></div><br><div class="row"><div class="col-md-12">'
                        +'<input onchange="roomQuantityChange('+v.r_id+', '+v.r_price+', '+v.r_additional_bed+')" class="form-control roomQuantity roomQuantity2_'
                        +v.r_id+'" value="" name="quantity" placeholder="Quantity" type="number" max="'
                        +maxquantity+'" data-id="'
                        +v.r_id+'" min="1" id="r_newquantity'
                        +v.r_id+'" required></div><input type="hidden" id="rate" class="totalratebed_'
                        +v.r_id+'" name="ratebed" value="'
                        +v.r_price+'"><input type="hidden" id="rate" class="totalrate_'
                        +v.r_id+'" name="rate" value="'
                        +v.r_price+'"><input type="hidden" id="fixedrate_'
                        +v.r_id+'" name="fixedrate" value="'
                        +v.r_price+'"></div><div class="row rates"><div class="packageRate_'
                        +v.r_id+'"></div></div><div class="row rates"><div class="bedRate_'+v.r_id+'"></div></div><br><div class="row"><div class="col-md-12"><div id="TotalRate_'+v.r_id+'"><small class="totalrate1_'+v.r_id+'">Total Rates: </small>$00.00 /<small class="small">'+response.days+' Night</small></div></div></div><br><div class="row"><div class="col-md-4 mobile-padding"><input type="hidden" name="id" value="'
                        +v.r_id+'" ><input type="hidden" value="'
                        +v.r_image+'" id="image'
                        +v.r_id+'" name="image"><input type="hidden" name="r_name" id="r_name'
                        +v.r_id+'" value="'
                        +v.r_name+'" ><input type="hidden" class="additionalPackage_'
                        +v.r_id+'" value="" name="additionalPackage"><input type="hidden" id="roomid" value="'
                        +v.r_id+'"><input type="hidden" class="TotalRoomRate_'
                        +v.r_id+'" name="TotalRoomRate" value="0"><input type="hidden" class="TotalBedRate_'
                        +v.r_id+'" name="TotalBedRate" value="0"><input type="hidden" class="TotalPackageRate_'
                        +v.r_id+'" name="TotalPackageRate" value="0"><input type="hidden" class="FinalTotal_'
                        +v.r_id+'" name="FinalTotal" value="0"><input type="hidden" id="additionalbed'
                        +v.r_id+'" name="additionalbed" data-roomid="'
                        +v.r_id+'" value="'
                        +v.r_additional_bed+'"><input type="hidden" name="checkIn" value="'
                        +response.checkIn+'"><input type="hidden" name="checkOut" value="'
                        +response.checkOut+'"><input type="hidden" name="packagerate" value="" id="packagerate"><input type="hidden" value="'
                        +response.days+'" id="days'
                        +v.r_id+'" name="days"><button type="submit" onClick="addToCart('
                        +v.r_id+')" class="btn btn-warning">Select</button></div></div></div></div></form></div>')
                    })
                    } else {
                        $('.rooms').append('<div class="alert alert-warning">Sorry! Room is not available.</div>')
                    }
                } else {
                    $('.rooms').append('<div class="alert alert-warning">Sorry! Room is not available.</div>')
                }
                }
                
                
            },
            complete:function(data){
                // Hide image container
                $("#searchLoader").hide();
            }
        });
    }
    
    // Room quantity
    function roomQuantityChange(id, price, bedRate){
        
        checkPackageValue(id)
      roomQty[id] = $('.roomQuantity2_'+id).val()
      var days = $(".rooms #days"+id).val()
      roomRates[id] = (roomQty[id] * price ) * parseInt(days)
      $('.rates_'+id).html('<small class="small">Room Rates: </small>$'
                            + parseFloat(roomRates[id])
                            + '/<small class="small">'+days+' Night</small>')
      $('.rooms .TotalRoomRate_'+id).attr({"value":roomRates[id]});                   
    
      $(".rooms .packageRate_"+id).empty()
      $(".rooms .additionalRoom"+id).empty()
      $(".rooms .bedRate").empty()
      totalBedRate[id] = 0
      if (roomQty[id] > 0) { 
          $(".rooms .additionalRoom"+id).append('<div class="row"><div class="col-md-12"><h5 class="room-name">Additional Bed</h5></div></div><div class="row">')
          for (i = 0; i < roomQty[id]; i++) {
              $(".rooms .additionalRoom"+id).append('<div class="col-md-12" style="padding:5px;"><input type="number" class="form-control additionalbedquantity" min="0" name="bed[]" onChange="addBeds('+i+','+bedRate+',this, '+id+')" id="additionalbedquantity'+(i+1)+'" placeholder="Room number '+(i+1)+'"></div>')
          }
          $(".rooms .additionalRoom"+id).append('</div></br>')
      }
      radioChange(packagePrice[id], packageBRate[id], id)
      calculateTotal(id)
    
    }
    // Add beds
    function addBeds(id, bedRate, that, room_id){
        checkPackageValue(room_id)
      var days = $(".rooms #days"+room_id).val()
      let bedQty = $(that).val()
      let bedVal = (bedQty * bedRate) * parseInt(days)
      additionalBeds[id] = {
        'value': bedVal,
        'qty': bedQty
      }
      calBedRate(room_id)
      radioChange(packagePrice[room_id], packageBRate[room_id], room_id)
      calculateTotal(room_id)
    }
    function calBedRate(room_id){
      let id = $(".rooms #roomid").val()
      var days = $(".rooms #days"+id).val()
      console.log(id)
      let bedTotal = 0
      $.each(additionalBeds, function(k, v){
        bedTotal += v.value
      })
      totalBedRate[room_id] = bedTotal
      $('.rooms .TotalBedRate_'+room_id).attr({"value":totalBedRate[room_id]});   
    
    }
    // Radio button
    function radioChange(additionalBedRate, price, id){
      checkPackageValue(id)
      let totalBeds = 0
      let packageBedRate = 0
      var days = $(".rooms #days"+id).val()
      packageRate['price'] = price
      packageRate['bedRate'] = additionalBedRate
      packagePrice[id] = price
      packageBRate[id] = additionalBedRate
    
      $.each(additionalBeds, function(k,v){
        totalBeds += parseInt(v.qty)
      })
      packageBedRate = (parseInt(totalBeds) * parseInt(additionalBedRate)) * parseInt(days)
      if (roomQty[id] > 0) {
        tempPackageRate = (parseInt(price) * roomQty[id]) * parseInt(days)
      } else {
        tempPackageRate = parseInt(price) * parseInt(days)
      }
    
      totalPackageRate[id] = parseInt(packageBedRate) + parseInt(tempPackageRate)
      $('.rooms .TotalPackageRate_'+id).attr({"value":totalPackageRate[id]})
      calculateTotal(id)
    
    }
    // Calculate total
    function calculateTotal(id){
        var days = $(".rooms #days"+id).val()
        checkPackageValue(id)
        console.log(roomRates[id])
        console.log(totalBedRate[id])
        console.log(totalPackageRate[id])
      let grandTotal = roomRates[id] + totalBedRate[id] + totalPackageRate[id]
      console.log(grandTotal)
      $(".rooms .FinalTotal_"+id).attr({"value":grandTotal})
      $(".rooms #TotalRate_"+id).html('<small class="totalrate_'+id+'">Total Rates: </small>$'+grandTotal+'/<small class="small">'+days+' Night</small>')
    //   console.log('---')
    //   console.log(roomRates)
    // console.log(roomQty)
    // console.log(totalBedRate)
    // console.log(totalPackageRate)
    // console.log('package---')
    // console.log(packagePrice)
    // console.log(packageBRate)
    }
    
    function checkPackageValue(id){
        // console.log(objectHasKey(packagePrice, id))
        if($.isEmptyObject(packagePrice) || !objectHasKey(packagePrice, id)){
            packagePrice[id] = 0
        }
        if($.isEmptyObject(packageBRate) || !objectHasKey(packageBRate, id)){
            packageBRate[id] = 0
        }
    
        if($.isEmptyObject(roomRates) || !objectHasKey(roomRates, id)){
            roomRates[id] = 0
        }
    
        if($.isEmptyObject(totalBedRate) || !objectHasKey(totalBedRate, id)){
            totalBedRate[id] = 0
        }
    }
    
    function objectHasKey(obj, key){
        // let k = Object.keys(obj)
        if(obj.hasOwnProperty(key)){
            return true
        }
        return false
    }
    </script> --}}
@endsection