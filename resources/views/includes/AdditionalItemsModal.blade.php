<div class="modal fade bd-item-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Add New Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('admin/new-item')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Item Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="" placeholder="Item Name">
                    </div>
                    <div class="form-group">
                        <label for="price">Item Price</label>
                        <input type="number"class="form-control" id="price" name="price" value="" placeholder="Item Price">            
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-updateItem-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Edit Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('admin/update-item')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Item Name</label>
                        <input type="text" class="form-control" id="UpdateItem-name" name="name" value="" placeholder="Item Name">
                    </div>
                    <div class="form-group">
                        <label for="price">Item Price</label>
                        <input type="number"class="form-control" id="UpdatePrice" name="price" value="" placeholder="Item Price">            
                    </div>
                    <input type="hidden" name="id" id="UpdateItemID">
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>