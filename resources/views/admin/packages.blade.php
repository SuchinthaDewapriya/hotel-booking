@extends('layouts.admin')

@section('adminContent')
<section class="content">
    <div class="row main-padding">
        <h3>Packages</h3>
    </div>
    <div class="row main-padding">
        <button type="button"  onclick="AddnewPackage()" class="btn btn-warning btn-sm">Add new</button>&nbsp;
        <button type="button" onclick="DeleteAllPackage()" class="btn btn-danger btn-sm">Delete all</button>
    </div>
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
            <table id="Packages" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Name</th>
                <th>Price ($)</th>
                <th>+ Bed price ($)</th>
                <th>Actions</th>
              </tr>
              </thead>

              <tbody id="packageTable"> 
              @foreach ($Package as $Packages)
                <tr>
                    <td>{{$Packages->p_name}}</td>
                    <td>{{$Packages->p_price}}</td>
                    <td>{{$Packages->p_additional_bed}}</td>
                    <td>
                        <a onclick="DeleteSinglePackage({{$Packages->p_id}})" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash-alt"></i></a>
                        <a onclick="EditPackage({{$Packages->p_id}})"  class="btn btn-primary btn-sm" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                    </td>
                </tr>
              @endforeach
              </tbody>

              <tfoot>
              <tr>
                <th>Name</th>
                <th>Price ($)</th>
                <th>+ Bed price ($)</th>
                <th>Actions</th>
              </tr>
              </tfoot>
            </table>
            </div>
          </div>
    </div>
</section>

@include('includes.packageModal')

<script>

    function AddnewPackage() {
        $('#PackageModelTitle').text('Add new package')
        $('#PackageName').val('')
        $('#PackageRate').val('')
        $('#additionalBedRate').val('')
        $('.bd-newPackage-modal-lg').modal('show')
    }
    
    $(document).ready( function () {
        $('#Packages').DataTable( {
            responsive: true
        } );
    });

    $(document).ready(function (e) {
        $('#addNewPackage').on('submit',(function(e) {
        e.preventDefault()
        var NewPackage = new FormData(this)
        $.ajax({
            type: "POST",
            url: "{{ url('admin/add-new-package')}}",
            data: NewPackage,
            cache:false,
            contentType: false,
            processData: false,
            success: function (response) {
                $('.bd-newPackage-modal-lg').modal('hide')
                $(".inputclear").val('');
                swal("Success!", "Added new package!", "success")
                $('#packageTable').empty()
                $.each(response.getPackage,function(k,v) { 
                    $('#packageTable').append('<tr><td>'+v.p_name+'</td><td>'+v.p_price+'</td><td>'
                      +v.p_additional_bed+'</td><td><a onclick="DeleteSinglePackage('
                      +v.p_id+')" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash-alt"></i></a><a onclick="EditPackage('
                      +v.p_id+')"  class="btn btn-primary btn-sm" title="Edit"><i class="fas fa-pencil-alt"></i></a><i class="fas fa-pencil-alt"></i></a></td></tr>')
                })
            }
        })
    }))
    })

    function DeleteAllPackage() {
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
                    url: "{{ url('admin/delete-all-packages')}}",
                    data : {'_method' : 'GET'},
                    success: function (response) {
                    $('#packageTable').empty()
                    $.each(response.getPackage,function(k,v) { 
                    $('#packageTable').append('<tr><td>'+v.p_name+'</td><td>'+v.p_price+'</td><td>'+v.p_additional_bed+'</td><td><a onclick="DeleteSinglePackage('
                    +v.p_id+')" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash-alt"></i></a><a onclick="EditPackage('
                    +v.p_id+')"  class="btn btn-primary btn-sm" title="Edit"><i class="fas fa-pencil-alt"></i></a></td></tr>')
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

    function DeleteSinglePackage(id) {
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
                    url: "{{ url('admin/package-delete')}}" + '/' + id,
                    data : {'_method' : 'GET'},
                    success: function (response) {
                        $('#packageTable').empty()
                        $.each(response.getPackage,function(k,v) { 
                            $('#packageTable').append('<tr><td>'+v.p_name+'</td><td>'+v.p_price+'</td><td>'+v.p_additional_bed+'</td><td><a onclick="DeleteSinglePackage('
                            +v.p_id+')" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash-alt"></i></a><a onclick="EditPackage('
                            +v.p_id+')"  class="btn btn-primary btn-sm" title="Edit"><i class="fas fa-pencil-alt"></i></a></td></tr>')
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

    function EditPackage(id) {
        $.ajax({
            type: "GET",
            url: "{{ url('admin/edit-package')}}"+ '/' + id,
            data : {'_method' : 'GET'},
            success: function (response) {
                $('#UpdatePackageName').val(response.p_name)
                $('#UpdatePackageId').val(response.p_id)
                $('#UpdatePackageRate').val(response.p_price)
                $('#UpdateadditionalBedRate').val(response.p_additional_bed)
                $('.bd-updatePackage-modal-lg').modal('show')
            }
        });
    }

    function UpdatePackage() {
      var UpdateForm = $('#UpdatePackageFrom').serialize()
      $.ajax({
        type: "POST",
        url: "{{ url('admin/update-package') }}",
        data: UpdateForm,
        success: function (response) {
          $('.bd-newPackage-modal-lg').modal('hide')
          $(".inputclear").val('');
          $('#packageTable').empty()
          $.each(response.getPackage,function(k,v) { 
              $('#packageTable').append('<tr><td>'+v.p_name+'</td><td>'+v.p_price+'</td><td>'
                +v.p_additional_bed+'</td><td><a onclick="DeleteSinglePackage('
                +v.p_id+')" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash-alt"></i></a><a onclick="EditPackage('
                +v.p_id+')"  class="btn btn-primary btn-sm" title="Edit"><i class="fas fa-pencil-alt"></i></a></td></tr>')
          })
          swal("Success!", "Added new package!", "success")
        }
      });
    }
</script>
@endsection 