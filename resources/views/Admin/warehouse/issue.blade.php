@extends('index')
@section('product')
    <header>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
                        <h6 class="h2 text-white d-inline-block mb-0">Xuất sản phẩm</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Phiếu</a></li>
                                {{-- <li class="breadcrumb-item active" aria-current="page">Thuộc tính</li> --}}
                                <li class="breadcrumb-item active" aria-current="page">Xuất sản phẩm</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="#" class="btn btn-sm btn-neutral text-sm" onclick="ClickNew()">Xuất sản phẩm</a>
                        <!-- <a href="#" class="btn btn-sm btn-neutral">Filters</a> -->
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
                        <h3 class="mb-0" id='table_header_name'>Danh sách xuất kho</h3>
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
                                    <th scope="col" class="col-1">Sản phẩm</th>
                                    <th scope="col" class="col-1">Admin</th>
                                    <th scope="col" class="col-1">Kho</th>
                                    <th scope="col" class="col-1">Tên KH</th>
                                    <th scope="col" class="col-1">Email</th>
                                    <th scope="col" class="col-1">Số lượng</th>
                                    <th scope="col" class="col-1">Ngày xuất sản phẩm</th>

                                </tr>
                            </thead>
                            <tbody class="list" id='tbodyWarehouse'>
                                @forelse ($issue as $item)
                                    <tr id='issueTr-{{ $item->id }}'>
                                        <td class="text-sm" id="product-{{ $item->id }}">
                                            {{ $item->nameProduct }}
                                        </td>
                                        <td class="text-sm" id="admin-{{ $item->id }}">
                                            {{ $item->nameAdmin }}
                                        </td>
                                        <td class="text-sm" id="warehouse-{{ $item->id }}">
                                            {{ $item->nameWarehouse }}
                                        </td>

                                        <td class="text-sm" id="name-customer-{{ $item->id }}">
                                            {{ $item->name_customer }}
                                        </td>
                                        <td class="text-sm" id="email-customer-{{ $item->id }}">
                                            {{ $item->email_customer }}
                                        </td>
                                        <td class="text-sm" id="quantity-{{ $item->id }}">
                                            {{ $item->quantity }}
                                        </td>
                                        <td class="text-sm" id="date_issue-{{ $item->id }}">
                                            {{ $item->date_issue }}
                                        </td>


                                        {{-- <td class="text-right">
                                            <div class="dropdown">
                                                <button ​type="button" data-toggle="modal"
                                                    onclick="editWh({{ $item->id }})"
                                class="btn btn-warning btn-edit">Edit</button>
                                <button ​type="button" data-toggle="modal" class="btn btn-danger btn-delete" onclick="deleteWh({{ $item->id }})">Delete</button>
                </div>
                </td> --}}
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

    <!-- Modal -->
    @include('Admin.warehouse.addIssue')
    @include('Admin.warehouse.updateIssue')

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
                    [6, "desc"]
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
                    [6, "desc"]
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
            $('#myAddModalIssue').modal('toggle');
        }
        $('#myAddModalIssue').submit(function(e) {
            e.preventDefault();
            var url = $(this).attr('data-url');
            let formSend = new FormData($('#form-add-issue')[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: url,
                contentType: false,
                processData: false,
                data: formSend,
                success: function(response) {
                    $('#table_Theme').DataTable().destroy();
                    // $('#table_Theme').empty();
                    $('#myAddModalIssue').modal('hide')
                    let item = response.data;
                    let item2 = response.data2[0];
                    console.log(response);
                    console.log(response.data);
                    console.log(response.data2[0], 'jdkfh');
                    // console.log(item);
                    let full_date = new Date(item.date_issue.date);
                    let d = full_date.getDate();
                    let m = full_date.getMonth();
                    let y = full_date.getFullYear();
                    let mm = m < 10 ? "0" + (m + 1) : m + 1;
                    let th = `<tr id='issueTr-${ item2.id }'>
                                <td class="text-sm" id="product-${ item2.id }">
                                    ${ item2.nameProduct }
                                </td>
                                <td class="text-sm" id="admin-${ item2.id }">
                                    ${ item2.nameAdmin }
                                </td>`;
                    let td1 = `<td class="text-sm" id="warehouse-${ item2.id }">
                                    ${ item2.nameWarehouse }
                                </td>`;

                    let td2 = `
                                <td class="text-sm" id="name-customer-${ item.id }">
                                    ${ item.name_customer }
                                </td>
                                <td class="text-sm" id="email-customer-${ item.id }">
                                    ${item.email_customer  }
                                </td>
                            `;
                    let td3 = `
                                <td class="text-sm" id="quantity-${ item.id }">
                                    ${ item.quantity }
                                </td>
                                <td class="text-sm" id="date_issue-${ item.id }">
                                    ${ y + '-' + (mm) + '-' +d  }
                                </td>
                            </tr>`;


                    // let td3 = `<td class="text-sm" id="updated-${ item.id }">
                //             ${ new Date(item.updated_at).getDate() < 10 ? '0' + new Date(item.updated_at).getDate() : new Date(item.updated_at).getDate() }-${new Date(item.updated_at).getMonth() < 10 ? '0' + new Date(item.updated_at).getMonth() : new Date(item.updated_at).getMonth()}-${new Date(item.updated_at).getFullYear()} ${new Date(item.updated_at).getHours()}:${new Date(item.updated_at).getMinutes()}:${new Date(item.updated_at).getSeconds()}
                //             </td>
                //         </tr>`;
                    // let td4 = `<td class="text-right">
                //             <div class="dropdown">
                //                 <button ​type="button" data-toggle="modal"
                //                     onclick="editWh(${ item.id })"
                //                     class="btn btn-warning btn-edit">Edit</button>
                //                 <button ​type="button" data-toggle="modal" class="btn btn-danger btn-delete"
                //                     onclick="deleteWh(${ item.id })">Delete</button>
                //             </div>
                //         </td>


                console.log(response.data);
                toastr.options.positionClass = 'toast-bottom-left'
                toastr.success(response.message, 'Thành công ✨🎉✨');
                $('#myAddModalIssue').modal('toggle');
                $('#form-add-issue')[0].reset();
                $('tbody').prepend(th + td1 + td2 + td3);
                rebuild();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                toastr.options.positionClass = 'toast-bottom-left'
                toastr.error('Xuất sản phẩm thất bại', 'Thất bại 👺👹👺')
            }
        })
    })

    function deleteWh(id) {
        if (confirm('Bạn có chắc muốn xóa ?')) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "issue/" + id,
                type: 'DELETE',
                contentType: false,
                processData: false,
                success: function(res) {
                    $('#table_Theme').DataTable().destroy();
                    // $('#table_Theme').empty();
                    toastr.options.positionClass = 'toast-bottom-left'
                    toastr.success('Xoá sản phẩm thành công', 'Thành công ✨🎉✨')
                    $('#issueTr-' + res.id).remove();
                    rebuild();
                },
                error: function(res) {
                    toastr.options.positionClass = 'toast-bottom-left'
                    toastr.error('Xoá kho thất bại', 'Thất bại 👺👹👺')
                }
            });
        }
    }

    function editWh(id) {
        $.get('issue/' + id, function(e) {
            $('#id').val(id);
            $('#id_product_detail-edit').val(e.id_product_detail);
            $('#id_warehouse-edit').val(e.id_warehouse);
            $('#date_issue-edit').val(e.date_issue);
            $('#quantity-edit').val(e.quantity);
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
        let date_issue = $('#date_issue-edit').val();
        let quantity = $('#quantity-edit').val();

        if (id_product_detail !== '' && id_admin !== '' && id_warehouse !== '' &&
            date_issue !== '' && quantity !== '') {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "issue/update",
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
                    $('#date_issue-' + data.id).text(data.date_issue);
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
    @php
    echo '<script>
        var chooseWarehouseID = '.Session::get('
        warehouseChoosedId ').'
    </script>';
    @endphp

    <script>
        function checkQuantity() {

            $.get('product/product_detail/' + $('#id_product_detail').val(), function(res) {
                // $('#id_warehouse_old').val(e.id_warehouse);

                let e = res[0];
                // var flag = 0;
                var checkId = 0;
                var checkQuantity = 0;
                // let idWarehouse = $('#id_warehouse').val();
                // res[1].map(warehouseId => flag += (warehouseId.id == idWarehouse) ? 1 : 0 );
                // console.log(e.quantity,parseInt($('#quantity').val()));
                // console.log($('#id_warehouse').val(), res[1]);
                // if(flag > 0){
                //     document.getElementById('id_warehouse').style.borderColor = '#43fa38';
                //     document.getElementById('error2').innerText = '';

                if (e.id_warehouse != chooseWarehouseID) {
                    document.getElementById('id_product_detail').style.borderColor = '#fc403e';
                    document.getElementById('error2').innerText = 'Sản phẩm đang ở [kho] ' + e.id_warehouse +
                        ' không ở kho hiện tại [kho] ' + chooseWarehouseID;
                    checkId = 0;
                } else {
                    document.getElementById('id_product_detail').style.borderColor = '#43fa38';
                    document.getElementById('error2').innerText = '';
                    checkId = 1;
                }


                // }else{
                //     document.getElementById('id_warehouse').style.borderColor = '#fc403e';
                //     document.getElementById('error2').innerText = 'Kho không tồn tại!';
                //     checkId = 0;
                // }

                if (parseInt($('#quantity').val()) > e.quantity) {
                    document.getElementById('quantity').style.borderColor = '#fc403e';
                    document.getElementById('error').innerText = 'Vượt quá số lượng  ' + e.quantity +
                        ' ở trong kho!';
                    checkQuantity = 0;
                } else {
                    document.getElementById('quantity').style.borderColor = '#43fa38';
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
    </script>
@endsection
