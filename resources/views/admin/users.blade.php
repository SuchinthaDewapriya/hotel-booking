@extends('layouts.admin')

@section('adminContent')
<section class="content">
    <div class="row main-padding">
        <h3>Users</h3>
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
        <a href="{{ url('admin/new-user') }}" class="btn btn-warning btn-sm">Add new</a>
    </div>
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table id="Users" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody id="userTable">
                    @foreach ($Users as $User)
                    <tr>
                        <td>{{$User->id}}</td>
                        <td>{{$User->name}}</td>
                        <td>{{$User->email}}</td>
                        <td>{{$User->type}}</td>
                        <td>
                            <a onclick="DeleteSingleUser({{$User->id}})" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>     

<script>
     $(document).ready( function () {
        $('#Users').DataTable( {
            responsive: true
        } );
    });

    function DeleteSingleUser(id) {
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
                    url: "{{ url('admin/user-delete')}}" + '/' + id,
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