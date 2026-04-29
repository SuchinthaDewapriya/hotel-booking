<div class="modal fade bd-CustomerReport-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Customer Reports</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="get" action="{{ url('admin/customer-pdf')}}">
                        @csrf
                        <div class="form-group col-md-12">
                            <label for="month">Select Month</label>
                            <input type="month" class="form-control" name="month" id="month">
                        </div>
                        <div style="padding:15px;">
                            <button type="submit" formtarget="_blank" class="btn btn-primary">Generate Report</button>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>