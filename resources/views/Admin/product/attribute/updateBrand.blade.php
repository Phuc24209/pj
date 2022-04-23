<div id="myUpdateModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Thêm Thương hiệu</h2>
            </div>
            <div class="modal-body">
                {{-- <p>Some text in the modal.</p> --}}
                <form action="" id="form-edit" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        {{-- <label for="email">Tên Kho:</label> --}}
                        <input required type="text" class="form-control" placeholder="Tên Thương hiệu" name='brand' id="brand-edit">
                        <input required type="hidden" class="form-control" placeholder="Tên Thương hiệu" name='id' id="id">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Chọn ảnh Thương hiệu</label>
                        <input type="file" class="form-control-file" id="image-edit"
                            onchange="openPicUpdate(this)" name="image">
                    </div>
                    <div>
                        <img src="" alt="" srcset="" id='imageDemoUpdate' style="width: 100%; height:auto">
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