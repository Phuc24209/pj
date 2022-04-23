@extends('index')
@section('product')

<header>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">​

    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('css/argon.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" type="text/css">
</header>
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Nhập kho</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Phiếu</a></li>
                            {{-- <li class="breadcrumb-item active" aria-current="page">Thuộc tính</li> --}}
                            <li class="breadcrumb-item active" aria-current="page">Nhập kho</li>
                        </ol>
                    </nav>
                </div>
                {{-- <div class="col-lg-6 col-5 text-right">
                    <a href="#" class="btn btn-sm btn-neutral text-sm" onclick="ClickNew()" data-toggle="modal" data-target="#myAddModalReceipt">Thêm mới</a>
                    {{-- <a href="#" class="btn btn-sm btn-neutral">Filters</a> --}}
                {{-- </div> --}}
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card" id='card_table'>
                <!-- Card header -->
                <div class="card-header border-0" id='header_table' onclick="tb_theme()">
                    <h3 class="mb-0" id='table_header_name'>Danh sách nhập kho</h3>
                </div>
                <script>
                    function tb_theme() {
                        document.getElementById('card_table').classList.toggle('bg-default');
                        document.getElementById('card_table').classList.toggle('shadow');
                        document.getElementById('table_header_name').classList.toggle('text-white');
                        document.getElementById('table_Theme').classList.toggle('table-dark');
                        document.getElementById('thead_Theme').classList.toggle('thead-dark');
                        document.getElementById('header_table').classList.toggle('bg-transparent');
                        document.getElementById('panigation_table').classList.toggle('bg-default');
                        document.getElementById('panigation_table').classList.toggle('shadow');
                    }
                </script>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id='table_Theme'>
                        <thead class="___class_+?23___" id='thead_Theme'>
                            <tr>
                                <th scope="col" class="col-1">Mã sản phẩm</th>
                                <th scope="col" class="col-1">Mã admin</th>
                                <th scope="col" class="col-1">Mã kho</th>
                                <th scope="col" class="col-1">Mã nhà cung cấp</th>
                                <th scope="col" class="col-1">Ngày nhập & số lượng</th>
                                {{-- <th scope="col" class="col-1">Số lượng</th> --}}
                                {{-- <th scope="col" class="col-1">Ngày cập nhật</th> --}}
                                <th scope="col" class="col-1"></th>
                            </tr>
                        </thead>
                        <tbody class="list" id='tbodyWarehouse'>
                            {{-- {{dd($receipt)}} --}}
                            @forelse ($receipt as $item)
                            <tr id='receiptTr-{{ $item->id }}'>
                                <td class="text-sm" id="product-{{ $item->id }}">
                                    {{ $item->id_product_detail }}
                                </td>
                                <td class="text-sm" id="admin-{{ $item->id }}">
                                    {{ $item->adminName }}
                                </td>
                                <td class="text-sm" id="warehouse-{{ $item->id }}">
                                    {{ $item->warehouseName }}
                                </td>
                                <td class="text-sm" id="supplier-{{ $item->id }}">
                                    {{ $item->supplierName }} \
                                </td>
                                <td class="text-sm flex flex-row" id="date_receipt-{{ $item->id }}">
                                     <strong>Số lượng:</strong>
                                    {{ count($item->receiptDetail)>0?$item->receiptDetail[0]->quantity:'0'}}<br /> 
                                    <strong>Ngày nhập:</strong>
                                    {{ count($item->receiptDetail)>0?$item->receiptDetail[0]->created_at:'--' }}<br />
                                </td>

                                {{-- <td class="text-sm" id="updated-{{ $item->id }}">
                                {{ date('d-m-Y H:i:s', strtotime($item->updated_at)) }}
                                </td> --}}

                                <td class="text-right">
                                    <button ​type="button" data-toggle="modal" onclick="editWh({{ $item->id }})" class="btn btn-warning btn-edit">Chi tiết</button>
                                </td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
function runMyFunction()
{
    dd('hehe');
}
if (isset($_GET['hello'])) {
    runMyFunction();
}
?>

@include('Admin.warehouse.updateReceipt')

{{-- <script type="text/javascript" charset="utf-8">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script> --}}
<script>
    var dtTable;
    $(document).ready(function() {

        $('#form-add-receipt').submit((e)=> {
        console.log(e);
        e.preventDefault();


        let formSend = new FormData($('#form-add-receipt')[0]);
        let data = $('#id_product_detail').val();
        
        try {
             $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: 'receipt',
            contentType: false,
            processData: false,
            data: formSend,
            success: function(response) {
                $('#table_Theme').DataTable().destroy();
                // $('#table_Theme').empty();

                let item = response.data;
                console.log(item);
                let th = `<tr id='receiptTr-${ item.id }'>
                                <td class="text-sm" id="product-${ item.id }">
                                    ${ item.id_product_detail }
                                </td>
                                <td class="text-sm" id="admin-${ item.id }">
                                    ${ item.id_admin }
                                </td>`;
                let td1 = `<td class="text-sm" id="warehouse-${ item.id }">
                                    ${ item.id_warehouse }
                                </td>
                                <td class="text-sm" id="supplier-${ item.id }">
                                    ${ item.id_supplier }
                                </td>`;

                let td2 = `<td class="text-sm" id="date_receipt-${ item.id }">
                                    ${ item.date_receipt }
                                </td>
                                <td class="text-sm" id="quantity-${ item.id }">
                                    ${ item.quantity }
                                </td>`;

                let td3 = `<td class="text-sm" id="updated-${ item.id }">
                                ${ new Date(item.updated_at).getDate() < 10 ? '0' + new Date(item.updated_at).getDate() : new Date(item.updated_at).getDate() }-${new Date(item.updated_at).getMonth() < 10 ? '0' + new Date(item.updated_at).getMonth() : new Date(item.updated_at).getMonth()}-${new Date(item.updated_at).getFullYear()} ${new Date(item.updated_at).getHours()}:${new Date(item.updated_at).getMinutes()}:${new Date(item.updated_at).getSeconds()}
                            </td>`;

                let td4 = `<td class="text-right">
                                <div class="dropdown">
                                    <button ​type="button" data-toggle="modal"
                                        onclick="editWh(${ item.id })"
                                        class="btn btn-warning btn-edit">Edit</button>
                                    <button ​type="button" data-toggle="modal" class="btn btn-danger btn-delete"
                                        onclick="deleteWh(${ item.id })">Delete</button>
                                </div>
                            </td>
                        </tr>`;

                console.log(response.data);
                toastr.options.positionClass = 'toast-bottom-left'
                toastr.success(response.message, 'Thành công ✨🎉✨');
                $('#myAddModalReceipt').modal('toggle');
                $('#form-add-receipt')[0].reset();
                $('tbody').prepend(th + td1 + td2 + td3 + td4);
                rebuild();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                toastr.options.positionClass = 'toast-bottom-left'
                toastr.error('Thêm kho thất bại', 'Thất bại 👺👹👺')
            }
        })
        } catch (error) {
            console.log(error,'error');
        }
       
    });

        dtTable = $('#table_Theme').DataTable({
            language: {
                sProcessing: "Đang xử lý...",
                sSearch: "Tìm:",
                sLengthMenu: "Xem _MENU_ mục",
                sZeroRecords: "Không tìm thấy dòng nào phù hợp",
                sInfo: "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                sInfoEmpty: "Đang xem 0 đến 0 trong tổng số 0 mục",
                sInfoFiltered: "(được lọc từ _MAX_ mục)",
                sInfoPostFix: "",
                sUrl: "",
                paginate: {
                    previous: "<i class='ni ni-bold-left'>",
                    next: "<i class='ni ni-bold-right'>"
                },
            },
            "order": [
                [0, "desc"]
            ],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
        });
        dtTable.button(0).text('Sao chép');
        dtTable.button(1).text('Xuất file CSV');
        dtTable.button(2).text('Xuất file Excel');
        dtTable.button(3).text('Xuất file PDF');
        dtTable.button(4).text('In');
    });

    function rebuild() {
        dtTable = $('#table_Theme').DataTable({
            language: {
                sProcessing: "Đang xử lý...",
                sSearch: "Tìm:",
                sLengthMenu: "Xem _MENU_ mục",
                sZeroRecords: "Không tìm thấy dòng nào phù hợp",
                sInfo: "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                sInfoEmpty: "Đang xem 0 đến 0 trong tổng số 0 mục",
                sInfoFiltered: "(được lọc từ _MAX_ mục)",
                sInfoPostFix: "",
                sUrl: "",
                paginate: {
                    previous: "<i class='ni ni-bold-left'>",
                    next: "<i class='ni ni-bold-right'>"
                },
            },
            "order": [
                [0, "desc"]
            ],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
        });
        dtTable.button(0).text('Sao chép');
        dtTable.button(1).text('Xuất file CSV');
        dtTable.button(2).text('Xuất file Excel');
        dtTable.button(3).text('Xuất file PDF');
        dtTable.button(4).text('In');
    }
</script>


<script type="text/javascript">
    function ClickNew() {
        $('#myAddModalReceipt').modal('toggle');
    }
   



    function editWh(id) {
        $.get('receipt/' + id, function(e) {
            console.log(e[0]);
            $('#id_product_detail').text(e[0].id_product_detail);
            $('#warehouseName').text(e[0].warehouseName);
            $('#receiptDetail').text('');
            e[0].receiptDetail.forEach(a => {
                $('#receiptDetail').append(`<div class="w-100 text-center px-5 py-2">
                            <hr class="p-0 m-0" />
                        </div>
                        <div class="row w-100 pb-1">
                            <div class="col-5 font-weight-600">Tên admin:</div>
                            <div class="col-7">${a.nameAdmin}</div>

                        </div>
                        <div class="row w-100 pb-1">
                            <div class="col-5 font-weight-600">Nhà cung cấp:</div>
                            <div class="col-7">${ a.nameSupplier }</div>
                        </div>
                         <div class="row w-100 pb-1">
                            <div class="col-5 font-weight-600">Số lượng:</div>
                            <div class="col-7">${ a.quantity }</div>
                        </div>
                        <div class="row w-100 pb-1">
                            <div class="col-5 font-weight-600">Ngày nhập:</div>
                            <div class="col-7">${ a.created_at }</div>
                        </div>`);
            });

            $('#myUpdateModal').modal('toggle');
        });
    }

    $("#form-edit").submit(function(e) {
        e.preventDefault();

        let formData = new FormData($('#form-edit')[0]);
        console.log(formData);
        let id_product_detail = $('#id_product_detail-edit').val();
        let id_admin = $('#id_admin-edit').val();
        let id_warehouse = $('#id_warehouse-edit').val();
        let id_supplier = $('#id_supplier-edit').val();
        let date_receipt = $('#date_receipt-edit').val();
        let quantity = $('#quantity-edit').val();

        if (id_product_detail !== '' && id_admin !== '' && id_warehouse !== '' && id_supplier !== '' &&
            date_receipt !== '' && quantity !== '') {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "receipt/update",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(res) {
                    $('#table_Theme').DataTable().destroy();
                    // $('#table_Theme').empty();
                    let data = res.data;
                    $('#product-' + data.id).text(data.id_product_detail);
                    $('#amin-' + data.id).text(data.id_amin);
                    $('#warehouse-' + data.id).text(data.id_warehouse);
                    $('#suppier-' + data.id).text(data.id_suppier);
                    $('#date_receipt-' + data.id).text(data.date_receipt);
                    $('#quantity-' + data.id).text(data.quantity);
                    $('#updated-' + data.id).text(
                        `${ new Date(data.updated_at).getDate() < 10 ? '0' + new Date(data.updated_at).getDate() : new Date(data.updated_at).getDate() }-${new Date(data.updated_at).getMonth() < 10 ? '0' + new Date(data.updated_at).getMonth() : new Date(data.updated_at).getMonth()}-${new Date(data.updated_at).getFullYear()} ${new Date(data.updated_at).getHours()}:${new Date(data.updated_at).getMinutes()}:${new Date(data.updated_at).getSeconds()}`
                    );
                    $('#myUpdateModal').modal('hide');
                    $('#form-edit')[0].reset();
                    toastr.options.positionClass = 'toast-bottom-left'
                    toastr.success('Cập nhật sản phẩm thành công', 'Thành công ✨🎉✨');
                    rebuild();
                },
                error: function(res) {
                    toastr.options.positionClass = 'toast-bottom-left'
                    toastr.error('Cập nhật kho thất bại', 'Thất bại 👺👹👺')
                }
            })
        }
    });
</script>
{{-- @php
        if(isset($err)){    
            echo("<div class='alert alert-primary' role='alert'>".$err."</div>");
        }
    @endphp --}}
{{-- <script>
        function openHexAdd(obj) {
            $("#hexDemoAdd").css("background-color", obj.value);
        }

        function openHexUpdate(obj) {
            $("#hexDemoUpdate").css("background-color", obj.value);
        }
    </script> --}}
<div id="myAddModalReceipt" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Nhập kho</h2>
            </div>
            <div class="modal-body">
                {{-- <p>Some text in the modal.</p> --}}
                <form  id="form-add-receipt" >
                    @csrf
                    <div class="form-group">
                        <label>Mã sản phẩm chi tiết:</label>
                        <input required type="text" class="form-control" placeholder="Mã sản phẩm" name='id_product_detail_new' id="id_product_detail_new">
                    </div>
                    <div class="form-group row px-3">
                        <select class="form-select col" aria-label="" id='id_supplier_new' name='id_supplier_new'>
                            <option selected>Nhà cung cấp</option>
                            @forelse ($all_supplier as $itemSuplier)
                            <option value='{{ $itemSuplier->id }}'>{{ $itemSuplier->name }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <input required type="tel" class="form-control" placeholder="Số lượng" name='quantity_new' id="quantity_new">
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

@endsection