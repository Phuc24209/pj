<div id="myAddModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Thêm kho hàng</h2>
            </div>
            <div class="modal-body">
                {{-- <p>Some text in the modal.</p> --}}
                <form action="" id="form-add" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        {{-- <label for="email">Tên Kho:</label> --}}
                        <input required type="text" class="form-control" placeholder="Tên kho" name='name' id="name">
                    </div>
                    <div class="form-group">
                        {{-- <label for="pwd">Địa chỉ:</label> --}}
                        <input required type="text" class="form-control" placeholder="Địa chỉ" name="address" id="address">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Chọn ảnh kho</label>
                        <input type="file" class="form-control-file" id="avatar"
                            onchange="openPicAdd(this)" name="avatar">
                    </div>
                    <div>
                        <img src="" alt="" srcset="" id='imageDemoAdd' style="width: 100%; height:auto">
                    </div>
                    <div class="form-group d-flex justify-content-start align-items-center mt-2">
                        <div style="margin-right: 20px">
                            <input type="radio" id="1" name="status" value="1"
                                   checked>
                            <label for="1">Hoạt động</label>
                        </div>
                        <div>
                            <input type="radio" id="2" name="status" value="2">
                            <label for="2">Khoá</label>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>