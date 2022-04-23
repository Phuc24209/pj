<div id="myUpdateModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Sửa kho hàng</h2>
            </div>
            <div class="modal-body">
                {{-- <p>Some text in the modal.</p> --}}
                <form action="" id="form-edit" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        {{-- <label for="email">Tên Kho:</label> --}}
                        <input type="text" class="form-control" placeholder="Tên kho" name='name' id="name-edit">
                        <input type="hidden" class="form-control" name='id' id="id-edit">
                    </div>
                    <div class="form-group">
                        {{-- <label for="pwd">Địa chỉ:</label> --}}
                        <input type="text" class="form-control" placeholder="Địa chỉ" name="address" id="address-edit">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Chọn ảnh kho</label>
                        <input type="file" class="form-control-file" id="avatar-edit"
                            onchange="openPicUpdate(this)" name="avatar">
                    </div>
                    <div>
                        <img src="" alt="" srcset="" id='imageDemoUpdate' style="width: 100%; height:auto">
                    </div>
                    <div class="form-group d-flex justify-content-start align-items-center mt-2">
                        {{-- <div id='status-edit' class="d-none"></div> --}}
                        <label style="margin-right: 20px">
                            <input class='cc' type="radio" id="index1" name="status" value="1" checked>
                            Hoạt động
                        </label>
                        <label>
                            <input class='cc' type="radio" id="index2" name="status" value="2">
                            Khoá
                        </label>
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