window.location.pathname == '/admin/dashboard' ? document.getElementsByClassName('nav-link')[0].classList.add('active')
: window.location.pathname == '/admin/account' ? document.getElementsByClassName('nav-link')[1].classList.add('active')
// : window.location.pathname == '/admin/product' ? (document.getElementsByClassName('nav-link')[2].classList.add('active'),document.getElementsByClassName('link-nav-child')[0].classList.add('link-nav-child-active'),document.getElementsByClassName('nav-child')[0].classList.add('nav-child-active'))
: window.location.pathname == '/admin/warehouse'? (document.getElementById('khohang').classList.toggle('active'), document.getElementById('nav-child-Menu-kho').classList.toggle('d-none'), document.getElementById('bold-right-kho').style.transform = 'rotate(90deg)', document.getElementsByClassName('nav-child-kho')[0].classList.add('nav-child-active'))

: window.location.pathname == '/admin/product' ? (document.getElementById('sanpham').classList.toggle('active'), document.getElementById('nav-child-Menu-sanpham').classList.toggle('d-none'), document.getElementById('bold-right-sanpham').style.transform = 'rotate(90deg)', document.getElementsByClassName('nav-child-sanpham')[4].classList.add('nav-child-active'))
: window.location.pathname == '/admin/product/attribute/color'? (document.getElementById('sanpham').classList.toggle('active'), document.getElementById('nav-child-Menu-sanpham').classList.toggle('d-none'), document.getElementById('bold-right-sanpham').style.transform = 'rotate(90deg)', document.getElementsByClassName('nav-child-sanpham')[0].classList.add('nav-child-active'))
: window.location.pathname == '/admin/product/attribute/size'? (document.getElementById('sanpham').classList.toggle('active'), document.getElementById('nav-child-Menu-sanpham').classList.toggle('d-none'), document.getElementById('bold-right-sanpham').style.transform = 'rotate(90deg)', document.getElementsByClassName('nav-child-sanpham')[1].classList.add('nav-child-active'))
: window.location.pathname == '/admin/product/attribute/brand'? (document.getElementById('sanpham').classList.toggle('active'), document.getElementById('nav-child-Menu-sanpham').classList.toggle('d-none'), document.getElementById('bold-right-sanpham').style.transform = 'rotate(90deg)', document.getElementsByClassName('nav-child-sanpham')[2].classList.add('nav-child-active'))
// : window.location.pathname == '/admin/product/attribute/image'? (document.getElementById('sanpham').classList.toggle('active'), document.getElementById('nav-child-Menu-sanpham').classList.toggle('d-none'), document.getElementById('bold-right-sanpham').style.transform = 'rotate(90deg)', document.getElementsByClassName('nav-child-sanpham')[3].classList.add('nav-child-active'))
: window.location.pathname == '/admin/product/attribute/type'? (document.getElementById('sanpham').classList.toggle('active'), document.getElementById('nav-child-Menu-sanpham').classList.toggle('d-none'), document.getElementById('bold-right-sanpham').style.transform = 'rotate(90deg)', document.getElementsByClassName('nav-child-sanpham')[3].classList.add('nav-child-active'))
// : window.location.pathname == '/admin/product/attribute/product'? (document.getElementById('sanpham').classList.toggle('active'), document.getElementById('nav-child-Menu-sanpham').classList.toggle('d-none'), document.getElementById('bold-right-sanpham').style.transform = 'rotate(90deg)', document.getElementsByClassName('nav-child-sanpham')[5].classList.add('nav-child-active'))

: window.location.pathname == '/admin/receipt'? (document.getElementById('phieuxuatkho').classList.toggle('active'), document.getElementById('nav-child-Menu-Phieu').classList.toggle('d-none'), document.getElementById('bold-right-phieu').style.transform = 'rotate(90deg)', document.getElementsByClassName('nav-child-phieu')[0].classList.add('nav-child-active'))
: window.location.pathname == '/admin/issue'? (document.getElementById('phieuxuatkho').classList.toggle('active'), document.getElementById('nav-child-Menu-Phieu').classList.toggle('d-none'), document.getElementById('bold-right-phieu').style.transform = 'rotate(90deg)', document.getElementsByClassName('nav-child-phieu')[1].classList.add('nav-child-active'))
: window.location.pathname == '/admin/transfer'? (document.getElementById('phieuxuatkho').classList.toggle('active'), document.getElementById('nav-child-Menu-Phieu').classList.toggle('d-none'), document.getElementById('bold-right-phieu').style.transform = 'rotate(90deg)', document.getElementsByClassName('nav-child-phieu')[2].classList.add('nav-child-active'))
: window.location.pathname == '/admin/supplier'? (document.getElementById('phieuxuatkho').classList.toggle('active'), document.getElementById('nav-child-Menu-Phieu').classList.toggle('d-none'), document.getElementById('bold-right-phieu').style.transform = 'rotate(90deg)', document.getElementsByClassName('nav-child-phieu')[3].classList.add('nav-child-active'))

: null;

function closeAllMenu(){
    document.getElementById('phieuxuatkho').classList.remove('active');
    document.getElementById('nav-child-Menu-Phieu').classList.add('d-none');
    document.getElementById('bold-right-phieu').style.transform = 'rotate(0deg)';

    document.getElementById('khohang').classList.remove('active');
    document.getElementById('nav-child-Menu-kho').classList.add('d-none');
    document.getElementById('bold-right-kho').style.transform = 'rotate(0deg)';

    document.getElementById('sanpham').classList.remove('active');
    document.getElementById('nav-child-Menu-sanpham').classList.add('d-none');
    document.getElementById('bold-right-sanpham').style.transform = 'rotate(0deg)';
}

function activeDropDownPhieu(){
    // closeAllMenu();
    if($('#phieuxuatkho').hasClass('active') == false){
        closeAllMenu();
    }
    document.getElementById('phieuxuatkho').classList.toggle('active');
    document.getElementById('nav-child-Menu-Phieu').classList.toggle('d-none');

    if($('#phieuxuatkho').hasClass('active') == true){
        document.getElementById('bold-right-phieu').style.transform = 'rotate(90deg)';
    }else{
        document.getElementById('bold-right-phieu').style.transform = 'rotate(0deg)';
    }
}

function activeDropDownKho(){
    // closeAllMenu();
    if($('#khohang').hasClass('active') == false){
        closeAllMenu();
    }
    document.getElementById('khohang').classList.toggle('active');
    document.getElementById('nav-child-Menu-kho').classList.toggle('d-none');

    if($('#khohang').hasClass('active') == true){
        document.getElementById('bold-right-kho').style.transform = 'rotate(90deg)';
    }else{
        document.getElementById('bold-right-kho').style.transform = 'rotate(0deg)';
    }
}

function activeDropDownsanpham(){
    // closeAllMenu();
    if($('#sanpham').hasClass('active') == false){
        closeAllMenu();
    }
    document.getElementById('sanpham').classList.toggle('active');
    document.getElementById('nav-child-Menu-sanpham').classList.toggle('d-none');

    if($('#sanpham').hasClass('active') == true){
        document.getElementById('bold-right-sanpham').style.transform = 'rotate(90deg)';
    }else{
        document.getElementById('bold-right-sanpham').style.transform = 'rotate(0deg)';
    }
}
