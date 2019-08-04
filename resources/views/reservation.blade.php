@extends('layouts.app')

@section('content')
<header id="gtco-header" class="gtco-cover-custom gtco-cover-md" role="banner" style="background:url(public/images/img_bg_1.jpg)" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="row row-mt-15em">
                    <center><h1 class="cursive-font">Room Reservation</h1></center>
                </div>                
            </div>
        </div>
    </div>
</header>
<div class="gtco-section">
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-4 animate-box" data-animate-effect="fadeInRight">
                <div class="form-wrap">
                    <div class="tab">
                        <div class="tab-content">
                            <div class="tab-content-inner active" data-content="signup">
                                <h3 class="cursive-font">Check Availability</h3>
                                <form id="checkForm">
                                    @csrf
                                    {{-- <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="activities">Persons</label>
                                            <select name="#" id="" class="form-control">
                                                <option value="">1</option>
                                                <option value="">2</option>
                                                <option value="">3</option>
                                                <option value="">4</option>
                                                <option value="">5+</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="date-start">Arrival*</label>
                                            <input type="date" name="checkIn" id="checkIn" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="date-start">Departure*</label>
                                            <input type="date" name="checkOut" id="checkOut"  class="form-control">
                                        </div>
                                    </div>
                                    {{-- <div class="row form-group">
                                            <div class="col-md-12">
                                                <label for="activities">Country</label>
                                                <select name="#" id="" class="form-control">
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                    <option value="">3</option>
                                                    <option value="">4</option>
                                                    <option value="">5+</option>
                                                </select>
                                            </div>
                                        </div> --}}
                                        <br>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <input type="button" onclick="Check()" class="btn btn-primary btn-block" value="Check">
                                        </div>
                                    </div>
                                </form>	
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="rooms">
                
                </div>
            </div>
        </div>
    </div>
</div>

<script>
        function Check() {
            var checkForm = $("#checkForm").serialize();
            $.ajax({
                type: "POST",
                url: "{{ url('checkAvailability') }}",
                data: checkForm,
                success: function (response) {
                    $('.rooms').empty();
                    console.log(response)
                    $.each(response, function(k,v){
                        $('.rooms').append('<div class="card reservation-card"><div class="card-body"><div class="card reservation-card1"><div class="card-body"><div class="row"><div class="col-md-5"><img src="{{ asset('public/images/rooms/1.jpg')}}" width="100%" alt=""></div><div class="col-md-7"><h2 class="room-name">'
                        +v.r_name+'</h2><span class="room-name">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita reiciendis nemo rem id quo maxime asperiores debitis deleniti a sunt unde, aspernatur at sequi quisquam aliquid velit. Alias, autem! Modi.</span></div></div><hr><div class="row"><div class="col-md-12"><form action="" method="post"><section class="custom-section"><div><input type="radio" id="control_01" name="select" value="1" checked><label for="control_01" class="custom-label">Bed & Breakfast</label></div><div><input type="radio" id="control_02" name="select" value="2"><label for="control_02" class="custom-label">Half board</label></div><div><input type="radio" id="control_03" name="select" value="3"><label for="control_03" class="custom-label">Full board</label></div></section></form></div></div><hr><div class="row"><div class="col-md-4"><input class="form-control" placeholder="Quantity" type="number" name=""> <br></div><div class="col-md-4 align-middle"><span class="rates"><small>Rates :</small>  Rs.00.00 </span></div><div class="col-md-4 mobile-padding"><button type="submit" class="btn btn-warning">Reserve</button></div></div></div></div></div></div></br>')
                    })
                }
            });
        }
    </script>
@endsection