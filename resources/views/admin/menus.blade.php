@extends('layouts.admin')

@section('adminContent')
<section class="content">
    <div class="row main-padding">
        <h3>Manage Menus</h3>
    </div>
    <div class="row main-padding">
        <button type="button"  onclick="AddnewMenu()" class="btn btn-warning btn-sm">Add new</button>&nbsp;
        <button type="button" onclick="DeleteAllMenu()" class="btn btn-danger btn-sm">Delete all</button>
    </div>
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
            <table id="Menus" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price ($)</th>
                <th>Description</th>
                <th>Category</th>
                <th>Actions</th>
              </tr>
              </thead>

              <tbody id="menuTable">
              @foreach ($menus as $menu)
                <tr>
                    <td><img src="{{ asset('public/images/food')}}/{{$menu->image}}" width="50px"></td>
                    <td>{{$menu->name}}</td>
                    <td>{{$menu->price}}</td>
                    <td>{{$menu->description}}</td>
                    <td>{{$menu->category}}</td>
                    <td>
                        <a onclick="DeleteSingleMenu({{$menu->id}})" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash-alt"></i></a>
                        <a onclick="EditMenu({{$menu->id}})"  class="btn btn-primary btn-sm" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                    </td>
                </tr>
              @endforeach
              </tbody>

              <tfoot>
              <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Category</th>
                <th>Actions</th>
              </tr>
              </tfoot>
            </table>
            </div>
          </div>
    </div>
</section>

@include('includes.menuModal')

<script>

    function AddnewMenu() { 
        $('#exampleModalLongTitle').text('Add new menu')
        $('#menuName').val('')
        $('#menuPrice').val('')
        $('#menuDescription').val('')
        $('#menuImage').val('')
        $('#menuCategory').val('')
        $('.bd-newmenu-modal-lg').modal('show')
    }
    
    $(document).ready( function () {
        $('#Menus').DataTable( {
            responsive: true
        } );
   
        $('#addNewMenu').on('submit',(function(e) {
        e.preventDefault()
        var NewMenu = new FormData(this)
        $.ajax({
            type: "POST",
            url: "{{ url('admin/add-new-menu')}}",
            data: NewMenu,
            cache:false,
            contentType: false,
            processData: false,
            success: function (response) {
                if(!response.errors) {
                    $('.bd-newmenu-modal-lg').modal('hide')
                $(".inputclear").val('');
                swal("Success!", "New menu added successfully", "success")
                $('#menuTable').empty()
                $.each(response.getMenu,function(k,v) { 
                    $('#menuTable').append('<tr><td><img src="{{ asset('public/images/food')}}/'
                    +v.image+'" width="50px"></td><td>'+v.name+'</td><td>'+v.price+'</td><td>'
                    +v.description+'</td><td>'+v.category+'</td><td><a onclick="DeleteSingleMenu('
                    +v.id+')" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash-alt"></i></a><a onclick="EditMenu('
                    +v.id+')" class="btn btn-primary btn-sm" title="Edit"><i class="fas fa-pencil-alt"></i></a></td></tr>')
                })
                } else {
                    //  console.log(response.errors.roomName[0]);
                    $('#menu_name_error').text(response.errors.name[0]);
                    $('#menu_description_error').text(response.errors.description[0]);
                    $('#menu_category_error').text(response.errors.category[0]);
                    // $.each(response.errors.errors,function(k,v) { 
                    //     console.log(v);
                    // })
                }
                
            }
        })
        }))
    })

    function DeleteAllMenu() {
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
                    url: "{{ url('admin/delete-all-menus')}}",
                    data : {'_method' : 'GET'},
                    success: function (response) {
                    $('#menuTable').empty()
                    $.each(response.getMenu,function(k,v) { 
                    $('#menuTable').append('<tr><td><img src="{{ asset('public/images/food')}}/'
                    +v.image+'" width="50px"></td><td>'+v.name+'</td><td>'+v.price+'</td><td>'
                    +v.description+'</td><td>'+v.category+'</td><td><a onclick="DeleteSingleMenu('
                    +v.id+')" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash-alt"></i></a><a onclick="EditMenu('
                    +v.id+')" class="btn btn-primary btn-sm" title="Edit"><i class="fas fa-pencil-alt"></i></a></td></tr>')
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

    function DeleteSingleMenu(id) {
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
                    url: "{{ url('admin/menu-delete')}}" + '/' + id,
                    data : {'_method' : 'GET'},
                    success: function (response) {
                        $('#menuTable').empty()
                        $.each(response.getMenu,function(k,v) { 
                            $('#menuTable').append('<tr><td><img src="{{ asset('public/images/food')}}/'
                    +v.image+'" width="50px"></td><td>'+v.name+'</td><td>'+v.price+'</td><td>'
                    +v.description+'</td><td>'+v.category+'</td><td><a onclick="DeleteSingleMenu('
                    +v.id+')" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash-alt"></i></a><a onclick="EditMenu('
                    +v.id+')" class="btn btn-primary btn-sm" title="Edit"><i class="fas fa-pencil-alt"></i></a></td></tr>')
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

    function EditMenu(id) {
        $.ajax({
            type: "GET",
            url: "{{ url('admin/edit-menu')}}"+ '/' + id,
            data : {'_method' : 'GET'},
            success: function (response) {
                $('#updateMenuId').val(response.editMenu.id)
                $('#UpdateMenuName').val(response.editMenu.name)
                $('#UpdateMenuPrice').val(response.editMenu.price)
                $('#UpdateMenuDescription').val(response.editMenu.description)
                $('#UpdateAlreadyImage').val(response.editMenu.image)
                //$('#menuCategory').val('');
                $('#UpdateMenuCategory').val(response.editMenu.category)

                $('.bd-updatemenu-modal-lg').modal('show')
            }
        });
    }

    function UpdateMenu() {
        $('#UpdateMenuForm').on('submit',(function(e) {
        e.preventDefault()
        var UpdateMenu = new FormData(this)
        $.ajax({
            type: "POST",
            url: "{{ url('admin/update-menu')}}",
            data: UpdateMenu,
            cache:false,
            contentType: false,
            processData: false,
            success: function (response) {
                $('.bd-updatemenu-modal-lg').modal('hide')
                $(".inputclear").val('');
                swal("Success!", "Updated menu!", "success")
                //$('#menuTable').empty()
                $.each(response.getMenu,function(k,v) { 
                    $('#menuTable').append('<tr><td><img src="{{ asset('public/images/food')}}/'
                    +v.image+'" width="50px"></td><td>'+v.name+'</td><td>'+v.price+'</td><td>'
                    +v.description+'</td><td>'+v.category+'</td><td><a onclick="DeleteSingleMenu('
                    +v.id+')" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash-alt"></i></a><a onclick="EditMenu('
                    +v.id+')" class="btn btn-primary btn-sm" title="Edit"><i class="fas fa-pencil-alt"></i></a></td></tr>')
                })
            }
        })
    }))   
    }
</script>
@endsection 