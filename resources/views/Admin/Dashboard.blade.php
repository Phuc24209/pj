@extends('index')
@section('dashboard')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center pt-4 pb-2">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                            {{-- <li class="breadcrumb-item active" aria-current="page">Default</li> --}}
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    {{-- @php
                            ini_set('memory_limit', '-1');
                        @endphp --}}
                    {{-- <form id='formDate' method="post" class="d-flex" action="">
                            @csrf
                            <input class="h-100 w-100 px-2 py-1 rounded-sm" id="date" name="date" placeholder="DD/MM/YYY"
                                type="text" autocomplete="off" onchange="pressSubmitDate()" />
                            <button class="btn btn-sm btn-neutral h-100 px-2 py-1 opacity-0 position-absolute"
                                style="top: -10000px" type="submit" id='btnSubmitDate'>Submit</button>
                        </form> --}}
                </div>
            </div>
            <!-- Card stats -->
            {{-- {{print($bestSeller)}} --}}

            {{-- <h6 class="h2 text-white d-inline-block mb-2">
                {echo($totalIssueInYear+'?????')}
                <?php
                // echo "jdksjskfsfffffff";

                ?>
                
                </h6> --}}

            <h6 class="h2 text-white d-inline-block mb-2">
                <select class=" h3 col" style="border: 0px" onchange='getAll(this.value)' aria-label="" id='warehouse' name='warehouse'>
                    <option value='9999'>Tất cả</option>
                    @forelse ($warehouseAll as $item)
                    @if (Session::get('warehouseChoosedId') == $item->id)
                    <option value='{{ $item->id }}' selected>{{ $item->name }}</option>

                    @else
                    <option value='{{ $item->id }}'>{{ $item->name }}</option>

                    @endif
                    @empty
                    @endforelse
                </select>
            </h6>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Tổng tiền thu</h5>
                                    <span class="h2 font-weight-bold mb-0" id="thu">{{ number_format($totalIssueInYear[0]->prices??0) }} </span><span class="text-gray font-weight-600 text-sm" id="vnđ">(VNĐ)</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                        <i class="ni ni-active-40"></i>
                                    </div>
                                </div>
                            </div>
                            {{-- <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Tổng tiền chi</h5>
                                    <span class="h2 font-weight-bold mb-0" id="chi">{{ number_format($totalReceiptInYear[0]->prices??0) }} </span><span class="text-gray font-weight-600 text-sm" id="vnđ2">(VNĐ)</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                        <i class="ni ni-chart-pie-35"></i>
                                    </div>
                                </div>
                            </div>
                            {{-- <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Tổng sản phẩm xuất</h5>
                                    <span class="h2 font-weight-bold mb-0" id="xuat">{{ number_format($totalIssueInYear[0]->quantity??0) }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                        <i class="ni ni-money-coins"></i>
                                    </div>
                                </div>
                            </div>
                            {{-- <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Tổng sản phẩm nhập</h5>
                                    <span class="h2 font-weight-bold mb-0" id="nhap">{{ number_format($totalReceiptInYear[0]->quantity??0) }} <span class="text-gray font-weight-600 text-sm"></span></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                        <i class="ni ni-chart-bar-32"></i>
                                    </div>
                                </div>
                            </div>
                            {{-- <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-lg-9">
            <div class="card bg-default">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-light text-uppercase ls-1 mb-1">BĐ đường cong</h6>
                            <div class="row justify-content-between px-2">
                                <h5 class="h3 text-white mb-0">Tổng tiền trên hạng mục (VNĐ)</h5>
                                <div style="width:200px">
                                    <select class="h3 col" style="border: 0px" onchange='getDBCong(this.value)' aria-label="" id='warehouse' name='warehouse'>
                                        <option value='9999'>Tất cả</option>
                                        @forelse ($warehouseAll as $item)
                                        @if (Session::get('warehouseChoosedId') == $item->id)
                                        <option value='{{ $item->id }}' selected>{{ $item->name }}</option>

                                        @else
                                        <option value='{{ $item->id }}'>{{ $item->name }}</option>

                                        @endif
                                        @empty
                                        @endforelse
                                    </select>
                                </div>

                            </div>

                        </div>
                        {{-- <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales-dark"
                                        data-update='{
                                                    "data":{
                                                        "datasets":[{"data":[@php
                                                            foreach ($receiptInYear as $key => $value) {
                                                                echo $value->quantity . ',';
                                                            }
                                                        @endphp
                                                        0]}],
                                                        "labels":[@php
                                                            foreach ($receiptInYear as $key => $value) {
                                                                echo $value->month . ',';
                                                            }
                                                        @endphp
                                                        0]
                                                    }
                                                }' data-prefix="$" data-suffix="k">
                                        <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                            <span class="d-none d-md-block">Month</span>
                                            <span class="d-md-none">M</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales-dark"
                                        data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}'
                        data-prefix="$" data-suffix="k">
                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                            <span class="d-none d-md-block">Week</span>
                            <span class="d-md-none">W</span>
                        </a>
                        </li>
                        </ul>
                    </div> --}}
                </div>
            </div>
            <div class="card-body py-0 px-2">
                <div class="chart">
                    <canvas id="lineChart"></canvas>
                </div>
            </div>

        </div>
    </div>
    <div class='col-lg-3'>
        {{-- <div class="card">
                        <div class="card-header bg-transparent">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-uppercase text-muted ls-1 mb-1">BĐ cột</h6>
                                    <h5 class="h3 mb-0">Tổng Sản phẩm tất cả kho</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="horizontalBarAll" class="chart-canvas"></canvas>
                            </div>
                        </div>
                    </div> --}}
        <div class="card">
            <div class="card-header bg-transparent">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="text-uppercase text-muted ls-1 mb-1">BĐ cột</h6>
                        <div class="row align-content-center justify-center pl-3 pr-1">
                            <h5 class="h3 text-center" style="margin-top: 3px">Tổng Sản phẩm</h5>
                            <select class=" h3 col" style="border: 0px" onchange='getDB(this.value)' aria-label="" id='warehouse' name='warehouse'>
                                <option value='9999'>Tất cả</option>
                                @forelse ($warehouseAll as $item)
                                @if (Session::get('warehouseChoosedId') == $item->id)
                                <option value='{{ $item->id }}' selected>{{ $item->name }}</option>

                                @else
                                <option value='{{ $item->id }}'>{{ $item->name }}</option>

                                @endif
                                @empty
                                @endforelse
                            </select>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="horizontalBar" class="chart-canvas"></canvas>
                </div>
            </div>
        </div>

    </div>

</div>

</div>


<div class="row p-4">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="d-flex row justify-content-between w-100 align-items-center px-2">
                        <h3 class="mb-0">Mức độ tăng trưởng <span class="text-orange">nhập</span> hàng các tháng của năm 2020 với 2021</h3>
                        <div class="mt-2">
                            <select class="h3 col" style="border: 0px" onchange='NhapTang(this.value)' aria-label="" id='warehouse' name='warehouse'>
                                <option value='9999'>Tất cả</option>
                                @forelse ($warehouseAll as $item)
                                @if (Session::get('warehouseChoosedId') == $item->id)
                                <option value='{{ $item->id }}' selected>{{ $item->name }}</option>

                                @else
                                <option value='{{ $item->id }}'>{{ $item->name }}</option>

                                @endif
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Tháng</th>
                            <th scope="col">Năm trước</th>
                            <th scope="col">Hiện tại</th>
                            <th scope="col">Tỷ lệ tăng trưởng</th>
                        </tr>
                    </thead>
                    <tbody id='percentTableReceipt'>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="d-flex row justify-content-between w-100 align-items-center px-2">
                        <h3 class="mb-0">Mức độ tăng trưởng <span class="text-green">xuất</span> hàng các tháng của năm 2020 với 2021</h3>
                        <div class="mt-2">
                            <select class=" h3 col" style="border: 0px" onchange='XuatTang(this.value)' aria-label="" id='warehouse' name='warehouse'>
                                <option value='9999'>Tất cả</option>
                                @forelse ($warehouseAll as $item)
                                @if (Session::get('warehouseChoosedId') == $item->id)
                                <option value='{{ $item->id }}' selected>{{ $item->name }}</option>

                                @else
                                <option value='{{ $item->id }}'>{{ $item->name }}</option>

                                @endif
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Tháng</th>
                            <th scope="col">Năm trước</th>
                            <th scope="col">Hiện tại</th>
                            <th scope="col">Tỷ lệ tăng trưởng</th>
                        </tr>
                    </thead>
                    <tbody id='percentTableIssue'>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>
<div class="row p-4">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="d-flex row justify-content-between w-100 align-items-center px-2">
                        <h3 class="mb-0">Top sản phẩm bán chạy nhất tháng 12/2021</h3>
                        <div class="mt-2">
                            <select class="h3 col" style="border: 0px" onchange='bestSeller(this.value)' aria-label="" id='warehouse' name='warehouse'>
                                <option value='9999'>Tất cả</option>
                                @forelse ($warehouseAll as $item)
                                @if (Session::get('warehouseChoosedId') == $item->id)
                                <option value='{{ $item->id }}' selected>{{ $item->name }}</option>

                                @else
                                <option value='{{ $item->id }}'>{{ $item->name }}</option>

                                @endif
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>

                            <th scope="col">Name</th>
                            {{-- <th scope="col">SL trong kho</th> --}}
                            <th scope="col">Gia Sp</th>
                            <th scope="col">Tong SP ban duoc</th>
                            <th scope="col">Tong tien ban duoc</th>
                        </tr>
                    </thead>
                    <tbody id='bestSeller'>
                        @forelse ($bestSeller as $item)
                        <tr class="bestSeller">
                            <td scope="col">{{$item->name}}</td>
                            {{-- <td scope="col">{{$item->quantityStock}}</td> --}}
                            <td scope="col">{{number_format($item->priceStock)}} vnđ</td>
                            <td scope="col">{{$item->quantity}}</td>
                            <td scope="col">{{number_format($item->prices)}} vnđ</td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="d-flex row justify-content-between w-100 align-items-center px-2">
                        <h3 class="mb-0">Mức độ tăng trưởng từng tháng trong năm 2021</h3>
                        <div class="mt-2">
                            <select class=" h3 col" style="border: 0px" onchange='XuatNam(this.value)' aria-label="" id='warehouse' name='warehouse'>
                                <option value='9999'>Tất cả</option>
                                @forelse ($warehouseAll as $item)
                                @if (Session::get('warehouseChoosedId') == $item->id)
                                <option value='{{ $item->id }}' selected>{{ $item->name }}</option>

                                @else
                                <option value='{{ $item->id }}'>{{ $item->name }}</option>

                                @endif
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Tháng</th>
                            <th scope="col">Hiện tại</th>
                            <th scope="col">Tỷ lệ tăng trưởng</th>
                            <th scope="col">Lai so voi thang truoc</th>
                        </tr>
                    </thead>
                    <tbody id='percentTableMonth'>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@php

@endphp
</div>

<script type="text/javascript">
    var chart;
    var myLineChart;
    var ctxL;
    var formatter = new Intl.NumberFormat();

    function getAll(id) {
        $.get('dashboard/' + id, function(e) {

            document.getElementById('chi').innerText = formatter.format(e.totalReceiptInYear[0].prices);
            document.getElementById('thu').innerText = formatter.format(e.totalIssueInYear[0].prices);
            document.getElementById('vnđ').innerText = " (VNĐ)";
            document.getElementById('vnđ2').innerText = " (VNĐ)";
            document.getElementById('xuat').innerText = e.totalIssueInYear[0].quantity;
            document.getElementById('nhap').innerText = e.totalReceiptInYear[0].quantity;
        });
    };

    function bestSeller(id) {
        $('.bestSeller').remove();
        $.get('dashboard/bestSeller/' + id, function(e) {
            for (let i = 1; i <= 10; i++) {
                var t = `<tr class='bestSeller'>
                        <td scope="col">${e.bestSeller[i-1].name}</td>
                        <td scope="col">${formatter.format(e.bestSeller[i-1].priceStock)} vnđ</td>
                        <td scope="col">${e.bestSeller[i-1].quantity}</td>
                        <td scope="col">${formatter.format(e.bestSeller[i-1].prices)} vnđ</td>
                    </tr> `;
                $('#bestSeller').append(t);

            }

        });
    }

    function getDB(id) {
        chart.destroy();
        $.get('dashboard/' + id, function(e) {
            chart = new Chart(document.getElementById("horizontalBar"), {
                "type": "horizontalBar",
                "data": {
                    "labels": ["Xuất", "Nhập", "Chuyển"],
                    "datasets": [{
                        "label": "",
                        "data": [e.totalIssueInYear[0].quantity, e.totalReceiptInYear[0].quantity, e.totalWarehouse_transferInYear[0].quantity],
                        "fill": false,
                        "backgroundColor": ['#00e7ff66', '#fff70059', '#10ff0063'],
                        "borderColor": ['#00fff3', '#ffee76', '#27ff00'],
                        "borderWidth": 1
                    }]
                },
                "options": {
                    "scales": {
                        "xAxes": [{
                            "ticks": {
                                "beginAtZero": true
                            }
                        }]
                    }
                }
            });
        });
    }

    function getDBCong(id) {
        myLineChart.destroy();
        console.log(id);
        $.get('dashboard/BDCong/' + id, function(e) {
            console.log(e);
            var receiptInYear = e.receiptInYear;
            var issueInYear = e.issueInYear;

            let receiptInYearJson = [];
            let issueInYearJson = [];
            for (let index = 1; index <= 12; index++) {
                let count = 0;
                receiptInYear.forEach(element => {
                    if (parseInt(element.month) == index) {
                        count++;
                        receiptInYearJson.push(parseInt(element.prices));
                    }
                });
                if (count == 0) {
                    receiptInYearJson.push(0);
                }
            }
            for (let index = 1; index <= 12; index++) {
                let count = 0;
                issueInYear.forEach(element => {
                    if (parseInt(element.month) == index) {
                        count++;
                        issueInYearJson.push(parseInt(element.prices));
                    }
                });
                if (count == 0) {
                    issueInYearJson.push(0);
                }
            }

            console.log(receiptInYear);
            ctxL = document.getElementById("lineChart").getContext('2d');
            myLineChart = new Chart(ctxL, {
                type: 'line',
                data: {
                    labels: ["T1", "T2", "T3", "T4", "T5", "T6", "T7", "T8", "T9", "T10",
                        "T11", "T12"
                    ],
                    datasets: [{
                            label: "Xuất",
                            data: issueInYearJson,
                            backgroundColor: [
                                '#00e7ff66',
                            ],
                            borderColor: [
                                '#00fff3',
                            ],
                            borderWidth: 2
                        },
                        {
                            label: "Nhập",
                            data: receiptInYearJson,
                            backgroundColor: [
                                '#fff70059',
                            ],
                            borderColor: [
                                '#ffee76',
                            ],
                            borderWidth: 2
                        },
                        // {
                        //     label: "Chuyển",
                        //     data: warehouse_transferInYearJson,
                        //     backgroundColor: [
                        //         '#10ff0063',
                        //     ],
                        //     borderColor: [
                        //         '#27ff00',
                        //     ],
                        //     borderWidth: 2
                        // }
                    ]
                },
                options: {
                    responsive: true
                }
            });
        })
    };

    var receiptInYear_old = '<?php echo $receiptInYear_old; ?>';
    let receiptInYearJson_old = [];

    var issueInYear_old = '<?php echo $issueInYear_old; ?>';
    let issueInYearJson_old = [];

    var warehouse_transferInYear_old = '<?php echo $warehouse_transferInYear_old; ?>';
    let warehouse_transferInYearJson_old = [];


    for (let index = 1; index <= 12; index++) {
        let count = 0;
        if (receiptInYear_old !== '0') {

            JSON.parse(receiptInYear_old).forEach(element => {
                if (parseInt(element.month) == index) {
                    count++;
                    receiptInYearJson_old.push(parseInt(element.prices));
                }
            });
            if (count == 0) {
                receiptInYearJson_old.push(0);
            }
        } else {
            receiptInYearJson_old.push(0);
        }
    }
    for (let index = 1; index <= 12; index++) {
        let count = 0;
        if (issueInYear_old !== '0') {
            JSON.parse(issueInYear_old).forEach(element => {
                if (parseInt(element.month) == index) {
                    count++;
                    issueInYearJson_old.push(parseInt(element.prices));
                }
            });
            if (count == 0) {
                issueInYearJson_old.push(0);
            }
        } else {
            issueInYearJson_old.push(0);
        }
    }

    var totalReceiptInYear_old = '<?php echo $totalReceiptInYear_old; ?>';
    var totalIssueInInYear_old = '<?php echo $totalIssueInYear_old; ?>';
    var totalwarehouse_transferInYear_old = '<?php echo $totalWarehouse_transferInYear_old; ?>';


    var receiptInYear = '<?php echo $receiptInYear; ?>';
    console.log('111111', receiptInYear);
    let receiptInYearJson = [];

    var issueInYear = '<?php echo $issueInYear; ?>';
    let issueInYearJson = [];

    var warehouse_transferInYear = '<?php echo $warehouse_transferInYear; ?>';
    let warehouse_transferInYearJson = [];

    for (let index = 1; index <= 12; index++) {
        let count = 0;
        JSON.parse(receiptInYear).forEach(element => {
            if (parseInt(element.month) == index) {
                count++;
                receiptInYearJson.push(parseInt(element.prices));
            }
        });
        if (count == 0) {
            receiptInYearJson.push(0);
        }
    }
    for (let index = 1; index <= 12; index++) {
        let count = 0;
        JSON.parse(issueInYear).forEach(element => {
            if (parseInt(element.month) == index) {
                count++;
                issueInYearJson.push(parseInt(element.prices));
            }
        });
        if (count == 0) {
            issueInYearJson.push(0);
        }
    }

    var totalReceiptInYear = '<?php echo $totalReceiptInYear; ?>';
    var totalIssueInInYear = '<?php echo $totalIssueInYear; ?>';
    var totalwarehouse_transferInYear = '<?php echo $totalwarehouse_transferInYear; ?>';

    var totalReceiptInYearAll = '<?php echo $totalReceiptInYearAll; ?>';
    var totalIssueInInYearAll = '<?php echo $totalIssueInYearAll; ?>';
    var totalwarehouse_transferInYearAll = '<?php echo $wareHouseAll; ?>';
    // console.log(totalReceiptInYear);
    // console.log(issueInYearJson);
    var totalReceiptPercent = [];
    var totalIssuePercent = [];
    for (let index = 1; index <= 12; index++) {
        var tmp = 0;
        var tmp2 = 0;
        if (receiptInYearJson_old[index - 1] !== 0 && receiptInYearJson[index - 1] !== 0) {
            tmp = (receiptInYearJson[index - 1] / (receiptInYearJson_old[index - 1] + receiptInYearJson[index - 1]) *
                100);

        } else if (receiptInYearJson_old[index - 1] !== 0 && receiptInYearJson[index - 1] == 0) {
            tmp = (receiptInYearJson[index - 1] / (receiptInYearJson_old[index - 1] + receiptInYearJson[index - 1]) *
                100);

        } else if (receiptInYearJson_old[index - 1] == 0 && receiptInYearJson[index - 1] !== 0) {
            tmp = (receiptInYearJson[index - 1] / (receiptInYearJson_old[index - 1] + receiptInYearJson[index - 1]) *
                100);

        } else {
            tmp = 0;
        };


        if (issueInYearJson_old[index - 1] !== 0 && issueInYearJson[index - 1] !== 0) {
            tmp2 = (issueInYearJson[index - 1] / (issueInYearJson_old[index - 1] + issueInYearJson[index - 1]) * 100);
        } else if (issueInYearJson_old[index - 1] !== 0 && issueInYearJson[index - 1] == 0) {
            tmp2 = (issueInYearJson[index - 1] / (issueInYearJson_old[index - 1] + issueInYearJson[index - 1]) * 100);

        } else if (issueInYearJson_old[index - 1] == 0 && issueInYearJson[index - 1] !== 0) {
            tmp2 = (issueInYearJson[index - 1] / (issueInYearJson_old[index - 1] + issueInYearJson[index - 1]) * 100);
        } else {
            tmp2 = 0;
        };

        if (receiptInYearJson_old[index - 1] < receiptInYearJson[index - 1]) {
            totalReceiptPercent.push(tmp);
        } else if (tmp == 0) {
            totalReceiptPercent.push(tmp);
        } else {
            totalReceiptPercent.push(-tmp);
        };
        if (issueInYearJson_old[index - 1] < issueInYearJson[index - 1]) {
            totalIssuePercent.push(tmp2);
        } else if (tmp2 == 0) {
            totalIssuePercent.push(tmp2);
        } else {
            totalIssuePercent.push(-tmp2);
        };
    }


    for (let i = 1; i <= 12; i++) {
        var t = `<tr class='percentTableReceipt'>
                        <th scope="row">
                            Tháng ${i}
                        </th>
                        <td>
                            ${formatter.format(receiptInYearJson_old[i-1])} (vnđ)
                        </td>
                        <td>
                            ${formatter.format(receiptInYearJson[i-1])} (vnđ)
                        </td>
                        <td>
                            <i class="fas ${totalReceiptPercent[i-1] > 0 ? 'fa-arrow-up text-success' : 'fa-arrow-down text-warning '} mr-3"></i> ${totalReceiptPercent[i-1]}%
                        </td>
                    </tr>`;
        $('#percentTableReceipt').append(t);

        var t2 = `<tr class='percentTableIssue'>
                        <th scope="row">
                            Tháng ${i}
                        </th>
                        <td>
                            ${formatter.format(issueInYearJson_old[i-1])} (vnđ)
                        </td>
                        <td>
                            ${formatter.format(issueInYearJson[i-1])} (vnđ)
                        </td>
                        <td>
                            <i class="fas ${totalIssuePercent[i-1] > 0 ? 'fa-arrow-up text-success' : 'fa-arrow-down text-warning '} mr-3"></i> ${totalIssuePercent[i-1]}%
                        </td>
                    </tr>`;
        $('#percentTableIssue').append(t2);

        var t3 = `<tr class='percentTableMonth'>
                        <th scope="row">
                            Tháng ${i}
                        </th>
                        <td>
                            ${formatter.format(issueInYearJson[i-1])} (vnđ)
                        </td>
                        <td>
                            <i class="fas ${(issueInYearJson[i-1] - issueInYearJson[i-2]) > 0 ? 'fa-arrow-up text-success' : 'fa-arrow-down text-warning '} mr-3"></i>
                            ${(issueInYearJson[i - 1] - issueInYearJson[i - 2] !== -issueInYearJson[i - 2] && -issueInYearJson[i - 2] !== 0 && -issueInYearJson[i - 1] !== 0 )
                            ? isNaN(issueInYearJson[i - 1] / (issueInYearJson[i - 1] + issueInYearJson[i - 2]) * 100)
                            ? 0
                            : (issueInYearJson[i - 1] / (issueInYearJson[i - 1] + issueInYearJson[i - 2]) * 100)
                            : ((-issueInYearJson[i - 2] === 0 && -issueInYearJson[i - 1] === 0) || isNaN(-issueInYearJson[i - 2])) ? 0 : 100} %
                        </td>
                        <td>
                            <i class="fas ${(issueInYearJson[i-1] - issueInYearJson[i-2]) > 0 ? 'fa-arrow-up text-success' : 'fa-arrow-down text-warning '} mr-3"></i> ${isNaN((issueInYearJson[i-1] - issueInYearJson[i-2])) ? 0 : formatter.format((issueInYearJson[i-1] - issueInYearJson[i-2])) } vnđ
                        </td>
                    </tr>`;
        $('#percentTableMonth').append(t3);
    }

    function NhapTang(id) {
        $('.percentTableReceipt').remove();
        receiptInYearJson = [];
        receiptInYearJson_old = [];
        totalReceiptPercent = [];
        $.get('dashboard/getNhap/' + id, function(e) {
            for (let index = 1; index <= 12; index++) {
                let count = 0;
                if (e.receiptInYear_old !== '0') {

                    e.receiptInYear_old.forEach(element => {
                        if (parseInt(element.month) == index) {
                            count++;
                            receiptInYearJson_old.push(parseInt(element.prices));
                        }
                    });
                    if (count == 0) {
                        receiptInYearJson_old.push(0);
                    }
                } else {
                    receiptInYearJson_old.push(0);
                }
            }

            for (let index = 1; index <= 12; index++) {
                let count = 0;
                e.receiptInYear.forEach(element => {
                    if (parseInt(element.month) == index) {
                        count++;
                        receiptInYearJson.push(parseInt(element.prices));
                    }
                });
                if (count == 0) {
                    receiptInYearJson.push(0);
                }
            }

            for (let index = 1; index <= 12; index++) {
                var tmp = 0;
                var tmp2 = 0;
                if (receiptInYearJson_old[index - 1] !== 0 && receiptInYearJson[index - 1] !== 0) {
                    tmp = (receiptInYearJson[index - 1] / (receiptInYearJson_old[index - 1] + receiptInYearJson[index - 1]) *
                        100);

                } else if (receiptInYearJson_old[index - 1] !== 0 && receiptInYearJson[index - 1] == 0) {
                    tmp = (receiptInYearJson[index - 1] / (receiptInYearJson_old[index - 1] + receiptInYearJson[index - 1]) *
                        100);

                } else if (receiptInYearJson_old[index - 1] == 0 && receiptInYearJson[index - 1] !== 0) {
                    tmp = (receiptInYearJson[index - 1] / (receiptInYearJson_old[index - 1] + receiptInYearJson[index - 1]) *
                        100);

                } else {
                    tmp = 0;
                };

                if (receiptInYearJson_old[index - 1] < receiptInYearJson[index - 1]) {
                    totalReceiptPercent.push(tmp);
                } else if (tmp == 0) {
                    totalReceiptPercent.push(tmp);
                } else {
                    totalReceiptPercent.push(-tmp);
                };
            }

            for (let i = 1; i <= 12; i++) {
                var t = `<tr class='percentTableReceipt'>
                        <th scope="row">
                            Tháng ${i}
                        </th>
                        <td>
                            ${formatter.format(receiptInYearJson_old[i-1])} (vnđ)
                        </td>
                        <td>
                            ${formatter.format(receiptInYearJson[i-1])} (vnđ)
                        </td>
                        <td>
                            <i class="fas ${totalReceiptPercent[i-1] > 0 ? 'fa-arrow-up text-success' : 'fa-arrow-down text-warning '} mr-3"></i> ${totalReceiptPercent[i-1]}%
                        </td>
                    </tr>`;
                $('#percentTableReceipt').append(t);

            }
        });
    };

    function XuatTang(id) {
        $('.percentTableIssue').remove();
        issueInYearJson = [];
        issueInYearJson_old = [];
        totalIssuePercent = [];
        $.get('dashboard/getNhap/' + id, function(e) {
            console.log(e);
            for (let index = 1; index <= 12; index++) {
                let count = 0;
                if (e.issueInYear_old !== '0') {
                    e.issueInYear_old.forEach(element => {
                        if (parseInt(element.month) == index) {
                            count++;
                            issueInYearJson_old.push(parseInt(element.prices));
                        }
                    });
                    if (count == 0) {
                        issueInYearJson_old.push(0);
                    }
                } else {
                    issueInYearJson_old.push(0);
                }
            }
            for (let index = 1; index <= 12; index++) {
                let count = 0;
                e.issueInYear.forEach(element => {
                    if (parseInt(element.month) == index) {
                        count++;
                        issueInYearJson.push(parseInt(element.prices));
                    }
                });
                if (count == 0) {
                    issueInYearJson.push(0);
                }
            }
            for (let index = 1; index <= 12; index++) {
                var tmp = 0;
                var tmp2 = 0;
                if (issueInYearJson_old[index - 1] !== 0 && issueInYearJson[index - 1] !== 0) {
                    tmp2 = (issueInYearJson[index - 1] / (issueInYearJson_old[index - 1] + issueInYearJson[index - 1]) * 100);
                } else if (issueInYearJson_old[index - 1] !== 0 && issueInYearJson[index - 1] == 0) {
                    tmp2 = (issueInYearJson[index - 1] / (issueInYearJson_old[index - 1] + issueInYearJson[index - 1]) * 100);

                } else if (issueInYearJson_old[index - 1] == 0 && issueInYearJson[index - 1] !== 0) {
                    tmp2 = (issueInYearJson[index - 1] / (issueInYearJson_old[index - 1] + issueInYearJson[index - 1]) * 100);
                } else {
                    tmp2 = 0;
                };

                if (issueInYearJson_old[index - 1] < issueInYearJson[index - 1]) {
                    totalIssuePercent.push(tmp2);
                } else if (tmp2 == 0) {
                    totalIssuePercent.push(tmp2);
                } else {
                    totalIssuePercent.push(-tmp2);
                };
            }

            for (let i = 1; i <= 12; i++) {
                var t2 = `<tr class='percentTableIssue'>
                        <th scope="row">
                            Tháng ${i}
                        </th>
                        <td>
                            ${formatter.format(issueInYearJson_old[i-1])} (vnđ)
                        </td>
                        <td>
                            ${formatter.format(issueInYearJson[i-1])} (vnđ)
                        </td>
                        <td>
                            <i class="fas ${totalIssuePercent[i-1] > 0 ? 'fa-arrow-up text-success' : 'fa-arrow-down text-warning '} mr-3"></i> ${totalIssuePercent[i-1]}%
                        </td>
                    </tr>`;
                $('#percentTableIssue').append(t2);
            }
        });
    };

    function XuatNam(id) {
        $('.percentTableMonth').remove();
        issueInYearJson = [];
        totalIssuePercent = [];
        $.get('dashboard/getNhap/' + id, function(e) {

            for (let index = 1; index <= 12; index++) {
                let count = 0;
                e.issueInYear.forEach(element => {
                    if (parseInt(element.month) == index) {
                        count++;
                        issueInYearJson.push(parseInt(element.prices));
                    }
                });
                if (count == 0) {
                    issueInYearJson.push(0);
                }
            }
            for (let index = 1; index <= 12; index++) {
                var tmp = 0;
                var tmp2 = 0;
                if (issueInYearJson_old[index - 1] !== 0 && issueInYearJson[index - 1] !== 0) {
                    tmp2 = (issueInYearJson[index - 1] / (issueInYearJson_old[index - 1] + issueInYearJson[index - 1]) * 100);
                } else if (issueInYearJson_old[index - 1] !== 0 && issueInYearJson[index - 1] == 0) {
                    tmp2 = (issueInYearJson[index - 1] / (issueInYearJson_old[index - 1] + issueInYearJson[index - 1]) * 100);

                } else if (issueInYearJson_old[index - 1] == 0 && issueInYearJson[index - 1] !== 0) {
                    tmp2 = (issueInYearJson[index - 1] / (issueInYearJson_old[index - 1] + issueInYearJson[index - 1]) * 100);
                } else {
                    tmp2 = 0;
                };


            }

            for (let i = 1; i <= 12; i++) {
                var t3 = `<tr class='percentTableMonth'>
                        <th scope="row">
                            Tháng ${i}
                        </th>
                        <td>
                            ${formatter.format(issueInYearJson[i-1])} (vnđ)
                        </td>
                        <td>
                            <i class="fas ${(issueInYearJson[i-1] - issueInYearJson[i-2]) > 0 ? 'fa-arrow-up text-success' : 'fa-arrow-down text-warning '} mr-3"></i>
                            ${(issueInYearJson[i - 1] - issueInYearJson[i - 2] !== -issueInYearJson[i - 2] && -issueInYearJson[i - 2] !== 0 && -issueInYearJson[i - 1] !== 0 )
                            ? isNaN(issueInYearJson[i - 1] / (issueInYearJson[i - 1] + issueInYearJson[i - 2]) * 100)
                            ? 0
                            : (issueInYearJson[i - 1] / (issueInYearJson[i - 1] + issueInYearJson[i - 2]) * 100)
                            : ((-issueInYearJson[i - 2] === 0 && -issueInYearJson[i - 1] === 0) || isNaN(-issueInYearJson[i - 2])) ? 0 : 100} %
                        </td>
                        <td>
                            <i class="fas ${(issueInYearJson[i-1] - issueInYearJson[i-2]) > 0 ? 'fa-arrow-up text-success' : 'fa-arrow-down text-warning '} mr-3"></i> ${isNaN((issueInYearJson[i-1] - issueInYearJson[i-2])) ? 0 : formatter.format((issueInYearJson[i-1] - issueInYearJson[i-2])) } vnđ
                        </td>
                    </tr>`;
                $('#percentTableMonth').append(t3);
            }
        });
    };
    $(document).ready(function() {
        var date_input = $('input[name="date"]'); //our date input has the name "date"
        var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
        var options = {
            format: 'dd/mm/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);
        chart();
    })

    // function pressSubmitDate() {
    //     $('#btnSubmitDate').click();
    // }
    // $('#formDate').submit(function(e) {
    //     e.preventDefault();
    //     var url = $(this).attr('data-url');
    //     let formSend = new FormData($('#formDate')[0]);
    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         type: 'post',
    //         url: url,
    //         contentType: false,
    //         processData: false,
    //         data: formSend,
    //         success: function(response) {
    //             // let item = response.message;
    //             chart();
    //             // console.log(item);
    //         },
    //         error: function(jqXHR, textStatus, errorThrown) {}
    //     })
    // })

    // console.log(receiptInYear);

    function chart() {
        ctxL = document.getElementById("lineChart").getContext('2d');
        myLineChart = new Chart(ctxL, {
            type: 'line',
            data: {
                labels: ["T1", "T2", "T3", "T4", "T5", "T6", "T7", "T8", "T9", "T10",
                    "T11", "T12"
                ],
                datasets: [{
                        label: "Xuất",
                        data: issueInYearJson,
                        backgroundColor: [
                            '#00e7ff66',
                        ],
                        borderColor: [
                            '#00fff3',
                        ],
                        borderWidth: 2
                    },
                    {
                        label: "Nhập",
                        data: receiptInYearJson,
                        backgroundColor: [
                            '#fff70059',
                        ],
                        borderColor: [
                            '#ffee76',
                        ],
                        borderWidth: 2
                    },
                    // {
                    //     label: "Chuyển",
                    //     data: warehouse_transferInYearJson,
                    //     backgroundColor: [
                    //         '#10ff0063',
                    //     ],
                    //     borderColor: [
                    //         '#27ff00',
                    //     ],
                    //     borderWidth: 2
                    // }
                ]
            },
            options: {
                responsive: true
            }
        });

        chart = new Chart(document.getElementById("horizontalBar"), {
            "type": "horizontalBar",
            "data": {
                "labels": ["Xuất", "Nhập", "Chuyển"],
                "datasets": [{
                    "label": "",
                    "data": [JSON.parse(totalIssueInInYear)[0].quantity, JSON.parse(totalReceiptInYear)[
                            0]
                        .quantity, JSON.parse(totalwarehouse_transferInYear)[0].quantity
                    ],
                    "fill": false,
                    "backgroundColor": ['#00e7ff66', '#fff70059', '#10ff0063'],
                    "borderColor": ['#00fff3', '#ffee76', '#27ff00'],
                    "borderWidth": 1
                }]
            },
            "options": {
                "scales": {
                    "xAxes": [{
                        "ticks": {
                            "beginAtZero": true
                        }
                    }]
                }
            }
        });
        new Chart(document.getElementById("horizontalBarAll"), {
            "type": "horizontalBar",
            "data": {
                "labels": ["Xuất", "Nhập", "Chuyển"],
                "datasets": [{
                    "label": "",
                    "data": [JSON.parse(totalIssueInInYearAll)[0].quantity, JSON.parse(totalReceiptInYearAll)[
                            0]
                        .quantity, JSON.parse(totalwarehouse_transferInYearAll)[0].quantity
                    ],
                    "fill": false,
                    "backgroundColor": ['#00e7ff66', '#fff70059', '#10ff0063'],
                    "borderColor": ['#00fff3', '#ffee76', '#27ff00'],
                    "borderWidth": 1
                }]
            },
            "options": {
                "scales": {
                    "xAxes": [{
                        "ticks": {
                            "beginAtZero": true
                        }
                    }]
                }
            }
        });
    }

    // chart();
</script>
@endsection