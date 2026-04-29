@extends('layouts.admin')

@section('adminContent')

<section class="content">
        <div class="row main-padding">
                <h3>Customers</h3>
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
                <button onclick="CustomerReport()" class="btn btn-success btn-sm">Monthly Report</button>
              </div>
              <div class="row">
                  <div class="card-body">
                      <table id="Customers" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th>Id</th> 
                          <th>Name</th>
                          <th>Birth Date</th>
                          <th>NIC</th>
                          <th>Email</th>
                          <th>Contact No</th>
                          <th>Country</th>
                          <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody id="ReservationsTable">
                          @foreach ($Customer as $Customers)
                            <tr>
                                <td>{{$Customers->cd_id}}</td>
                                <td>{{$Customers->cd_salutation}} {{$Customers->cd_first_name}} {{$Customers->cd_last_name}}</td>
                                <td>{{$Customers->cd_bday}}</td>
                                <td>{{$Customers->cd_nic}}</td>
                                <td>{{$Customers->cd_email}}</td>
                                <td>{{$Customers->cd_phone}}</td>
                                <td>{{$Customers->cd_country}}</td>
                                <td>                            
                                  <a onclick="DeleteSingleCoustomer({{$Customers->cd_id}})" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                          <th>Id</th> 
                          <th>Name</th>
                          <th>Birth Date</th>
                          <th>NIC</th>
                          <th>Email</th>
                          <th>Contact No</th>
                          <th>Country</th>
                          <th>Actions</th>
                        </tr>
                        </tfoot>
                      </table>
                    </div>
              </div>
</section>
@include('includes.CustomerModal')

<script>
$(document).ready( function () {
      $('#Customers').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
      $('#Rooms').DataTable();
    });

  function CustomerReport() {
    $('.bd-CustomerReport-modal-lg').modal('show')
  }  

  function DeleteSingleCoustomer(id) {
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
                url: "{{ url('admin/customer-delete/')}}"+'/' + id,
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