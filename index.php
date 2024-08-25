<?php
session_start();
//khoi tao giohang rỗng
if(!isset($_SESSION["giohang"])) $_SESSION['giohang'] =[];
if(!isset($_SESSION["dangnhap"])) $_SESSION['dangnhap'] =[];
require_once(__DIR__.'/public/router.php');
require_once(__DIR__.'/app/model/database.php');
require_once(__DIR__.'/app/model/xl_data.php');
require_once(__DIR__.'/app/controller/index.php');
require_once realpath(__DIR__."/vendor/autoload.php");
$router = new Router();
 $router
    ->get('/', [app\controller\Controller::class,'index'])
    ->get('/contact',[app\controller\Controller::class,'contact'])
    ->get('/guimail',[app\controller\Controller::class,'guimail'])
    ->get('/sanpham',[app\controller\Controller::class,'sanpham'])
    ->get('/checkOut',[app\controller\Controller::class,'checkOut'])
    ->get('/chitiet',[app\controller\Controller::class,'chitiet'])
    ->get('/giohang',[app\controller\Controller::class,'giohang'])
    ->post('/giohang_info',[app\controller\Controller::class,'giohang_if'])
    ->get('/dangky',[app\controller\Controller::class,'dangky'])
    ->post('/dangky',[app\controller\Controller::class,'dangky'])
    ->get('/dangxuat',[app\controller\Controller::class,'dangxuat'])
    ->post('/dangxuat',[app\controller\Controller::class,'dangxuat'])
    ->get('/dangnhap',[app\controller\Controller::class,'login'])
    ->post('/dangnhap',[app\controller\Controller::class,'dangnhap_if'])
    ->get('/donhang',[app\controller\Controller::class,'donhang'])
    ->get('/ctd',[app\controller\Controller::class,'ctd'])
    ->get('/ctds',[app\controller\Controller::class,'ctds'])
    ->get('/ad_ctd',[app\controller\Controller::class,'ad_ctd'])
    ->post('/timkiem',[app\controller\Controller::class,'timkiem'])
    //new admin
    ->get('/new_admin',[app\controller\Controller::class,'new_admin'])
    ->get('/quanly_sanpham',[app\controller\Controller::class,'quanly_sanpham'])
    ->get('/quanly_taikhoan',[app\controller\Controller::class,'quanly_taikhoan'])
    ->get('/quanly_donhangct',[app\controller\Controller::class,'quanly_donhangct'])
    ->get('/quanly_donhang',[app\controller\Controller::class,'quanly_donhang'])
    ->get('/doanhthu',[app\controller\Controller::class,'doanhthu'])
    //admin
   
    ->get('/upload_edit',[app\controller\Controller::class,'sua_sp'])
    ->get('/upload_sp',[app\controller\Controller::class,'add_sp'])
    ->get('/hiensp', [app\controller\Controller::class, 'hiensp'])
    ->get('/ansp', [app\controller\Controller::class, 'ansp'])
    ->get('/block', [app\controller\Controller::class, 'block'])
    ->get('/unblock', [app\controller\Controller::class, 'unblock'])
    ->get('/quatrinh2', [app\controller\Controller::class, 'nhanhang'])  
    ->get('/quatrinh', [app\controller\Controller::class, 'giao_kho'])  
    ->get('/quatrinh1', [app\controller\Controller::class, 'giao_ship']) 
    ->get('/quatrinh2', [app\controller\Controller::class, 'hoan_thanh']) 
    ->get('/canhan', [app\controller\Controller::class, 'canhan'])
    ->get('/addsp', [app\controller\Controller::class, 'themsp'])
    //model

    ->post('/upload_sp',[app\controller\Controller::class,'uploadsp_if'])
    ->post('/upload_edit_if',[app\controller\Controller::class,'edit_sp'])
    ->post('/upload_edit_user',[app\controller\Controller::class,'edit_user'])
    ->post('/thanhtoan_if',[app\controller\Controller::class,'thanhtoansp'])
    ;
    
    echo $router->resolve($_SERVER['REQUEST_URI'],
                strtolower($_SERVER['REQUEST_METHOD']));
    

?>