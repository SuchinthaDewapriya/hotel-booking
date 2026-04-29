<div class="modal fade bd-newroom-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add new room</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addNewRoom">
                        @csrf
                        <div class="form-group">
                            <label>Room Name</label>
                            <input type="text" name="roomName" id="roomName" class="form-control inputclear" placeholder="Room name">
                            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="form-group">
                            <label>Room rate</label>
                            <input type="number" name="roomRate" id="roomRate" class="form-control inputclear" placeholder="Numbers only">
                        </div>
                        <div class="form-group">
                            <label>Room quantity</label>
                            <input type="number" name="roomQuantity" id="roomQuantity" class="form-control inputclear" placeholder="Available rooms quantity">
                        </div>
                        <div class="form-group">
                            <label>Additional bed rates</label>
                            <input type="number" name="additionalBedRate" id="additionalBedRate" class="form-control inputclear" placeholder="Additional bed rates">
                        </div>
                        <div class="form-group">
                            <label>Room description</label>
                            <textarea name="description" id="description" class="form-control inputclear" rows="5" placeholder="Room description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Room Max Occupancy</label>
                            <input type="number" name="max_occupancy" id="maxoccupancy" class="form-control inputclear" placeholder="Max Occupancy">
                        </div>
                        <div class="form-group">
                            <label>Room image 1</label>
                            <input type="file" name="roomImage1" id="roomImage1" class="form-control inputclear">
                        </div>
                        
                        <div class="form-group">
                            <label>Room image 2</label>
                            <input type="file" name="roomImage2" id="roomImage2" class="form-control inputclear">
                        </div>

                        <div class="form-group">
                            <label>Room image 3</label>
                            <input type="file" name="roomImage3" id="roomImage3" class="form-control inputclear">
                        </div>

                        <div class="form-group">
                            <label>Room image 4</label>
                            <input type="file" name="roomImage4" id="roomImage4" class="form-control inputclear">
                        </div>

                        <div class="form-group">
                            <label>Room image 5</label>
                            <input type="file" name="roomImage5" id="roomImage5" class="form-control inputclear">
                        </div>
                        <div class="form-group">
                            <span id="room_name_error" class="text-danger"></span>
                            <span id="room_description_error" class="text-danger"></span>
                            
                        </div>
                        <button type="submit" name="submit" onclick="Addroom()" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-updateroom-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Update Room</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="UpdateRoomForm">
                        @csrf
                        <div class="form-group">
                            <label>Room Name</label>
                            <input type="text" name="roomName" id="UpdateroomName" class="form-control inputclear" placeholder="Room name">
                            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="form-group">
                            <label>Room rate</label>
                            <input type="number" name="roomRate" id="UpdateroomRate" class="form-control inputclear" placeholder="Numbers only">
                        </div>
                        <div class="form-group">
                            <label>Room quantity</label>
                            <input type="number" name="roomQuantity" id="UpdateroomQuantity" class="form-control inputclear" placeholder="Available rooms quantity">
                        </div>
                        <div class="form-group">
                            <label>Additional bed rates</label>
                            <input type="number" name="additionalBedRate" id="UpdateadditionalBedRate" class="form-control inputclear" placeholder="Additional bed rates">
                        </div>
                        <div class="form-group">
                            <label>Room description</label>
                            <textarea name="description" id="Updatedescription" class="form-control inputclear" rows="5" placeholder="Room description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Max Occuapancy</label>
                            <input type="number" name="max_occupancy" id="Updatemaxoccupancy" class="form-control inputclear" placeholder="Max Occuapancy">
                        </div>
                        <input type="hidden" name="alreadyImage1" id="Updateimage1">
                        <div class="form-group">
                            <label>Room image 1</label>
                            <input type="file" name="roomImage1" id="UpdateroomImage1" class="form-control inputclear">
                        </div>

                        <input type="hidden" name="alreadyImage2" id="Updateimage2">
                        <div class="form-group">
                            <label>Room image 2</label>
                            <input type="file" name="roomImage2" id="UpdateroomImage2" class="form-control inputclear">
                        </div>

                        <input type="hidden" name="alreadyImage3" id="Updateimage3">
                        <div class="form-group">
                            <label>Room image 3</label>
                            <input type="file" name="roomImage3" id="UpdateroomImage3" class="form-control inputclear">
                        </div>

                        <input type="hidden" name="alreadyImage4" id="Updateimage4">
                        <div class="form-group">
                            <label>Room image 4</label>
                            <input type="file" name="roomImage4" id="UpdateroomImage4" class="form-control inputclear">
                        </div>

                        <input type="hidden" name="alreadyImage5" id="Updateimage5">
                        <div class="form-group">
                            <label>Room image 5</label>
                            <input type="file" name="roomImage5" id="UpdateroomImage5" class="form-control inputclear">
                        </div>
                            <input type="hidden" name="updateRoomId" id="updateRoomId" class="form-control inputclear">
                        <button type="submit" name="submit" onclick="Updateroom()" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>