<div id="myAddModalTransfer" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Chuyển kho</h2>
            </div>
            <div class="modal-body">
                {{-- <p>Some text in the modal.</p> --}}
                <form action="product" onsubmit="return checkTransfer()" id="form-add-transfer" method="POST" role="form">
                    @csrf
                    <div class="form-group">
                        {{-- <label for="email">Tên Kho:</label> --}}
                        <input required type="text" class="form-control" onblur="checkTransfer()" placeholder="Mã sản phẩm" name='id_product_detail' id="id_product_detail">
                    </div>
                    {{-- <div class="form-group">
                        
                        <input required type="text" class="form-control" hidden readonly placeholder="Mã admin" value="{{Auth::guard('admin')->user()->id}}" name='id_admin' id="id_admin">
                    </div> --}}
                    <div class="form-group" style="height: 50px">
                        <input required type="tel" class="form-control" onblur="checkTransfer()" placeholder="Mã kho mới" name='id_warehouse' id="id_warehouse">
                        <small id="error2" style="height: 5px" class="text-danger"></small>
                    </div>
                    {{-- <div class="form-group">
                        
                        <input required type="text" class="form-control" placeholder="Mã kho cũ" name='id_warehouse_old' id="id_warehouse_old">
                    </div> --}}
                    <div class="form-group" style="height: 50px">
                        <input required type="number" class="form-control" onblur="checkTransfer()"  placeholder="Số lượng" name='quantity_transfer' id="quantity_transfer">
                        <small id="error" style="height: 5px" class="text-danger"></small>
                    </div>
                    {{-- <div class="form-group">
                        <input required type="date" class="form-control" onblur="checkTransfer()" placeholder="Ngày chuyển" name='date_transfer' id="date_transfer">
                    </div> --}}
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>
