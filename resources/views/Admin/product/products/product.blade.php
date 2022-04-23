@extends('index')
@section('product')
<header>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">​

    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="../css/argon.css" type="text/css">
    <link rel="stylesheet" href="../css/custom.css" type="text/css">

</header>
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">{{Session::get('warehouseChoosed')}}</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Kho hàng</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="#" class="btn btn-sm btn-neutral text-sm" onclick="ClickNew()">Thêm mới</a>
                    {{-- <a href="#" class="btn btn-sm btn-neutral">Filters</a> --}}
                </div>
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
                    <h3 class="mb-0" id='table_header_name'>Danh sách sản phẩm trong kho {{Session::get('warehouseChoosedId')}} </h3>
                </div>
                <form method="POST" action="importExcel" class="row block h-70vh" id='formExcel'>
                    @csrf
                    <div class="d-flex">
                        <div class="btn-success btn w-100 mb-2 ml-5" onclick="clickImportExcel()">
                            Chọn file excel để import
                        </div>
                        <a href="{{asset('fileMauSp.xlsx')}}" download="FileMauImportSp">Tải file mẫu excel</a>
                        {{-- <button class="btn-success btn w-100 mb-2 ml-2">Import</button> --}}
                        <input type="file" name="excelFile" id="excelFile" accept=".xlsx" hidden onchange="changeExcelFile()">
                    </div>
                </form>
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
                                <th scope="col" class="col-1 text-center">#</th>
                                <th scope="col" class="sort col-3" data-sort="name">Tên</th>
                                <th scope="col" class="sort col-4" data-sort="budget">Mô tả</th>
                                <th scope="col" class="sort col-1 text-center" data-sort="status">Loại hàng</th>
                                <th scope="col" class="col-1 text-center">Ảnh sản phẩm</th>
                                <th scope="col" class="col-1 text-center">Giá</th>
                                <th scope="col" class="col-1 text-center">Số lượng còn</th>
                                <th scope="col" class="col-1 text-center">Màu sắc</th>
                                <th scope="col" class="col-1 text-center">Thương hiệu</th>
                                <th scope="col" class="col-1">Size</th>
                                {{-- <th scope="col" class="col-1">Trong kho</th> --}}
                                <!-- <th scope="col" class="col-1">Ngày cập nhật</th> -->
                            </tr>
                        </thead>
                        <tbody class="list" id='tbodyWarehouse'>
                            @if (count($product) > 0)
                            @forelse ($product as $item)
                            @if (count($item->product_detail) > 0)
                            <tr id='productTr-{{ $item->id }}'>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Hành động
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <button class="dropdown-item" ​type="button" data-toggle="modal" onclick="transfer({{ $item->product_detail[0]->id }})" class="btn btn-warning btn-edit">chuyển kho
                                                </button>

                                                <button class="dropdown-item" ​type="button" data-toggle="modal" onclick="issue({{ $item->product_detail[0]->id }})" class="btn btn-warning btn-edit">xuất kho
                                                </button>
                                                <button class="dropdown-item" ​type="button" data-toggle="modal" onclick="receipt({{ $item->product_detail[0]->id }})" class="btn btn-warning btn-edit">Nhập kho
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <th scope="row" class="col-1">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm" id="name-{{ $item->id }}">
                                                {{ $item->name }}
                                            </span>
                                        </div>
                                    </div>
                                </th>

                                <td class="text-sm col-1" id="descript-{{ $item->id }}">
                                    {{ $item->descrip }}
                                </td>

                                <td class="text-sm col-1 text-center" id="typename-{{ $item->id }}">
                                    {{ $item->typename }}
                                </td>

                                <td class='text-center'>
                                    <div class="avatar-group">
                                        @forelse ($item->image as $itemImg)
                                        <img class="avatar avatar-sm rounded-circle" alt="Image placeholder" id='img-{{ $itemImg->id }}' src='{{ asset($itemImg->image) }}'>
                                        @empty
                                        @endforelse
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="avatar-group">
                                        @forelse ($item->product_detail as $itemProductDetail)
                                        <a class="text-sm" id="price-{{ $itemProductDetail->id }}">
                                            {{ number_format($itemProductDetail->price) }} vnđ
                                        </a>
                                        @empty
                                        @endforelse
                                    </div>
                                </td>

                                <td class="text-center">
                                    <div class="avatar-group">
                                        @forelse ($item->product_detail as $itemProductDetail)
                                        <a class="text-sm" id="quantity-{{ $itemProductDetail->id }}">
                                            {{ $itemProductDetail->quantity }}
                                        </a>
                                        @empty
                                        @endforelse
                                    </div>
                                </td>

                                <td class="text-center">
                                    @forelse ($item->product_detail as $itemProductDetail)
                                    @forelse ($itemProductDetail->color as $itemProductcolor)
                                    <a class="text-sm" id="color-{{ $itemProductcolor->id }}">
                                        {{ $itemProductcolor->color }} |
                                    </a>
                                    @empty
                                    @endforelse
                                    @empty
                                    @endforelse
                                </td>

                                <td class='text-center'>
                                    @forelse ($item->product_detail as $itemProductDetail)
                                    @forelse ($itemProductDetail->brand as $itemProductbrand)
                                    <a class="text-sm" id="brand-{{ $itemProductbrand->id }}">
                                        {{ $itemProductbrand->brand }} |
                                    </a>
                                    @empty
                                    @endforelse
                                    @empty
                                    @endforelse
                                </td>

                                <td>
                                    @forelse ($item->product_detail as $itemProductDetail)
                                    @forelse ($itemProductDetail->size as $itemProductsize)
                                    <a class="text-sm" id="size-{{ $itemProductsize->id }}">
                                        {{ $itemProductsize->size }} |
                                    </a>
                                    @empty
                                    @endforelse
                                    @empty
                                    @endforelse
                                </td>

                            </tr>
                            @else
                            @endif
                            @empty
                            @endforelse

                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
@include('Admin.product.products.addProduct')
@include('Admin.warehouse.updateWarehouse')
@include('Admin.warehouse.addWarehouse_transfer')
@include('Admin.warehouse.addIssue')
@include('Admin.warehouse.addReceipt')

<div id="ModalExcel" class="modal fade">
    <div class="ModalExcelclass modal-dialog modal-dialog70Width" style="min-width: auto !important">
        <!-- Modal content-->
        <div class="modal-content w-100">
            <div class="modal-header">
                <h2 class="modal-title">Thêm loại sản phẩm mới</h2>
            </div>
            <div class=" justify-content-center align-items-center text-center">
                <table border="1px black solid" class="ml-5">
                    <tr>
                        <th>name</th>
                        <th>description</th>
                        <th>type</th>
                        <th>brand</th>
                        <th>suplier</th>
                        <th>color</th>
                        <th>size</th>
                        <th>price</th>
                        <th>quantity</th>
                    </tr>
                    <tbody id='dtExcel'>
                    </tbody>
                </table>
                <div class="d-flex flex-row w-100 text-rigth justify-content-end">
                    <button class="text-right mr-3 btn btn-danger mt-3 mb-3" onclick="$('#ModalExcel').modal('toggle')">Cancel</button>

                    <form action="sentToImportExcel" class="text-right mr-3 mt-3 mb-3" id="form-add-excel" method="POST" role="form">
                        @csrf
                        <button class="btn btn-success" type="submit">Add</button>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>

<script>
    let tableheight = $('#card_table').width() - 5;
    var dtTable;
    $(document).ready(function() {
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
            scrollY: "100%",
            scrollX: tableheight,
            "order": [
                [9, "desc"]
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
            scrollY: "100%",
            scrollX: tableheight,

            "order": [
                [10, "desc"]
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
    function clickImportExcel() {
        $('#excelFile').click();
    }

    function changeExcelFile() {
        var url = 'importExcel';
        let formSend = new FormData($('#formExcel')[0]);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: url,
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            data: formSend,
            success: function(response) {
                response.forEach(element => {
                    let tr1 = `<td>${element[0]}</td>`
                    let tr2 = `<td>${element[1]}</td>`
                    let tr3 = `<td>${element[2]}</td>`
                    let tr4 = `<td>${element[3]}</td>`
                    let tr5 = `<td>${element[4]}</td>`
                    let tr6 = `<td>${element[5]}</td>`
                    let tr7 = `<td>${element[6]}</td>`
                    let tr8 = `<td>${element[7]}</td>`
                    let tr9 = `<td>${element[8]}</td>`

                    $('#dtExcel').prepend(`<tr>` + tr1 + tr2 + tr3 + tr4 + tr5 + tr6 + tr7 + tr8 + tr9 + `</tr>`);
                });

                $('#ModalExcel').modal('toggle');

                toastr.options.positionClass = 'toast-bottom-left'
                toastr.success('Tạo bảng từ excel thành công', 'Thanh cong 👺👹👺')
                // setTimeout(() => {
                //     location.reload()  
                // }, 1000);
            },
            error: function(err) {
                console.log(err)
                toastr.options.positionClass = 'toast-bottom-left'
                toastr.error('Tạo bảng từ excel thất bại', 'Thất bại 👺👹👺')
            }
        })

    }

    $('#form-add-excel').submit(e => {
        e.preventDefault();
        console.log({
            dataExcel: localStorage.getItem('dataExcel')
        });
        var url = 'sentToImportExcel';
        let formSend = new FormData($('#form-add-excel')[0]);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: url,
            // enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            data: {
                dataExcel: JSON.parse(JSON.stringify(localStorage.getItem('dataExcel')))
            },
            success: function(response) {
                toastr.options.positionClass = 'toast-bottom-left'
                toastr.success('Thêm SP Thành Công', 'Thành công👺👹👺')
                setTimeout(() => {
                    location.reload();
                }, 500);
            },
            error: function(err) {
                console.log(err)
                toastr.options.positionClass = 'toast-bottom-left'
                toastr.error('Thêm SP thất bại', 'Thất bại 👺👹👺')
            }
        })
    })

    function ClickNew() {
        $('#myAddModal').modal('toggle');
    }
    $('#form-add').submit(function(e) {
        e.preventDefault();
        var url = $(this).attr('data-url');
        let formSend = new FormData($('#form-add')[0]);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: url,
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            data: formSend,
            success: function(response) {
                $('#table_Theme').DataTable().destroy();
                // $('#table_Theme').empty();
                let item = response.data[0];
                let th = `<tr id='productTr-${item.id }'>`;
                th += `<td class="text-center">
                            <div class="dropdown">`;

                th += `<div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Hành động
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <button  class="dropdown-item" ​type="button" data-toggle="modal"
                                        onclick="transfer(${item.product_detail[0].id })"
                                        class="btn btn-warning btn-edit">chuyển kho
                                        </button>
                                        
                                        <button  class="dropdown-item" ​type="button" data-toggle="modal"
                                            onclick="issue(${item.product_detail[0].id })"
                                            class="btn btn-warning btn-edit">xuất kho
                                        </button>
                                    </div>
                                </div>`;

                th += `</div>
                        </td>`;
                let td1 = `<th scope="row" class="col-1">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <span class="name mb-0 text-sm" id="name-${item.id }">
                                            ${item.name }
                                        </span>
                                    </div>
                                </div>
                            </th>`;
                let td2 = `<td class="text-sm col-1 text-left" id="descript-${item.id }">
                                ${item.descrip }
                            </td>

                            <td class="text-sm col-1 text-center" id="typename-${item.id }">
                                ${item.typename }
                            </td>`;
                let td3 = `<td class='text-center'>
                                <div class="avatar-group">`;

                item.image.map(element => {
                    td3 += `<img class="avatar avatar-sm rounded-circle" alt="Image placeholder"
                                            id='img-${element.id }' src='../${element.image }'>`;
                });
                td3 += `</div>
                            </td>`;

                let td4 = `<td class='text-center'>
                                <div class="avatar-group">`;
                item.product_detail.map(element => {
                    td4 += `<a class="text-sm"
                                            id="price-${element.id}">
                                            ${element.price} | 
                                        </a>`
                });
                td4 += `</div>
                            </td>`;

                let td5 = `<td class='text-center'>
                            <div class="avatar-group">`;
                item.product_detail.map(element => {
                    td5 += `<a class="text-sm"
                                            id="quantity-${element.id }">
                                            ${element.quantity } | 
                                        </a>`
                });
                td5 += `</div>
                        </td>`;

                let td6 = `<td class='text-center'>`;
                item.product_detail.map(element1 => {
                    element1.color.map(element2 => {
                        td6 += `<a class="text-sm" id="color-${element2.id }">
                                            ${element2.color } | 
                                        </a>`
                    });
                });
                td6 += `</td>`;

                let td7 = `<td class='text-center'>`;
                item.product_detail.map(element1 => {
                    element1.brand.map(element2 => {
                        td7 += `<a class="text-sm" id="brand-${element2.id }">
                                            ${element2.brand } | 
                                        </a>`
                    });
                });
                td7 += `</td class='text-center'>`;
                let td8 = `<td>`;
                item.product_detail.map(element1 => {
                    element1.size.map(element2 => {
                        td8 += `<a class="text-sm" id="size-${element2.id }">
                                            ${element2.size } | 
                                        </a>`;
                    });
                });
                td8 += `</td></tr>`;
                // let td9 = `<td>`;
                // item.product_detail.map(element1 => {
                //     element1.warehouse.map(element2 => {
                //         td9 += `<a class="text-sm col-1"
                //                         id="warehouse-${element1.warehouse[0].id }">
                //                         ${element2.name } | 
                //                     </a>`
                //     });
                // });
                // td9 += `</td>`;
                // let td10 = `<td class="text-sm" id="updated-${item.id }">
                //                     ${ new Date(item.updated_at).getDate() < 10 ? '0' + new Date(item.updated_at).getDate() : new Date(item.updated_at).getDate() }-${new Date(item.updated_at).getMonth() < 10 ? '0' + new Date(item.updated_at).getMonth() : (new Date(item.updated_at).getMonth() + 1)}-${new Date(item.updated_at).getFullYear()} ${new Date(item.updated_at).getHours()}:${new Date(item.updated_at).getMinutes()}:${new Date(item.updated_at).getSeconds()}
                // </td>
                // '`;

                console.log(response.data);
                toastr.options.positionClass = 'toast-bottom-left';
                toastr.success(response.message, 'Thành công ✨🎉✨');
                $('#myAddModal').modal('toggle');
                $('#form-add')[0].reset();
                $('tbody').prepend(th + td1 + td2 + td3 + td4 + td5 + td6 + td7 + td8 + td10);
                rebuild();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                toastr.options.positionClass = 'toast-bottom-left'
                toastr.error('Thêm SP thất bại', 'Thất bại 👺👹👺')
            }
        })
    })


    function transfer(id) {
        $.get('product/product_detail/' + id, function(e) {
            $('#id_product_detail').val(e[0].id);
            $('#myAddModalTransfer').modal('toggle');

        });
    }

    function issue(id) {
        $.get('product/product_detail/' + id, function(e) {
            $('#id_product_detail_issue').val(e[0].id);
            $('#myAddModalIssue').modal('toggle');

        });
    }

    function receipt(id) {
        $.get('product/product_detail/' + id, function(e) {
            $('#id_product_detail_receipt').val(e[0].id);
            $('#myAddModalReceipt').modal('toggle');

        });
    }
    $("#form-add-transfer").submit(function(e) {
        e.preventDefault();

        let formData = new FormData($('#form-add-transfer')[0]);
        console.log(formData);
        let id = $('#id_product_detail').val();
        let id_warehouse = $('#id_warehouse').val();
        let quantity_transfer = $('#quantity_transfer').val();
        let date_transfer = $('#date_transfer').val();

        if (id !== '' && id_warehouse !== '' && quantity_transfer !== '' && date_transfer !== '') {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "product/transfer",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(res) {
                    $('#table_Theme').DataTable().destroy();
                    let data = res.data;
                    $.get('product/product_detail/' + id, function(result) {
                        $('#quantity-' + data.id_product_detail).text(result[0].quantity)
                    });
                    toastr.options.positionClass = 'toast-bottom-left'
                    toastr.success('Cập nhật SP thành công', 'Thành công ✨🎉✨');
                    $('#myAddModalTransfer').modal('hide');
                    $('#form-add-transfer')[0].reset();

                    rebuild();
                },
                error: function(res) {
                    toastr.options.positionClass = 'toast-bottom-left'
                    toastr.error('Cập nhật SP thất bại', 'Thất bại 👺👹👺')
                }
            })
        }
    });
    $("#form-add-issue").submit(function(e) {
        e.preventDefault();

        let formData = new FormData($('#form-add-issue')[0]);
        console.log(formData);
        let id = $('#id_product_detail_issue').val();
        let quantity_issue = $('#quantity_issue').val();
        let date_issue = $('#date_issue').val();

        if (id !== '' && quantity_issue !== '' && date_issue !== '') {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "product/issue",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(res) {
                    $('#table_Theme').DataTable().destroy();
                    // $('#table_Theme').empty();
                    let data = res.data;
                    $.get('product/product_detail/' + id, function(result) {
                        $('#quantity-' + data.id_product_detail).text(result[0].quantity)
                    });
                    toastr.options.positionClass = 'toast-bottom-left'
                    toastr.success('Cập nhật SP thành công', 'Thành công ✨🎉✨');
                    $('#myAddModalIssue').modal('hide');
                    $('#form-add-issue')[0].reset();

                    rebuild();
                },
                error: function(res) {
                    toastr.options.positionClass = 'toast-bottom-left'
                    toastr.error('Cập nhật SP thất bại', 'Thất bại 👺👹👺')
                }
            })
        }
    });
    $("#form-add-receipt").submit(function(e) {
        e.preventDefault();

        let formData = new FormData($('#form-add-receipt')[0]);
        console.log(formData);
        let id = $('#id_product_detail_receipt').val();
        let quantity_receipt = $('#quantity_receipt').val();
        let id_supplier = $('#id_supplier').val();

        if (id !== '' && quantity_receipt !== '' && id_supplier !== '') {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "product/receipt",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(res) {
                    $('#table_Theme').DataTable().destroy();
                    // $('#table_Theme').empty();
                    let data = res.data;
                    $.get('product/product_detail/' + id, function(result) {
                        $('#quantity-' + data.id).text(result[0].quantity)
                    });
                    console.log(data);
                    toastr.options.positionClass = 'toast-bottom-left'
                    toastr.success('Cập nhật SP thành công', 'Thành công ✨🎉✨');
                    $('#myAddModalReceipt').modal('hide');
                    $('#form-add-receipt')[0].reset();

                    rebuild();
                },
                error: function(res) {
                    toastr.options.positionClass = 'toast-bottom-left'
                    toastr.error('Cập nhật SP thất bại', 'Thất bại 👺👹👺')
                }
            })
        }
    });
</script>

@php
echo '<script>
    var chooseWarehouseID = '.Session::get('
    warehouseChoosedId ').'
</script>';
@endphp
<script>
    function checkTransfer() {

        $.get('product/product_detail/' + $('#id_product_detail').val(), function(res) {
            // $('#id_warehouse_old').val(e.id_warehouse);

            let e = res[0];
            var flag = 0;
            var checkId = 0;
            var checkQuantity = 0;
            let idWarehouse = $('#id_warehouse').val();
            res[1].map(warehouseId => flag += (warehouseId.id == idWarehouse) ? 1 : 0);
            console.log(parseInt($('#quantity_transfer').val()));
            // console.log($('#id_warehouse').val(), res[1]);
            if (flag > 0) {
                document.getElementById('id_warehouse').style.borderColor = '#43fa38';
                document.getElementById('error2').innerText = '';

                if ($('#id_warehouse').val() == chooseWarehouseID) {
                    document.getElementById('id_warehouse').style.borderColor = '#fc403e';
                    document.getElementById('error2').innerText = 'Bạn đang không ở kho ' + e.id_warehouse;
                    checkId = 0;
                } else if ($('#id_warehouse').val() == e.id_warehouse) {
                    document.getElementById('id_warehouse').style.borderColor = '#fc403e';
                    document.getElementById('error2').innerText = 'Bị trùng kho hiện tại!';
                    checkId = 0;
                } else {
                    document.getElementById('id_warehouse').style.borderColor = '#43fa38';
                    document.getElementById('error2').innerText = '';
                    checkId = 1;
                }


            } else {
                document.getElementById('id_warehouse').style.borderColor = '#fc403e';
                document.getElementById('error2').innerText = 'Kho không tồn tại!';
                checkId = 0;
            }

            if (parseInt($('#quantity_transfer').val()) > e.quantity) {
                document.getElementById('quantity_transfer').style.borderColor = '#fc403e';
                document.getElementById('error').innerText = 'Vượt quá số lượng  ' + e.quantity + ' ở trong kho!';
                checkQuantity = 0;
            } else {
                document.getElementById('quantity_transfer').style.borderColor = '#43fa38';
                document.getElementById('error').innerText = '';
                checkQuantity = 1;
            }

            if (checkQuantity + checkId == 0) {
                return false;
            } else {
                return true;
            }
        });
    }

    function checkIssue() {

        $.get('product/product_detail/' + $('#id_product_detail_issue').val(), function(res) {
            let e = res[0];
            var checkId = 0;
            var checkQuantity = 0;

            if (e.id_warehouse != chooseWarehouseID) {
                document.getElementById('id_product_detail_issue').style.borderColor = '#fc403e';
                document.getElementById('error_issue').innerText = 'Sản phẩm đang ở [kho] ' + e.id_warehouse + ' không ở kho hiện tại [kho] ' + chooseWarehouseID;
                checkId = 0;
            } else {
                document.getElementById('id_product_detail_issue').style.borderColor = '#43fa38';
                document.getElementById('error_issue').innerText = '';
                checkId = 1;
            }

            if (parseInt($('#quantity_issue').val()) > e.quantity) {
                document.getElementById('quantity_issue').style.borderColor = '#fc403e';
                document.getElementById('error2_issue').innerText = 'Vượt quá số lượng  ' + e.quantity + ' ở trong kho!';
                checkQuantity = 0;
            } else {
                document.getElementById('quantity_issue').style.borderColor = '#43fa38';
                document.getElementById('error2_issue').innerText = '';
                checkQuantity = 1;
            }

            if (checkQuantity + checkId == 0) {
                return false;
            } else {
                return true;
            }
        });
    }

    function validateProduct() {
        var checkname = false;
        var checkdescrip = false;
        var checktypename = false;
        var checkemptybrand = false;
        var checkemptysupplier = false;
        var checkemptycolor = false;
        var checkemptysize = false;
        var checkemptyprice = false;
        var checkemptyquantity = false;

        if ($('#quantity').val() != '') {
            if ($('#quantity').val() < 1) {
                document.getElementById('quantity').style.borderColor = '#fc403e';
                document.getElementById('errorquantity').innerText = 'Số lượng không được < 1';
                checkemptyquantity = false;
            } else {
                document.getElementById('quantity').style.borderColor = '#09c002';
                document.getElementById('errorquantity').innerText = '';
                checkemptyquantity = true;
            }
        } else {
            document.getElementById('quantity').style.borderColor = '#fc403e';
            document.getElementById('errorquantity').innerText = 'Số lượng không được để trống!';
            checkemptyquantity = false;
        }

        if ($('#price').val() != '') {
            if ($('#price').val() < 1) {
                document.getElementById('price').style.borderColor = '#fc403e';
                document.getElementById('errorprice').innerText = 'Giá không được < 1';
                checkemptyprice = false;
            } else {
                document.getElementById('price').style.borderColor = '#09c002';
                document.getElementById('errorprice').innerText = '';
                checkemptyprice = true;
            }
        } else {
            document.getElementById('price').style.borderColor = '#fc403e';
            document.getElementById('errorprice').innerText = 'Giá không được để trống!';
            checkemptyprice = false;
        }

        if ($('#size').val() == 'Kích cỡ') {
            document.getElementById('size').style.borderColor = '#fc403e';
            document.getElementById('errorsize').innerText = 'Hãy chọn kích cỡ!';
            checkemptysize = false;
        } else {
            document.getElementById('size').style.borderColor = '#09c002';
            document.getElementById('errorsize').innerText = '';
            checkemptysize = true;
        }
        if ($('#color').val() == 'Màu sắc') {
            document.getElementById('color').style.borderColor = '#fc403e';
            document.getElementById('errorcolor').innerText = 'Hãy chọn màu!';
            checkemptycolor = false;
        } else {
            document.getElementById('color').style.borderColor = '#09c002';
            document.getElementById('errorcolor').innerText = '';
            checkemptycolor = true;
        }
        if ($('#supplier').val() == 'Nhà cung cấp') {
            document.getElementById('supplier').style.borderColor = '#fc403e';
            document.getElementById('errorsupplier').innerText = 'Hãy chọn nhà cung cấp!';
            checkemptysupplier = false;
        } else {
            document.getElementById('supplier').style.borderColor = '#09c002';
            document.getElementById('errorsupplier').innerText = '';
            checkemptysupplier = true;
        }
        if ($('#brand').val() == 'Thương hiệu') {
            document.getElementById('brand').style.borderColor = '#fc403e';
            document.getElementById('errorbrand').innerText = 'Hãy chọn thương hiệu!';
            checkemptybrand = false;
        } else {
            document.getElementById('brand').style.borderColor = '#09c002';
            document.getElementById('errorbrand').innerText = '';
            checkemptybrand = true;
        }
        if ($('#typename').val() == 'Loại sản phẩm') {
            document.getElementById('typename').style.borderColor = '#fc403e';
            document.getElementById('errortypename').innerText = 'Hãy chọn loại sản phẩm!';
            checktypename = false;
        } else {
            document.getElementById('typename').style.borderColor = '#09c002';
            document.getElementById('errortypename').innerText = '';
            checktypename = true;
        }
        if ($('#descrip').val() == '') {
            document.getElementById('descrip').style.borderColor = '#fc403e';
            document.getElementById('errordescrip').innerText = 'Hãy chọn mô tả!';
            checkdescrip = false;
        } else {
            document.getElementById('descrip').style.borderColor = '#09c002';
            document.getElementById('errordescrip').innerText = '';
            checkdescrip = true;
        }
        if ($('#name').val() == '') {
            document.getElementById('name').style.borderColor = '#fc403e';
            document.getElementById('errorname').innerText = 'Hãy chọn tên sản phẩm!';
            checkname = false;
        } else {
            document.getElementById('name').style.borderColor = '#09c002';
            document.getElementById('errorname').innerText = '';
            checkname = true;
        }

        if (checkname === true && checkdescrip === true && checktypename === true && checkemptybrand === true && checkemptysupplier === true && checkemptycolor === true && checkemptysize === true && checkemptyprice === true && checkemptyquantity) {
            return true;
        } else {
            return false;
        }
    }
</script>
@endsection