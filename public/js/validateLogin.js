function LoginValidate() {
    const user =
        /^([A-Za-z0-9]{1,})$/g;
    const pass =
        /^([\w\d\s\W\D\S*.\]]){1,128}$/g;

    if (user.test(document.getElementById('user').value)) {
        var userCheck = 0;
    } else {
        var userCheck = 1;
    }
    if (pass.test(document.getElementById('pass').value)) {
        var passCheck = 0;
    } else {
        var passCheck = 1;
    }

    var check = userCheck + passCheck;
    if (check == 0) {
        return true;
    } else {
        return false;
    }
}

function LoginValidate_User() {
    const user =
        /^([A-Za-z0-9]{1,})$/g;

    if (user.test(document.getElementById('user').value)) {
        document.getElementById('errUser').innerHTML = "";
        document.getElementById('checkUser').style.color = "#0cdf0c";
        document.getElementById('checkUser').style.border = "1px #0cdf0c solid";
    } else {
        document.getElementById('errUser').innerHTML = "Tài khoản không hợp lệ";
        document.getElementById('checkUser').style.color = "red";
        document.getElementById('checkUser').style.border = "1px red solid";
    }
}

function LoginValidate_Pass() {
    const pass =
        /^([\w\d\s\W\D\S*.\]]){1,128}$/g;
    if (pass.test(document.getElementById('pass').value)) {
        document.getElementById('errPass').innerHTML = "";
        document.getElementById('checkPass').style.color = "#0cdf0c";
        document.getElementById('checkPass').style.border = "1px #0cdf0c solid";
    } else {
        document.getElementById('errPass').innerHTML = "Mật khẩu từ 8 - 128 ký tự";
        document.getElementById('checkPass').style.color = "red";
        document.getElementById('checkPass').style.border = "1px red solid";
    }
}