<div id="myAddModalIssue" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Xuất kho</h2>
            </div>
            <div class="modal-body">
                {{-- <p>Some text in the modal.</p> --}}
                <form action="product" onsubmit="return checkIssue()" id="form-add-issue" method="POST" role="form">
                    @csrf
                    <div class="form-group" style="height: 50px">
                        {{-- <label for="email">Tên Kho:</label> --}}
                        <input required type="text" class="form-control" onblur="checkIssue()"
                            placeholder="Mã sản phẩm" name='id_product_detail' id="id_product_detail_issue">
                        <small id="error_issue" style="height: 5px" class="text-danger"></small>
                    </div>
                    {{-- <div class="form-group">
                        <label for="email">Tên Kho:</label>
                        <input required type="text" class="form-control" readonly placeholder="Mã admin" value="{{Auth::guard('admin')->user()->id}}" name='id_admin' id="id_admin">
                    </div> --}}
                    {{-- <div class="form-group">
                        <input required type="tel" class="form-control" placeholder="Mã kho" name='id_warehouse' id="id_warehouse">
                    </div> --}}
                    <div class="form-group" style="height: 50px">
                        <input required type="text" class="form-control" onblur="checkIssue()"
                            placeholder="Tên khách hàng" name='name_customer' id="name_customer">
                        <small id="error2_issue" style="height: 5px" class="text-danger"></small>
                    </div>
                    <div class="form-group" style="height: 50px">
                        <input required type="email" class="form-control" onblur="checkIssue()" placeholder="Email"
                            name='email_customer' id="email_customer">
                        <small id="error2_issue" style="height: 5px" class="text-danger"></small>
                    </div>
                    <div class="form-group" style="height: 50px">
                        <input required type="tel" class="form-control" onblur="checkIssue()" placeholder="Số lượng"
                            name='quantity_issue' id="quantity_issue">
                        <small id="error2_issue" style="height: 5px" class="text-danger"></small>
                    </div>
                    {{-- <div class="form-group">
                        <input required type="date" class="form-control" onblur="checkIssue()" placeholder="Ngày xuất" name='date_issue' id="date_issue">
                    </div> --}}

                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                        <button type="submit" id="btn_submit" class="btn btn-success">Submit</button>
                        {{-- <button id="btn_test">jhdfg</button> --}}
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>

<script>
    $('#form-add-issue').addEventListener("submit", function() {
        $('#myAddModalIssue').modal('hide')
    })
</script>
