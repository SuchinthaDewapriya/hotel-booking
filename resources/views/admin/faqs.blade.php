@extends('layouts.admin')

@section('adminContent')

<section class="content">
    <div class="row main-padding">
        <h3>Manage FAQs</h3>
    </div>
    <div class="row main-padding">
        <button type="button"  onclick="AddFaq()" class="btn btn-warning btn-sm">Add new</button>&nbsp;
        <!-- <button type="button" onclick="DeleteFaq()" class="btn btn-danger btn-sm">Delete all</button> -->
    </div>
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
            <table id="Faqs" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Question</th>
                <th>Answer</th>
                <th>Actions</th>
              </tr>
              </thead>

              <tbody id="faqTable">
              @foreach ($faqs as $faq)
                <tr>
                    <td>{{ $faq->question }}</td>
                    <td>{{ $faq->answer }}</td>
                    <td>
                        <a onclick="DeleteFaq({{ $faq->id }})" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        <!-- <a onclick="EditFaq({{ $faq->id }})" class="btn btn-primary btn-sm">
                            <i class="fas fa-pencil-alt"></i>
                        </a> -->
                    </td>
                </tr>
                @endforeach
              </tbody>

              <tfoot>
              <tr>
                <th>Question</th>
                <th>Answer</th>
                <th>Actions</th>
              </tr>
              </tfoot>
            </table>
            </div>
          </div>
    </div>
</section>

@include('includes.faqModal')

<script>

function AddFaq() {
    $('#faqModal').modal('show');
}
 $(document).ready(function () {
    $('#faqForm').on('submit', function(e){
        e.preventDefault();
        var NewFAQ = new FormData(this)

        $.ajax({
            type: "POST",
            url: "{{ url('admin/faqs/add') }}",
            data: NewFAQ,
            cache:false,
            contentType: false,
            processData: false,
            success: function (response) {
                $('#faqModal').modal('hide')
                swal("Success!", "New FAQ added successfully", "success")
                setTimeout(() => {
                    location.reload();
                }, 10);
            }
        });
    });
});

function DeleteFaq(id) {
    // if(confirm('Delete this FAQ?')) {
    //     $.get('/admin/faqs/delete/' + id, function(){
    //         location.reload();
    //     });
    // }
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
                    url: "{{ url('admin/faqs/delete') }}" + '/' + id,
                    data: {'_method' : 'GET'},
                    cache:false,
                    success: function (response) {
                            setTimeout(() => {
                            location.reload();
                        }, 10);
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


