<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Welcome</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/brand/gtlLogo3.png') }}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('css/argon.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    {{-- <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" > --}}
</head>

<body>
    <!-- START Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header  align-items-center">
                <a class="navbar-brand" href="javascript:void(0)">
                    <!-- <img src="/img/brand/blue.png" class="navbar-brand-img" alt="..."> -->
                </a>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('/admin/dashboard') }}">
                                <i class="ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('/admin/account') }}">
                                <i class="ni ni-single-02 text-primary"></i>
                                <span class="nav-link-text">Quản lí tài khoản</span>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('/admin/icons') }}">
                        <i class="ni ni-planet text-orange"></i>
                        <span class="nav-link-text">Icons</span>
                        </a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('/admin/product') }}">
                        <i class="ni ni-bullet-list-67 text-green fa-w-10"></i>
                        <span class="nav-link-text fa-w-90">Sản phẩm</span>
                        </a>
                        </li> --}}
                        <li class="nav-item">
                            <div class="nav-link d-flex justify-content-between" id='sanpham' onclick="activeDropDownsanpham()">
                                <span>
                                    <i class="ni ni-archive-2 text-blue" style="min-width: 2rem; font-size: 16px"></i>
                                    <span class="nav-link-text">Sản phẩm</span>
                                </span>
                                <i class="ni ni-bold-right text-default" style="min-width: fit-content; transition: 0.3s" id='bold-right-sanpham'></i>
                            </div>
                            <ul class="navbar-nav ml-2 mr-2 rounded-bottom mt--1 d-none" id='nav-child-Menu-sanpham' style="background-color: #c7e3ff; transition: 0.3s">
                                <li class="nav-item nav-child-sanpham mx-2 mt-2 mb-1 px-3 py-2 d-flex flex-row justify-content-start align-items-center rounded-sm">
                                    <a class='link-nav-child w-100' href="{{ URL::to('admin/product/attribute/color') }}">
                                        <i class="ni ni-tv-2 mr-2 text-sm"></i>
                                        <span class="text-sm">Màu</span>
                                    </a>
                                </li>
                                <li class="nav-item nav-child-sanpham mx-2 mb-1 px-3 py-2 d-flex flex-row justify-content-start align-items-center rounded-sm">
                                    <a class='link-nav-child w-100' href="{{ URL::to('admin/product/attribute/size') }}">
                                        <i class="ni ni-tv-2 mr-2 text-sm"></i>
                                        <span class="text-sm">Size</span>
                                    </a>
                                </li>
                                <li class="nav-item nav-child-sanpham mx-2 mb-1 px-3 py-2 d-flex flex-row justify-content-start align-items-center rounded-sm">
                                    <a class='link-nav-child w-100' href="{{ URL::to('admin/product/attribute/brand') }}">
                                        <i class="ni ni-tv-2 mr-2 text-sm"></i>
                                        <span class="text-sm">Nhãn hàng</span>
                                    </a>
                                </li>
                                <li class="nav-item nav-child-sanpham mx-2 mb-1 px-3 py-2 d-flex flex-row justify-content-start align-items-center rounded-sm">
                                    <a class='link-nav-child w-100' href="{{ URL::to('admin/product/attribute/type') }}">
                                        <i class="ni ni-tv-2 mr-2 text-sm"></i>
                                        <span class="text-sm">Loại sản phẩm</span>
                                    </a>
                                </li>
                                <li class="nav-item nav-child-sanpham mx-2 mb-1 px-3 py-2 d-flex flex-row justify-content-start align-items-center rounded-sm">
                                    <a class='link-nav-child w-100' href="{{ URL::to('admin/product') }}">
                                        <i class="ni ni-tv-2 mr-2 text-sm"></i>
                                        <span class="text-sm">Sản phẩm</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <div class="nav-link d-flex justify-content-between" id='phieuxuatkho' onclick="activeDropDownPhieu()">
                                <span>
                                    <i class="ni ni-archive-2 text-blue" style="min-width: 2rem; font-size: 16px"></i>
                                    <span class="nav-link-text">Phiếu</span>
                                </span>
                                <i class="ni ni-bold-right text-default" style="min-width: fit-content; transition: 0.3s" id='bold-right-phieu'></i>
                            </div>
                            <ul class="navbar-nav ml-2 mr-2 rounded-bottom mt--1 d-none" id='nav-child-Menu-Phieu' style="background-color: #c7e3ff; transition: 0.3s">
                                {{-- <li
                                    class="nav-item nav-child-phieu mx-2 mt-2 mb-1 px-3 py-2 d-flex flex-row justify-content-start align-items-center rounded-sm">
                                    <a class='link-nav-child w-100' href="{{ URL::to('#') }}">
                                <i class="ni ni-tv-2 mr-2 text-sm"></i>
                                <span class="text-sm">Tất cả</span>
                                </a>
                        </li> --}}
                        <li class="nav-item nav-child-phieu mx-2 mb-1 px-3 py-2 d-flex flex-row justify-content-start align-items-center rounded-sm">
                            <a class='link-nav-child w-100' href="{{ URL::to('admin/receipt') }}">
                                <i class="ni ni-tv-2 mr-2 text-sm"></i>
                                <span class="text-sm">Nhập kho</span>
                            </a>
                        </li>
                        <li class="nav-item nav-child-phieu mx-2 mb-1 px-3 py-2 d-flex flex-row justify-content-start align-items-center rounded-sm">
                            <a class='link-nav-child w-100' href="{{ URL::to('admin/issue') }}">
                                <i class="ni ni-tv-2 mr-2 text-sm"></i>
                                <span class="text-sm">Xuất kho</span>
                            </a>
                        </li>
                        <li class="nav-item nav-child-phieu mx-2 mb-1 px-3 py-2 d-flex flex-row justify-content-start align-items-center rounded-sm">
                            <a class='link-nav-child w-100' href="{{ URL::to('admin/transfer') }}">
                                <i class="ni ni-tv-2 mr-2 text-sm"></i>
                                <span class="text-sm">Chuyển kho</span>
                            </a>
                        </li>
                        <li class="nav-item nav-child-phieu mx-2 mb-1 px-3 py-2 d-flex flex-row justify-content-start align-items-center rounded-sm">
                            <a class='link-nav-child w-100' href="{{ URL::to('admin/supplier') }}">
                                <i class="ni ni-tv-2 mr-2 text-sm"></i>
                                <span class="text-sm">Nhà cung cấp</span>
                            </a>
                        </li>
                    </ul>
                    </li>

                    <li class="nav-item">
                        <div class="nav-link d-flex justify-content-between" id='khohang' onclick="activeDropDownKho()">
                            <span>
                                <i class="ni ni-archive-2 text-blue" style="min-width: 2rem; font-size: 16px"></i>
                                <span class="nav-link-text">Kho Hàng</span>
                            </span>
                            <i class="ni ni-bold-right text-default" style="min-width: fit-content; transition: 0.3s" id='bold-right-kho'></i>
                        </div>
                        <ul class="navbar-nav ml-2 mr-2 rounded-bottom mt--1 d-none" id='nav-child-Menu-kho' style="background-color: #c7e3ff; transition: 0.3s">
                            <li class="nav-item nav-child-kho mx-2 mt-2 mb-1 px-3 py-2 d-flex flex-row justify-content-start align-items-center rounded-sm">
                                <a class='link-nav-child w-100' href="{{ URL::to('admin/warehouse') }}">
                                    <i class="ni ni-tv-2 mr-2 text-sm"></i>
                                    <span class="text-sm">Dánh sách</span>
                                </a>
                            </li>
                            {{-- <li
                                    class="nav-item nav-child-kho mx-2 mb-1 px-3 py-2 d-flex flex-row justify-content-start align-items-center rounded-sm">
                                    <a class='link-nav-child w-100' href="{{ URL::to('#') }}">
                            <i class="ni ni-tv-2 mr-2 text-sm"></i>
                            <span class="text-sm">Nhập kho</span>
                            </a>
                    </li> --}}
                    {{-- <li
                                    class="nav-item nav-child-kho mx-2 mb-1 px-3 py-2 d-flex flex-row justify-content-start align-items-center rounded-sm">
                                    <a class='link-nav-child w-100' href="{{ URL::to('#') }}">
                    <i class="ni ni-tv-2 mr-2 text-sm"></i>
                    <span class="text-sm">Xuất kho</span>
                    </a>
                    </li>
                    <li class="nav-item nav-child-kho mx-2 mb-1 px-3 py-2 d-flex flex-row justify-content-start align-items-center rounded-sm">
                        <a class='link-nav-child w-100' href="{{ URL::to('#') }}">
                            <i class="ni ni-tv-2 mr-2 text-sm"></i>
                            <span class="text-sm">Chuyển kho</span>
                        </a>
                    </li> --}}
                    </ul>
                    </li>


                    {{-- <li class="nav-item">
                            <a class="nav-link">
                                <i class="ni ni-pin-3 text-primary"></i>
                                <span class="nav-link-text">Google</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="examples/profile.html">
                                <i class="ni ni-single-02 text-yellow"></i>
                                <span class="nav-link-text">Profile</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="examples/login.html">
                                <i class="ni ni-key-25 text-info"></i>
                                <span class="nav-link-text">Login</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="examples/register.html">
                                <i class="ni ni-circle-08 text-pink"></i>
                                <span class="nav-link-text">Register</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="examples/upgrade.html">
                                <i class="ni ni-send text-dark"></i>
                                <span class="nav-link-text">Upgrade</span>
                            </a>
                        </li> --}}
                    </ul>
                    <script src="/js/leftBarChoosed.js"></script>
                    <!-- Divider -->
                    <hr class="my-3">
                    <!-- Heading -->
                    {{-- <h6 class="navbar-heading p-0 text-muted">
                        <span class="docs-normal">Documentation</span>
                    </h6>
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-md-3">
                        <li class="nav-item">
                            <a class="nav-link"
                                href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html"
                                target="_blank">
                                <i class="ni ni-spaceship"></i>
                                <span class="nav-link-text">Getting started</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html"
                                target="_blank">
                                <i class="ni ni-palette"></i>
                                <span class="nav-link-text">Foundation</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html"
                                target="_blank">
                                <i class="ni ni-ui-04"></i>
                                <span class="nav-link-text">Components</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="https://demos.creative-tim.com/argon-dashboard/docs/plugins/charts.html"
                                target="_blank">
                                <i class="ni ni-chart-pie-35"></i>
                                <span class="nav-link-text">Plugins</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active active-pro" href="examples/upgrade.html">
                                <i class="ni ni-send text-dark"></i>
                                <span class="nav-link-text">Upgrade to PRO</span>
                            </a>
                        </li>
                    </ul> --}}
                </div>
            </div>
        </div>
    </nav>
    <!-- END Sidenav -->

    <div class="main-content position-relative" style="min-height: 100vh" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Search form -->
                    <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input class="form-control" placeholder="Search" type="text">
                            </div>
                        </div>
                        <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </form>
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center  ml-md-auto ">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item d-sm-none">
                            <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                                <i class="ni ni-zoom-split-in"></i>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#">
                                <i class="ni ni-bell-55"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right">
                                <!-- Dropdown header -->
                                <div class="px-3 py-3">
                                    <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong>
                                        notifications.</h6>
                                </div>
                                <!-- List group -->
                                <div class="list-group list-group-flush">
                                    <a href="#!" class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <img alt="Image placeholder" src="/img/theme/team-1.jpg" class="avatar rounded-circle">
                                            </div>
                                            <div class="col ml--2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="mb-0 text-sm">John Snow</h4>
                                                    </div>
                                                    <div class="text-right text-muted">
                                                        <small>2 hrs ago</small>
                                                    </div>
                                                </div>
                                                <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#!" class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <img alt="Image placeholder" src="/img/theme/team-2.jpg" class="avatar rounded-circle">
                                            </div>
                                            <div class="col ml--2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="mb-0 text-sm">John Snow</h4>
                                                    </div>
                                                    <div class="text-right text-muted">
                                                        <small>3 hrs ago</small>
                                                    </div>
                                                </div>
                                                <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#!" class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <img alt="Image placeholder" src="/img/theme/team-3.jpg" class="avatar rounded-circle">
                                            </div>
                                            <div class="col ml--2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="mb-0 text-sm">John Snow</h4>
                                                    </div>
                                                    <div class="text-right text-muted">
                                                        <small>5 hrs ago</small>
                                                    </div>
                                                </div>
                                                <p class="text-sm mb-0">Your posts have been liked a lot.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#!" class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <img alt="Image placeholder" src="/img/theme/team-4.jpg" class="avatar rounded-circle">
                                            </div>
                                            <div class="col ml--2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="mb-0 text-sm">John Snow</h4>
                                                    </div>
                                                    <div class="text-right text-muted">
                                                        <small>2 hrs ago</small>
                                                    </div>
                                                </div>
                                                <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#!" class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <img alt="Image placeholder" src="/img/theme/team-5.jpg" class="avatar rounded-circle">
                                            </div>
                                            <div class="col ml--2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="mb-0 text-sm">John Snow</h4>
                                                    </div>
                                                    <div class="text-right text-muted">
                                                        <small>3 hrs ago</small>
                                                    </div>
                                                </div>
                                                <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!-- View all -->
                                <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View
                                    all</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ni ni-ungroup"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
                                <div class="row shortcuts px-4">
                                    <a href="#!" class="col-4 shortcut-item">
                                        <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                                            <i class="ni ni-calendar-grid-58"></i>
                                        </span>
                                        <small>Calendar</small>
                                    </a>
                                    <a href="#!" class="col-4 shortcut-item">
                                        <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                                            <i class="ni ni-email-83"></i>
                                        </span>
                                        <small>Email</small>
                                    </a>
                                    <a href="#!" class="col-4 shortcut-item">
                                        <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                                            <i class="ni ni-credit-card"></i>
                                        </span>
                                        <small>Payments</small>
                                    </a>
                                    <a href="#!" class="col-4 shortcut-item">
                                        <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                                            <i class="ni ni-books"></i>
                                        </span>
                                        <small>Reports</small>
                                    </a>
                                    <a href="#!" class="col-4 shortcut-item">
                                        <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                                            <i class="ni ni-pin-3"></i>
                                        </span>
                                        <small>Maps</small>
                                    </a>
                                    <a href="#!" class="col-4 shortcut-item">
                                        <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                                            <i class="ni ni-basket"></i>
                                        </span>
                                        <small>Shop</small>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img alt="Image placeholder" src="{{ Auth::guard('admin')->user()->avartar }}">
                                    </span>
                                    <div class="media-body  ml-2  d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold"> @php
                                            echo Auth::guard('admin')->user()->name;
                                            @endphp </span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome!</h6>
                                </div>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>My profile</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-settings-gear-65"></i>
                                    <span>Settings</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-calendar-grid-58"></i>
                                    <span>Activity</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-support-16"></i>
                                    <span>Support</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ URL::to('admin/logout') }}" class="dropdown-item">
                                    <i class="ni ni-user-run"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END Topnav -->

        <!-- START MainContent -->
        <div class="pb-5">
            @yield('dashboard')
            @yield('icons')
            @yield('product')
            @yield('account')
        </div>
        <!-- END MainContent -->

        <!-- START Footer -->
        {{-- <footer class="footer pt-0 pb-3 position-absolute w-100 px-3 mt-4" style="bottom: 0">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6">
                    <div class="copyright text-center  text-lg-left  text-muted">
                        &copy; 2020 <a href="#" class="font-weight-bold ml-1" target="_blank">G Company</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                            <a href="#" class="nav-link" target="_blank">G Company</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" target="_blank">About
                                Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" target="_blank">MIT License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer> --}}
        <!-- END Footer -->
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Optional JS -->
    {{-- <script src="{{ asset('vendor/chart.js/dist/Chart.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('vendor/chart.js/dist/Chart.extension.js') }}"></script> --}}

    {{-- <script src="{{ asset('js/components/charts/chart-line') }}"></script> --}}
    {{-- <script src="{{ asset('js/components/charts/chart-bars.js') }}"></script>
    <script src="{{ asset('js/components/charts/chart-line.js') }}"></script> --}}
    <!-- Argon JS -->
    <script src="{{ asset('js/argon.js?v=1.2.0') }}"></script>
    {{-- <script src="{{ asset('vendor/chart.js/dist/Chart.min.js') }})"></script> --}}
    {{-- <script src="{{ asset('vendor/chart.js/dist/Chart.extension.js') }}"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript" charset="utf-8" async defer></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.1/js/dataTables.fixedColumns.min.js">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />

    <script src='https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js'></script>
    <script src='https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js'></script>
    <script src='https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js'></script>
</body>

</html>