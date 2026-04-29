<div class="modal fade bd-newmenu-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add new menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addNewMenu" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Menu Name</label>
                            <input type="text" name="name" id="menuName" class="form-control inputclear" placeholder="Menu name">
                            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="form-group">
                            <label>Menu Price</label>
                            <input type="number" name="price" id="menuPrice" class="form-control inputclear" placeholder="Menu price">
                        </div>
                        <div class="form-group">
                            <label>Menu Description</label>
                            <textarea name="description" id="menuDescription" class="form-control inputclear" rows="5" placeholder="Menu description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Menu Image</label>
                            <input type="file" name="image" id="menuImage" class="form-control inputclear">
                        </div>
                        
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" id="menuCategory" class="form-control inputclear">
                                <option value="">Select category</option>
                                <option value="Breakfast">Breakfast</option>
                                <option value="Lunch">Lunch</option>
                                <option value="Dinner">Dinner</option>
                                <option value="Seafood Special">Seafood Special</option>
                                <option value="Beverages">Beverages</option>
                                <option value="Desserts">Desserts</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <span id="menu_name_error" class="text-danger"></span>
                            <span id="menu_description_error" class="text-danger"></span>
                            
                        </div>
                        <button type="submit" name="submit" onclick="Addmenu()" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-updatemenu-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Update Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="UpdateMenuForm" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Menu Name</label>
                            <input type="text" name="name" id="UpdateMenuName" class="form-control inputclear" placeholder="Menu name">
                            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="form-group">
                            <label>Menu Price</label>
                            <input type="number" name="price" id="UpdateMenuPrice" class="form-control inputclear" placeholder="Numbers only">
                        </div>
                     
                        <div class="form-group">
                            <label>Menu Description</label>
                            <textarea name="description" id="UpdateMenuDescription" class="form-control inputclear" rows="5" placeholder="Menu description"></textarea>
                        </div>
                        
                        <input type="hidden" name="alreadyImage" id="UpdateAlreadyImage">
                        <div class="form-group">
                            <label>Menu Image</label>
                            <input type="file" name="image" id="UpdateMenuImage" class="form-control inputclear">
                        </div>
                        <div class="form-group">
                        <label>Category</label>
                        <select name="category" id="UpdateMenuCategory" class="form-control inputclear">
                            <option value="">Select category</option>
                            <option value="Breakfast">Breakfast</option>
                            <option value="Lunch">Lunch</option>
                            <option value="Dinner">Dinner</option>
                            <option value="Seafood Special">Seafood Special</option>
                            <option value="Beverages">Beverages</option>
                            <option value="Desserts">Desserts</option>
                        </select>
                    </div>

                        <div class="form-group">
                            <input type="hidden" name="id" id="updateMenuId" class="form-control inputclear">
                        <button type="submit" name="submit" onclick="UpdateMenu()" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>