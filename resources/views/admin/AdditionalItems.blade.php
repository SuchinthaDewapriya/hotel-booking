@extends('layouts.admin')

@section('adminContent')
<section class="content">
    <div class="row main-padding">
      <h3>Additional Items</h3>
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
            <button type="button"  onclick="AddnewItem()" class="btn btn-warning btn-sm">Add new</button>&nbsp;
            <button type="button" onclick="DeleteAllItems()" class="btn btn-danger btn-sm">Delete all</button>
        </div>
        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="Items" class="table table-bordered table-hover">

                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
        
                        <tbody id="itemsTable">
                        @foreach ($Items as $Items)
                            <tr>
                                <td>{{$Items->items_id}}</td>
                                <td>{{$Items->items_name}}</td>
                                <td>{{$Items->items_price}}</td>
                                <td>
                                    <a onclick="DeleteSingleItem({{$Items->items_id}})" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                    <a onclick="EditItemn({{$Items->items_id}})"  class="btn btn-primary btn-sm" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
</section>
@include('includes.AdditionalItemsModal')
<script>
    $(document).ready( function () {
        $('#Items').DataTable( {
            responsive: true
        } );
    });

    function AddnewItem() { 
        $('#name').val('')
        $('#price').val('')
        $('.bd-item-modal-lg').modal('show')
    }

    function DeleteAllItems() {
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
                  url: "{{ url('admin/delete-all-items')}}",
                  data : {'_method' : 'GET'},
                  success: function (response) {
                        window.location.reload()
                    }
                }); 
            } 
        });
    }

    function EditItemn(id) {
        $.ajax({
            type: "GET",
            url: "{{ url('admin/edit-item')}}"+ '/' + id,
            data : {'_method' : 'GET'},
            success: function (response) {
                $('#UpdateItem-name').val(response.items_name)
                $('#UpdatePrice').val(response.items_price) 
                $('#UpdateItemID').val(id)
                $('.bd-updateItem-modal-lg').modal('show')
            }
        });
    }

    function DeleteSingleItem(id) {
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
                    url: "{{ url('admin/item-delete')}}}" + '/' + id,
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