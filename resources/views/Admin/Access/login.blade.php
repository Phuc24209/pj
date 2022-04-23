@extends('index2')
@section('login')
    <div class="main-content">
        <!-- Header -->
        {{-- {{dd(bcrypt('12345'))}} --}}
        <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                            <h1 class="text-white">Admin Login!</h1>
                            <p class="text-lead text-white">Chúc bạn có một ngày làm việc Mệt mỏi Cọc cằn Bứt dứt Bực tức
                                Cáu giận hihi</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                    xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--9 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary border-0 mb-0">
                        @php
                        if (isset($err)) {
                            echo ("<div class='card-header bg-transparent text-red text-center text-capitalize'>".$err."</div>");
                        }
                        @endphp
                        <div class="card-body px-lg-5 py-lg-5">
                            {{-- <div class="text-center text-muted mb-4">
                            <small>Or sign in with credentials</small>
                        </div> --}}
                            <form role="form" method="POST" action="/admin/login" onsubmit="return LoginValidate()">
                                @csrf
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative" id='checkUser'>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control" id='user' name="user" placeholder="Tài khoản"
                                            type="text" onchange="LoginValidate_User()">
                                    </div>
                                    <div class='text-red px-2' id='errUser'></div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative" id='checkPass'>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control" id='pass' name="pass" placeholder="Mật khẩu"
                                            type="password" onchange="LoginValidate_Pass()">
                                    </div>
                                    <div class='text-red px-2' id='errPass'></div>
                                </div>
                                {{-- <div class="custom-control custom-control-alternative custom-checkbox">
                                <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                                <label class="custom-control-label" for=" customCheckLogin">
                                    <span class="text-muted">Nhớ mật khẩu</span>
                                </label>
                            </div> --}}
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4">Đăng nhập</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <a href="#" class="text-light"><small>Quên mật khẩu?</small></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/validateLogin.js"></script>
@endsection
