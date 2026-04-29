    <div class="modal fade bd-coupon-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Add New Coupon</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/new-coupon')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="type">Select Type</label>
                            <select id="type" class="custom-select" name="type">
                                <option value="">Select Type</option>
                                <option value="Fixed">Fixed</option>
                                <option value="Precentage">Precentage</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="coupon-name">Coupon Name</label>
                            <input type="text" class="form-control" id="coupon-name" name="name" value="" placeholder="Coupon Name">
                        </div>
                        <div class="form-group">
                            <label for="Description">Description</label>
                            <textarea id="Description" class="form-control" name="description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="room">Room discount</label>
                            <input type="number," id="room" class="form-control" name="room" value="" placeholder="Room Discount">
                        </div>
                        <div class="form-group">
                            <label for="package">Package Discount</label>
                            <input type="number" id="package" class="form-control" name="package" value="" placeholder="Package Discount">
                        </div>
                        <div class="form-group">
                            <label for="bed">Bed discount</label>
                            <input type="number" id="bed" class="form-control" name="bed" value="" placeholder="Bed Discount">            
                        </div>
                        <div class="form-group">
                            <label for="total">Total discount</label>
                            <input type="number" id="total" class="form-control" name="total" value="" placeholder="Total Discount">            
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-updateCoupon-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">Edit Coupon</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('admin/update-coupon')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="type">Select Type</label>
                                <select id="Updatetype" class="custom-select" name="type">
                                    <option value="">Select Type</option>
                                    <option value="Fixed">Fixed</option>
                                    <option value="Precentage">Precentage</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="coupon-name">Coupon Name</label>
                                <input type="text" class="form-control" id="Updatecoupon-name" name="name" value="" placeholder="Coupon Name">
                            </div>
                            <div class="form-group">
                                <label for="Description">Description</label>
                                <textarea id="UpdateDescription" class="form-control" name="description" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="room">Room discount</label>
                                <input type="number" id="Updateroom" class="form-control" name="room" value="" placeholder="Room Discount">
                            </div>
                            <div class="form-group">
                                <label for="package">Package Discount</label>
                                <input type="number" id="Updatepackage" class="form-control" name="package" value="" placeholder="Package Discount">
                            </div>
                            <div class="form-group">
                                <label for="bed">Bed discount</label>
                                <input type="number" id="Updatebed" class="form-control" name="bed" value="" placeholder="Bed Discount">            
                            </div>
                            <div class="form-group">
                                <label for="total">Total discount</label>
                                <input type="number" id="Updatetotal" class="form-control" name="total" value="" placeholder="Total Discount">            
                            </div>
                            <input type="hidden" name="UpdateCouponID" id="UpdateCouponID">
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>