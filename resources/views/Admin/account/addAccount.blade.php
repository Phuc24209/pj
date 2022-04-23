<div id="myAddModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Thêm tài khoản</h2>
            </div>
            <div class="modal-body">
                {{-- <p>Some text in the modal.</p> --}}
                <form action="" onsubmit="return checkpass()" id="form-add" method="POST" role="form">
                    @csrf
                    <div class="form-group">
                        {{-- <label for="email">Tên Kho:</label> --}}
                        <input  type="text" class="form-control" placeholder="Họ tên" name='name' id="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Chọn ảnh đại diện</label>
                        <input type="file" class="form-control-file" id="avatar"
                            onchange="openPicAdd(this)" name="avatar">
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="" alt="" srcset="" id='imageDemoAdd' style="width: 100px; height:auto">
                    </div>
                    <div class="form-group mt-3">
                        {{-- <label for="email">Tên Kho:</label> --}}
                        <input  type="email" class="form-control" placeholder="Email" name='email' id="email">
                    </div>
                    <div class="form-group">
                        {{-- <label for="email">Tên Kho:</label> --}}
                        <input  type="text" class="form-control" placeholder="Tên tài khoản" name='user_name' id="user_name">
                    </div>
                    <div class="form-group" style="height: 50px">
                        {{-- <label for="email">Tên Kho:</label> --}}
                        <input  type="tel" class="form-control" onchange="checkpass()" placeholder="Số điện thoại" name='phone' id="phone">
                        <small id="error" style="height: 5px" class="text-danger"></small>
                    </div>
                    <div class="form-group">
                        {{-- <label for="email">Tên Kho:</label> --}}
                        <input  type="text" class="form-control" placeholder="Địa chỉ" name='address' id="address">
                    </div>
                    <div class="form-group" style="height: 50px">
                        {{-- <label for="email">Tên Kho:</label> --}}
                        <input  type="password" class="form-control" onchange="checkpass()" placeholder="Mật khẩu" name='pass' id="pass">
                        <small id="error2" style="height: 5px" class="text-danger"></small>
                    </div>
                    <div class="form-group" style="height: 50px">
                        {{-- <label for="email">Tên Kho:</label> --}}
                        <input  type="password" class="form-control" onchange="checkpass()" placeholder="Nhập lại mật khẩu" name='repass' id="repass">
                        <small id="error3" style="height: 5px" class="text-danger"></small>
                    </div>
                    <div class="form-group">
                        <select class="form-select" name="roles" id="roles" aria-label="Default select example">
                            <option selected>Chọn quyền</option>
                            <option value="0">Admin</option>
                            <option value="1">SuperAdmin</option>                            
                          </select>
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
