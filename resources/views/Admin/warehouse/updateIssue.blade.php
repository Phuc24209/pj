<div id="myUpdateModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Sửa xuất kho</h2>
            </div>
            <div class="modal-body">
                {{-- <p>Some text in the modal.</p> --}}
                <form action="" id="form-edit" method="POST" role="form">
                    @csrf
                    <div class="form-group">
                        {{-- <label for="email">Tên Kho:</label> --}}
                        <input required type="hidden" class="form-control" placeholder="" name='id' id="id">
                        <input required type="text" class="form-control" placeholder="Mã sản phẩm" name='id_product_detail' id="id_product_detail-edit">
                    </div>
                    <div class="form-group">
                        {{-- <label for="email">Tên Kho:</label> --}}
                        <input required type="text" class="form-control" readonly placeholder="Mã admin" value="{{Auth::guard('admin')->user()->id}}" name='id_admin' id="id_admin-edit">
                    </div>
                    <div class="form-group">
                        <input required type="tel" class="form-control" placeholder="Mã kho" name='id_warehouse' id="id_warehouse-edit">
                    </div>
                    <div class="form-group">
                        {{-- <label for="email">Tên Kho:</label> --}}
                        <input required type="date" class="form-control" placeholder="Ngày xuất" name='date_issue' id="date_issue-edit">
                    </div>
                    <div class="form-group">
                        <input required type="tel" class="form-control" placeholder="Số lượng" name='quantity' id="quantity-edit">
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