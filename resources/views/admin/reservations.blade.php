@extends('layouts.admin')

@section('adminContent')
<section class="content">
    <div class="row main-padding">
      <h3>Reservations</h3>
    </div>
    <div class="row main-padding">
      <a href="{{ url('admin/new-admin-reservation')}}" class="btn btn-warning btn-sm">New Reservation</a> &nbsp;
      {{-- <a href="{{ url('admin/reservation-pdf')}}" class="btn btn-success">Monthly Report</a>&nbsp; --}}
      <button onclick="reservationReport()" class="btn btn-success btn-sm">Monthly Report</button>&nbsp;
      <!-- <a href="{{ url('admin/reservation-calendar')}}" class="btn btn-danger btn-sm">Reservation Calendar</a> -->
    </div>
    <div class="row">
        <div class="card-body">
            <table id="Rooms" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Booking Id</th> 
                <th>Room Name</th>
                <th>In Date</th>
                <th>Out Date</th>
                <th>Rooms</th>
                <th>Total Rate</th>
                <th>Status</th>
                <th>Action</th>
              </tr> 
              </thead>
              <tbody id="ReservationsTable">
                @foreach ($Booking as $item)
                  <tr @if($item->b_status == 2) class="bg-success" @endif @if($item->b_status == 3) class="bg-secondary" @endif>
                    <td>{{$item->b_id}}</td> 
                    <td>{{$item->r_name}} @if ($item->b_status == 2 )<button onclick="Note({{$item->b_id}})" class="btn btn-sm btn-primary" title="View">Note</button>@endif</td> 
                    <td>{{$item->b_checkindate}}</td> 
                    <td>{{$item->b_checkoutdate}}</td>
                    <td>{{$item->b_rquantity}}</td>
                    <td>${{$item->br_totalRate}}</td>
                    <td>
                      @if ($item->b_status == 0) 
                        <span class="badge badge-warning">Pending</span> 
                      @endif
                      @if ($item->b_status == 1) 
                        <span class="badge badge-success">Confirm</span>
                      @endif
                      @if ($item->b_status == 2 ) 
                        <span class="badge badge-secondary">Live</span>
                      @endif
                      @if ($item->b_status == 3 ) 
                        <span class="badge badge-primary">Complete</span>
                      @endif
                    </td>
                    <td>
                      <button onclick="ViewReservation({{$item->b_id}}, {{$item->b_package}})" class="btn btn-sm btn-primary" title="View"><i class="fa fa-eye" aria-hidden="true"></i></button>
                      @if ($item->b_status == 0) 
                        <a href="{{ url('admin/confirm-book')}}/{{$item->b_id}}" class="btn btn-sm btn-success" title="Confirm"><i class="fa fa-check" aria-hidden="true"></i></a> 
                      @endif
                      @if($item->b_status == 1) 
                        <a href="{{ route('booking.live', $item->b_id) }}" class="btn btn-sm btn-secondary" title="Live"><i class="fa fa-flag" aria-hidden="true"></i></a> 
                      @endif
                      @if($item->b_status == 2) 
                        <a href="{{ url('admin/booking-complete')}}/{{$item->b_id}}" onclick="complete()" class="btn btn-sm btn-light" title="Complete"><i class="fa fa-check" aria-hidden="true"></i></a> 
                      @endif
                        <button onclick="Delete({{$item->b_id}})" class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                      <!-- @if($item->b_status == 2) 
                        <button onclick="Orders({{$item->b_id}})" class="btn btn-sm btn-warning" title="Orders"><i class="fa fa-plus" aria-hidden="true"></i></button> 
                      @endif -->
                    </td>
                  </tr>
                @endforeach
              </tbody>
              <tfoot>
              <tr>
                  <th>Booking Id</th>
                  <th>Room Name</th>
                  <th>In Date</th>
                  <th>Out Date</th>
                  <th>Rooms</th>
                  <th>Total Rate</th>
                  <th>Status</th>
                  <th>Action</th>
              </tr>
              </tfoot>
            </table>
          </div>
    </div>
</section>
@include('includes.ViewReservationModal')

<script> 
    function complete() {
      $(this).click(function(){
        swal({
        title: 'Are you sure?',
        text: "It will permanently deleted !",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then(function() {
        swal(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        );
      })
        
      })
    }
    function Note(id) {
      $.ajax({
        type: "GET",
        url: "{{ url('admin/room-note')}}"+ '/' + id,
        data : {'_method' : 'GET'},
        success: function (response) {
          $('#RoomNoteId').attr({"value":id})
          $('#RoomNote').val(response.Note)
          $('.bd-note-modal-lg').modal('show')
        }
      });
    }
    $(document).ready( function () {
      $('#Rooms').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
      $('#Rooms').DataTable();
    });
    function Delete(id) {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                  type: "GET",
                  url: "{{ url('admin/delete-reservation')}}"+ '/' + id,
                  data : {'_method' : 'GET'},
                  success: function (response) {
                        window.location.reload()
                    }
                }); 
            } 
        });
    }
    function Orders(id) {
      $('#OrderBookingId').val(id)
      $('.bd-orders-modal-lg').modal('show')
    }
 
    function AddNewOrder() {
      var OrderData = $('#OrdersRoomForm').serialize()
      $.ajax({
        type: "POST",
        url: "{{ url('admin/Orders')}}",
        data: OrderData,
        success: function (response) {
          $('.bd-orders-modal-lg').modal('hide')
          $('.inputclear').val('')
          swal('Success!','Added new order', 'success')
        }
      });
    }

    function ViewReservation(id, package) {
      $.ajax({
            type: "GET",
            url: "{{ url('admin/view-reservation')}}"+ '/' + id + '/' + package,
            data : {'_method' : 'GET'},
            success: function (response) {
                $('#CustomerName').empty();
                $('#CustomerId').empty();
                $('#ArrivalDate').empty();
                $('#DepartureDate').empty();
                $('#CustomerEmail').empty();
                $('#CustomerContact').empty();
                $('#CustomerCountry').empty();
                $('#CustomerNote').empty();
                $('.Bill').empty();
                $('.inputClear').val('')
                
                let Name = response.ViewReservation.customerdetails.cd_salutation +' '+response.ViewReservation.customerdetails.cd_first_name +' '+ response.ViewReservation.customerdetails.cd_last_name
                $('#CustomerName').append(Name)
                $('#BillName').val(Name)

                $('#CustomerId').append(response.ViewReservation.b_id) 
                $('#BillBookingId').val(response.ViewReservation.b_id)

                $('#ArrivalDate').append(response.ViewReservation.b_checkindate) 
                $('#BillArrivalDate').val(response.ViewReservation.b_checkindate) 

                $('#DepartureDate').append(response.ViewReservation.b_checkoutdate) 
                $('#BillDepartureDate').val(response.ViewReservation.b_checkoutdate) 

                $('#CustomerEmail').append(response.ViewReservation.customerdetails.cd_email)
                $('#BillCustomerEmail').val(response.ViewReservation.customerdetails.cd_email)

                $('#CustomerContact').append(response.ViewReservation.customerdetails.cd_phone)
                $('#BillCustomerContact').val(response.ViewReservation.customerdetails.cd_phone)

                $('#CustomerCountry').append(response.ViewReservation.customerdetails.cd_country)
                $('#BillCustomerCountry').val(response.ViewReservation.customerdetails.cd_country)

                $('#CustomerNote').append(response.ViewReservation.customerdetails.cd_note)
                $('#BillCustomerNote').val(response.ViewReservation.customerdetails.cd_note)

                let RoomRate = parseInt(response.ViewReservation.bookingrate.br_roomRate)
                let BedRate = parseInt(response.ViewReservation.bookingrate.br_bedmRate) 
                
                $('.Bill').append('<tr><td style="width:70%">'+response.ViewReservation.room.r_name+'</td><td style="width:15%">'
                +response.ViewReservation.b_rquantity+'</td><td style="width:15%">$'
                +RoomRate+'</td></tr>')
                $('#BillRoomName').val(response.ViewReservation.room.r_name)
                $('#BillRoomQty').val(response.ViewReservation.b_rquantity)
                $('#BillRoomRate').val(RoomRate)

                if (response.packageCheck != 0) {
                  $('.Bill').append('<tr><td style="width:70%">'+response.packageCheck+'</td><td style="width:15%"></td><td style="width:15%">$'
                  +response.ViewReservation.bookingrate.br_packageRate+'</td></tr>')
                  $('#BillPackageName').val(response.packageCheck)
                  $('#BillPackageRate').val(response.ViewReservation.bookingrate.br_packageRate)
                } 

                if (response.BedTotalQty != 0) {
                  $('.Bill').append('<tr><td style="width:70%">Additional Bed</td><td style="width:15%">'
                  +response.BedTotalQty+'</td><td style="width:15%">$'
                  +BedRate+'</td></tr>')
                  $('#BillBedQty').val(response.BedTotalQty)
                  $('#BillBedRate').val(BedRate)
                }   
                
                let SubTotal = response.ViewReservation.bookingrate.br_totalRate
                if (response.ViewReservation.bill != 0) {
                  // $.each(response.ViewReservation.bill, function(k,v){
                  //   let billPrice = parseInt(v.bill_pro_qty) * parseInt(v.bill_pro_price)
                  //   $('.Bill').append('<tr><td style="width:70%"><a href="{{ url('admin/delete-bill')}}/'+v.bill_id+'" style="color:red; font-weight:bold;" title="Delete">x</a> '+v.bill_pro_name+'<input type="hidden" name="OrdersProName[]" value="'+v.bill_pro_name+'"></td><td style="width:15%">'+v.bill_pro_qty+'<input type="hidden" name="OrdersProQty[]" value="'+v.bill_pro_qty+'"></td><td style="width:15%">$'
                  //   +billPrice+'<input type="hidden" name="OrdersProPrice[]" value="'+v.bill_pro_price+'"></td></tr>')
                  //   SubTotal = parseInt(SubTotal) + parseInt(billPrice)
                  // })
                $.each(response.ViewReservation.bill, function(k,v){
                let billPrice = parseInt(v.bill_pro_qty) * parseInt(v.bill_pro_price)

                $('.Bill').append(`
                    <tr>
                        <td>
                            ${v.bill_pro_name}
                            <input type="hidden" name="OrdersProName[]" value="${v.bill_pro_name}">
                        </td>
                        <td>
                            ${v.bill_pro_qty}
                            <input type="hidden" name="OrdersProQty[]" value="${v.bill_pro_qty}">
                        </td>
                        <td>
                            $${billPrice}
                            <input type="hidden" name="OrdersProPrice[]" value="${v.bill_pro_price}">
                        </td>
                    </tr>
                `)
            })
                  // $('#OrdersProName').val(response.ViewReservation.bill.bill_pro_name)
                  // $('#OrdersProQty').val(response.ViewReservation.bill.bill_pro_qty)
                  // $('#OrdersProPrice').val(response.ViewReservation.bill.bill_pro_price)
                }

                $('.Bill').append('<tr><td style="width:70%"></td><td style="width:15%"><b>Sub total</b></td><td style="width:15%"><b>$'
                +SubTotal+'</b></td></tr>')
                
                let Discount = 0
                if (response.ViewReservation.bookingrate.br_discount != 0) {
                  Discount = parseInt(Discount) + parseInt(response.ViewReservation.bookingrate.br_discount)
                  $('.Bill').append('<tr><td style="width:70%"></td><td style="width:15%"><b>Discount</b></td><td style="width:15%"><b>$'
                  +Discount+'</b></td></tr>')
                }

                let GrandTotal = parseInt(SubTotal) - parseInt(Discount) 
                $('.Bill').append('<tr><td style="width:70%"></td><td style="width:15%"><b>Total</b></td><td style="width:15%"><b>$'
                +GrandTotal+'</b></td></tr>')

                $('#OrdersSubTotal').val(SubTotal)
                $('#OrdersDiscount').val(Discount)
                $('#OrdersGrandTotal').val(GrandTotal)
                

                $('.bd-viewReservation-modal-lg').modal('show')
            }
        });
    } 

    function NewBooking() {
      $('.bd-NewBooking-modal-lg').modal('show')
    }

    function reservationReport() {
      $('.bd-ReservationReport-modal-lg').modal('show')
    }
    
    $('#select-item').on('change', function() {
      let id = $(this).val();
      $.ajax({
        type: "get",
        url: "{{ url('admin/select-item')}}" + '/' + id,
        data: id,
        success: function (response) {
          $('#OrderproPrice').attr({"value":response.results.items_price})
          $('#itemPrice').empty()
          $('#itemPrice').append('$'+response.results.items_price)
        }
      });
    });

    function ItemQuantity() {
      let quantity = $('#OrderproQty').val()
      let ItemPrice = $('#OrderproPrice').val()

      let TotalProPrice = parseInt(quantity) * parseInt(ItemPrice)

      $('#NewQuantity').empty()
      $('#NewQuantity').append(quantity)

      $('#ProTotalPrice').empty()
      $('#ProTotalPrice').append('$'+TotalProPrice)
    }
  </script>
@endsection 