@extends('layouts.admin')

@section('adminContent')
<section class="content">
    <div class="row main-padding">
        <h3>Coupons</h3>
    </div>
    @if ($message = Session::get('Success'))
        <div class="alert alert-success" role="alert">
            {{$message}}
        </div>
    @endif  
    @if ($message = Session::get('Danger'))
        <div class="alert alert-Danger" role="alert">
            {{$message}}
        </div>
    @endif
    <div class="row main-padding">
            <button type="button"  onclick="AddnewCoupon()" class="btn btn-warning btn-sm">Add new</button>&nbsp;
            <button type="button" onclick="DeleteAllCoupon()" class="btn btn-danger btn-sm">Delete all</button>
        </div>
        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                <table id="Coupons" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Room ($)</th>
                    <th>Package ($)</th>
                    <th>Bed ($)</th>
                    <th>Total ($)</th>
                    <th>Action</th>
                  </tr>
                  </thead>
    
                  <tbody id="roomTable">
                  @foreach ($coupons as $coupon)
                    <tr>
                        <td>{{$coupon->coupon_id}}</td>
                        <td>{{$coupon->coupon_type}}</td>
                        <td>{{$coupon->coupon_name}}</td>
                        <td>
                            @if ($coupon->coupon_room == null)
                                -
                            @else 
                                {{$coupon->coupon_room}}        
                            @endif
                        </td>
                        <td>
                            @if ($coupon->coupon_package == null)
                                -
                            @else
                                {{$coupon->coupon_package}} 
                            @endif
                        </td>
                        <td>
                            @if ($coupon->coupon_bed == null)
                                -
                            @else
                                {{$coupon->coupon_bed}}
                            @endif
                            </td>
                        <td>
                            @if ($coupon->coupon_total == null)
                                -
                            @else
                                {{$coupon->coupon_total}}
                            @endif
                            
                        </td>
                        <td>
                            <a onclick="DeleteSingleCoupon({{$coupon->coupon_id}})" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash-alt"></i></a>
                            <a onclick="EditCoupon({{$coupon->coupon_id}})"  class="btn btn-primary btn-sm" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                        </td>
                    </tr>
                  @endforeach
                  </tbody>
    
                  <tfoot>
                  <tr>
                        <th>Id</th>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Room ($)</th>
                        <th>Package ($)</th>
                        <th>Bed ($)</th>
                        <th>Total ($)</th>
                        <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
                </div>
              </div>
        </div>
    
</section>     
@include('includes.couponsModel')
<script>
     $(document).ready( function () {
        $('#Coupons').DataTable( {
            responsive: true
        } );
    });

    function AddnewCoupon() { 
        $('#coupon-name').val('')
        $('#Description').val('')
        $('#room').val('')
        $('#package').val('')
        $('#bed').val('')
        $('#total').val('')
        $('.bd-coupon-modal-lg').modal('show')
    }
    function DeleteAllCoupon() {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                  type: "GET",
                  url: "{{ url('admin/delete-all-coupons')}}",
                  data : {'_method' : 'GET'},
                  success: function (response) {
                        window.location.reload()
                    }
                }); 
            } 
        });
    }
    function EditCoupon(id) {
        $.ajax({
            type: "GET",
            url: "{{ url('admin/edit-coupon')}}"+ '/' + id,
            data : {'_method' : 'GET'},
            success: function (response) {
                $('#Updatetype').val(response.coupon_type)
                $('#Updatecoupon-name').val(response.coupon_name)
                $('#UpdateDescription').val(response.coupon_description)
                $('#Updateroom').val(response.coupon_room)
                $('#Updatepackage').val(response.coupon_package)
                $('#Updatebed').val(response.coupon_bed)
                $('#Updatetotal').val(response.coupon_total) 
                $('#UpdateCouponID').val(id)
                $('.bd-updateCoupon-modal-lg').modal('show')
            }
        });
    }

    function DeleteSingleCoupon(id) {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('admin/coupon-delete')}}}" + '/' + id,
                    data : {'_method' : 'GET'},
                    success: function (response) {
                        window.location.reload()
                    }
                });
                swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
                });
            } else {
                swal("Your imaginary file is safe!");
            }
        });
    }
</script>
@endsection