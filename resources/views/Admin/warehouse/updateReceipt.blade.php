<div id="myUpdateModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Chi tiết nhập kho của sản phẩm</h2>
            </div>
            <div class="w-100 text-center px-2">
                <hr class="p-0 m-0" />
            </div>
            <div class="modal-body py-2">
                    <div class="row w-100 pb-1">
                        {{-- <input type="text" id='id'> --}}
                        {{-- <div class="col-5 font-weight-600" id='id'>Mã sản phẩm:</div> --}}
                        <div class="col-5 font-weight-600">Mã sản phẩm:</div>
                        <div class="col-7" id="id_product_detail"></div>
                    </div>
                    <div class="row w-100 pb-1">
                        <div class="col-5 font-weight-600">Tên Kho:</div>
                        <div class="col-7" id="warehouseName"></div>
                    </div>
                    <div id="receiptDetail">
                    </div>
            </div>
        </div>

    </div>
</div>
