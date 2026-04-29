@extends('layouts.admin')

@section('adminContent')
<section class="content">
    <div class="row main-padding">
        <h3>Manage Rooms</h3>
    </div>
    <div class="row main-padding">
        <button type="button"  onclick="AddnewRoom()" class="btn btn-warning btn-sm">Add new</button>&nbsp;
        <button type="button" onclick="DeleteAllRoom()" class="btn btn-danger btn-sm">Delete all</button>
    </div>
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
            <table id="Rooms" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price ($)</th>
                <th>Quantity</th>
                <th>+ Bed price ($)</th>
                <th>Actions</th>
              </tr>
              </thead>

              <tbody id="roomTable">
              @foreach ($room as $rooms)
                <tr>
                    <td><img src="{{ asset('public/images/rooms')}}/{{$rooms->r_image}}" width="50px"></td>
                    <td>{{$rooms->r_name}}</td>
                    <td>{{$rooms->r_price}}</td>
                    <td>{{$rooms->r_quantity}}</td>
                    <td>{{$rooms->r_additional_bed}}</td>
                    <td>
                        <a onclick="DeleteSingleRoom({{$rooms->r_id}})" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash-alt"></i></a>
                        <a onclick="EditRoom({{$rooms->r_id}})"  class="btn btn-primary btn-sm" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                    </td>
                </tr>
              @endforeach
              </tbody>

              <tfoot>
              <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>+ Bed price</th>
                <th>Actions</th>
              </tr>
              </tfoot>
            </table>
            </div>
          </div>
    </div>
</section>

@include('includes.roomModal')

<script>

    function AddnewRoom() { 
        $('#exampleModalLongTitle').text('Add new room')
        $('#roomName').val('')
        $('#roomRate').val('')
        $('#roomQuantity').val('')
        $('#additionalBedRate').val('')
        $('#description').val('')
        $('.bd-newroom-modal-lg').modal('show')
    }
    
    $(document).ready( function () {
        $('#Rooms').DataTable( {
            responsive: true
        } );
    });

    $(document).ready(function (e) {
        $('#addNewRoom').on('submit',(function(e) {
        e.preventDefault()
        var NewRoom = new FormData(this)
        $.ajax({
            type: "POST",
            url: "{{ url('admin/add-new-room')}}",
            data: NewRoom,
            cache:false,
            contentType: false,
            processData: false,
            success: function (response) {
                if(!response.errors) {
                    $('.bd-newroom-modal-lg').modal('hide')
                $(".inputclear").val('');
                swal("Success!", "New room added successfully", "success")
                $('#roomTable').empty()
                $.each(response.getRoom,function(k,v) { 
                    $('#roomTable').append('<tr><td><img src="{{ asset('public/images/rooms')}}/'
                    +v.r_image+'" width="50px"></td><td>'+v.r_name+'</td><td>'+v.r_price+'</td><td>'
                    +v.r_quantity+'</td><td>'+v.r_additional_bed+'</td><td><a onclick="DeleteSingleRoom('
                    +v.r_id+')" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash-alt"></i></a><a onclick="EditRoom('
                    +v.r_id+')" class="btn btn-primary btn-sm" title="Edit"><i class="fas fa-pencil-alt"></i></a></td></tr>')
                })
                } else {
                    //  console.log(response.errors.roomName[0]);
                    $('#room_name_error').text(response.errors.roomName[0]);
                    $('#room_description_error').text(response.errors.description[0]);
                    // $.each(response.errors.errors,function(k,v) { 
                    //     console.log(v);
                    // })
                }
                
            }
        })
    }))
    })

    function DeleteAllRoom() {
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
                    url: "{{ url('admin/delete-all-rooms')}}",
                    data : {'_method' : 'GET'},
                    success: function (response) {
                    $('#roomTable').empty()
                    $.each(response.getRoom,function(k,v) { 
                    $('#roomTable').append('<tr><td><img src="{{ asset('public/images/rooms')}}/'
                    +v.r_image+'" width="50px"></td><td>'+v.r_name+'</td><td>'+v.r_price+'</td><td>'
                    +v.r_quantity+'</td><td>'+v.r_additional_bed+'</td><td><a onclick="DeleteSingleRoom('
                    +v.r_id+')" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash-alt"></i></a><a onclick="EditRoom('
                    +v.r_id+')" class="btn btn-primary btn-sm" title="Edit"><i class="fas fa-pencil-alt"></i></a></td></tr>')
                    })
                    swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                    })
            }
        })
        } else {
            swal("Your imaginary file is safe!");
        }
        })
    }

    function DeleteSingleRoom(id) {
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
                    url: "{{ url('admin/room-delete')}}" + '/' + id,
                    data : {'_method' : 'GET'},
                    success: function (response) {
                        $('#roomTable').empty()
                        $.each(response.getRoom,function(k,v) { 
                            $('#roomTable').append('<tr><td><img src="{{ asset('public/images/rooms')}}/'
                    +v.r_image+'" width="50px"></td><td>'+v.r_name+'</td><td>'+v.r_price+'</td><td>'
                    +v.r_quantity+'</td><td>'+v.r_additional_bed+'</td><td><a onclick="DeleteSingleRoom('
                    +v.r_id+')" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash-alt"></i></a><a onclick="EditRoom('
                    +v.r_id+')" class="btn btn-primary btn-sm" title="Edit"><i class="fas fa-pencil-alt"></i></a></td></tr>')
                        })
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

    function EditRoom(id) {
        $.ajax({
            type: "GET",
            url: "{{ url('admin/edit-room')}}"+ '/' + id,
            data : {'_method' : 'GET'},
            success: function (response) {
                $('#updateRoomId').val(response.editRoom.r_id)
                $('#UpdateroomName').val(response.editRoom.r_name)
                $('#UpdateroomRate').val(response.editRoom.r_price)
                $('#UpdateroomQuantity').val(response.editRoom.r_quantity)
                $('#UpdateadditionalBedRate').val(response.editRoom.r_additional_bed)
                $('#Updatedescription').val(response.editRoom.r_description)
                $('#Updatemaxoccupancy').val(response.editRoom.max_occupancy)
                if (response.editGallery != null) {
                    $('#Updateimage1').val(response.editGallery.gallery_image_1)
                    $('#Updateimage2').val(response.editGallery.gallery_image_2)
                    $('#Updateimage3').val(response.editGallery.gallery_image_3)
                    $('#Updateimage4').val(response.editGallery.gallery_image_4)
                    $('#Updateimage5').val(response.editGallery.gallery_image_5) 
                }
                else{
                    $('#Updateimage1').val('')
                    $('#Updateimage2').val('')
                    $('#Updateimage3').val('')
                    $('#Updateimage4').val('')
                    $('#Updateimage5').val('')
                }
                $('.bd-updateroom-modal-lg').modal('show')
            }
        });
    }

    function Updateroom() {
        $('#UpdateRoomForm').on('submit',(function(e) {
        e.preventDefault()
        var UpdateRoom = new FormData(this)
        $.ajax({
            type: "POST",
            url: "{{ url('admin/update-room')}}",
            data: UpdateRoom,
            cache:false,
            contentType: false,
            processData: false,
            success: function (response) {
                $('.bd-updateroom-modal-lg').modal('hide')
                $(".inputclear").val('');
                swal("Success!", "Updated room!", "success")
                $('#roomTable').empty()
                $.each(response.getRoom,function(k,v) { 
                    $('#roomTable').append('<tr><td><img src="{{ asset('public/images/rooms')}}/'
                    +v.r_image+'" width="50px"></td><td>'+v.r_name+'</td><td>'+v.r_price+'</td><td>'
                    +v.r_quantity+'</td><td>'+v.r_additional_bed+'</td><td><a onclick="DeleteSingleRoom('
                    +v.r_id+')" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash-alt"></i></a><a onclick="EditRoom('
                    +v.r_id+')" class="btn btn-primary btn-sm" title="Edit"><i class="fas fa-pencil-alt"></i></a></td></tr>')
                })
            }
        })
    }))
    
     
    }
</script>
@endsection 