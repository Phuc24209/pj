<div id="myAddModalReceipt" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Nhập kho</h2>
            </div>
            <div class="modal-body">
                {{-- <p>Some text in the modal.</p> --}}
                <form action="product" id="form-add-receipt" method="POST" role="form">
                    @csrf
                    <div class="form-group">
                        <label>Mã sản phẩm chi tiết:</label>
                        <input required type="text" class="form-control" readonly placeholder="Mã sản phẩm" name='id_product_detail_receipt' id="id_product_detail_receipt">
                    </div>
                    <div class="form-group row px-3">
                        <select class="form-select col" aria-label="" id='id_supplier' name='id_supplier'>
                            <option selected>Nhà cung cấp</option>
                            @forelse ($allSupplier as $itemSuplier)
                                <option value='{{ $itemSuplier->id }}'>{{ $itemSuplier->name }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                        <input required type="tel" class="form-control" placeholder="Số lượng" name='quantity_receipt' id="quantity_receipt">
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
