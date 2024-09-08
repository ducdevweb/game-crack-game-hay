<?php
    namespace App\controller;
    use App\model\sanpham;
    use App\model\giohang;
    use App\model\donhang;
    use App\model\User;
    use App\model\database; 
    use App\model\xl_data;
use Exception;
use PDO;
class controller{
    private $conn;  

    public function __construct()
    {
        $this->conn = database::connection_database();  
    }
        public function index(){
            include __DIR__ . "/../view/header.php";
            include __DIR__ . "/../view/main.php";
            include __DIR__ . "/../view/footer.php";
        }
        public function sanpham (){

            include __DIR__ . "/../view/header.php";
            include __DIR__ . "/../view/sanpham.php";
            include __DIR__ . "/../view/footer.php";
        }
        public function admin(){
            include __DIR__ . "/../view/admin.php";
        }
        public function login(){
            include __DIR__ . "/../view/dangnhap.php";
        }
        public function checkOut(){
            
            include __DIR__ . "/../view/checkOut.php";
        }
        public function contact (){
            include __DIR__ . "/../view/header.php";
            include __DIR__ . "/../view/contact.php";
            include __DIR__ . "/../view/footer.php";
        }
        public function themsp(){
           
            include __DIR__ . "/../view/admin_add_sanpham.php";
            include __DIR__ . "/../view/footer.php";
        }
        public function chitiet(){
            $sp = new sanpham();
            $sp = $sp ->getmotsp($_GET['id']);
            include __DIR__ . "/../view/header.php";
            include __DIR__ . "/../view/chitietsp.php";
            include __DIR__ . "/../view/footer.php";
        }
        function sua_sp() { 

            include __DIR__ . "/../view/admin_editsp.php";
           
        }
    
        public function canhan()  {

            include __DIR__ . "/../view/canhan_nguoidung.php";
        
            include __DIR__ . "/../view/footer.php";
        }
        public function new_admin(){
            
            include __DIR__ . "/../view/admins.php";
            include __DIR__ . "/../view/footer.php";
        }
        public function quanly_taikhoan(){
            
            include __DIR__ . "/../view/admins_quanly_taikhoan.php";
            include __DIR__ . "/../view/footer.php";
        }
        public function quanly_sanpham(){
            
            include __DIR__ . "/../view/admins_quanly_sanpham.php";
            include __DIR__ . "/../view/footer.php";
        }
        public function quanly_donhangct(){
           
            include __DIR__ . "/../view/admins_quanly_donhangct.php";
            include __DIR__ . "/../view/footer.php";
        }
        public function quanly_donhang(){
            
            include __DIR__ . "/../view/admins_quanly_donhang.php";
            include __DIR__ . "/../view/footer.php";
        }
        function add_sp() {
  
            include __DIR__ . "/../view/admin_add_sanpham.php";
           
        }
        public function quanly_dh() {
    
            include __DIR__ . "/../view/admin.php";
            include __DIR__ . "/../view/admin_quanly_donhang.php";
        
        }
        public function donhang(){
            include __DIR__ . "/../view/chitietdon.php";
            include __DIR__ . "/../view/footer.php";
        }
       
        public function ctd(){
            $sp = new donhang();
            $sp = $sp ->getmotdon($_GET['id']);
            
            include __DIR__ . "/../view/donhang.php";
        }
        public function ad_ctd(){
            include __DIR__ . "/../view/admins_quanly_donhang.php";
        }
        public function doanhthu(){
            include __DIR__ . "/../view/admin_doanthu.php";
        }
        public function ctds(){
    
            include __DIR__ . "/../view/chitietdon.php";
        }
        public function dangky()
        {
            if (isset($_POST["dangky"]) && $_POST["dangky"])  {
             
                $username = $_POST['user'];
                $password = $_POST['pass'];
                $fullname = $_POST['fullname'];
                $email = $_POST['emal'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $position = 1;
                $image = $_FILES['name'];
        
                $user = new User();
                $user->addUser($username, $password, $fullname, $email, $phone, $address, $position, $image);
                
                header("Location:/dangnhap");
                exit();
            }
        
            include __DIR__ . "/../view/dangky.php";
        }
        
            public function dangxuat(){
                session_unset(); 
             
                header("Location: /");
                exit();
            }
            public function chitietdon(){
                
                include __DIR__ . "/../view/chitietdon.php";
            }
            public function dangnhap_if(){
                if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                    $username = $_POST['user'];
                    $password = $_POST['pass'];
                    $user = new User();
                    $tk =$user->mot_taikhoan($username, $password); 
                    if ($tk) {
                     $objuser = array("username" => $tk[0]['username'],
                      "position" => $tk[0]['position'],
                      "fullname" => $tk[0]['fullname'], 
                      "email" => $tk[0]['email'], 
                      "phone" => $tk[0]['phone'],  
                      "address" => $tk[0]['address'], 
                      "block" => $tk[0]['block'], 
                      "image" => $tk[0]['image'], 
                      "id_user" => $tk[0]['id_user']);
                        $_SESSION['objuser'] = $objuser;
                      
                      if ($tk[0]['position'] == 0) {
                       
                        header("Location:/app/view/admins.php");
                      }else if($tk[0]['block'] != 0){
                       echo 'Đã bị block vô thời hạn';
                      }
                      else{
                          header("Location:/");
                      }
                } else  {  
                    echo 'Sai mật khẩu hoặc tài khoản rồi !';
                    }
                  }
            
             }

             public function timkiem(){
                $xl = new xl_data();
                if (isset($_POST['timkiem'])) {
                    $noidung = $_POST['noidung'];
                    $conn = $xl->connection_database();
                    $sql = "SELECT * FROM sanpham WHERE Name LIKE ?";
                    $stmt = $conn->prepare($sql);
                    $noidung = "%$noidung%"; 
                    $stmt->bindParam(1, $noidung, PDO::PARAM_STR);
                    $stmt->execute();
                    $searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    include __DIR__ . "/../view/view_timkiem.php";
                }
            }
            
            
        public function giohang(){   
            if(isset($_GET['id'])){
                    $gh = new giohang();
                    $sps = new sanpham();
                    $sps->setId($_GET['id']);
                    $sp_mot = $sps->getmotsp($sps->getId());
                    $sp = [$sp_mot[0]['id_sp'], $sp_mot[0]['Name'], $sp_mot[0]['Price'],1, $sp_mot[0]['image']];
                    $vitri = $gh->kiemtra($sp);
                    if($vitri == -1){
                        $_SESSION['giohang'][] = $sp;
                    } else {
                        $_SESSION['giohang'][$vitri][3]++;
         
                }
              
             
            }
        
            if(isset($_REQUEST['del'])){
                $gh = new giohang();
                $id_del = $_REQUEST['del'];
                $vitri = $gh->kiemtra($id_del);
        
                if($vitri !== -1) {
                    array_splice($_SESSION['giohang'], $vitri, 1);
                }
            }
            include __DIR__ . "/../view/header.php";
            include __DIR__ . "/../view/giohang.php";
            include __DIR__ . "/../view/footer.php";
           
        }
        public function guimail(){
            include __DIR__ . "/../view/guimail.php";
        }
        //edit giỏ hàng
        public function giohang_if(){
            @session_start();
            if (isset($_POST["id_edit"]) && $_POST["id_edit"]) {
                $gh= new giohang();
                $sl=$_POST['soluong'];
                $id=$_POST['id_edit'];
                
                // Kiểm tra số lượng mới là hợp lệ
                if ($sl > 0) {
                    $sp=[$id,$sl];
                    $vitri= $gh->kiemtra($id);
                    
                    // Kiểm tra vị trí có hợp lệ không
                    if ($vitri !== -1) {
                        $_SESSION['giohang'][$vitri][3]=$sl;
                    }
                }
            }
            header('Location:/giohang');
        }
            



//up sản phẩm
public function uploadsp_if()  {
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $sp=new sanpham();
        if(empty($_POST['id_sp'])){echo ("input id_sp"); $flag=0;
        }else{
            $sp->setId($_POST["id_sp"]); 
            $flag=1;
        }        
        if(empty($_POST['Name'])){echo ("input Name"); $flag=0;
        }else{
            $sp->setName($_POST["Name"]);
            $flag=1;
        }
        if(empty($_POST['Price'])){echo ("input Price"); $flag=0;
        }else{
            $sp->setPrice($_POST["Price"]);
            $flag=1;
        }
        if(empty($_POST['image'])){echo ("input image"); $flag=0;
        }else{
            $sp->setimage($_POST["image"]);
            $flag=1;
        }
        if(empty($_POST['Mount'])){echo ("input Mount"); $flag=0;
        }else{
            $sp->setMount($_POST["Mount"]);
            $flag=1;
        }
        if(empty($_POST['sale'])){echo ("input sale"); $flag=0;
        }else{
            $sp->setMount($_POST["sale"]);
            $flag=1;
        }
        if(empty($_POST['Decribe'])){echo ("input Decribe"); $flag=0;
        }else{
            $sp->setDecribe($_POST["Decribe"]);
            $flag=1;
        }
        if(isset($_FILES['image'])){
            $hinhsp = basename($_FILES['image']['name']);
            $sp->setimage($hinhsp);
            $path = __DIR__ . "/../../assets/images/";
            $target_file = $path . $hinhsp;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
            
            $flag = 1;
        }
        
        if($flag==1){
           $sp->themsp($sp);
        }
    }
    header('Location:/quanly_sanpham');
}

// sửa sản phẩm

public function edit_sp(){
    $sp = new sanpham();
    $sp->setId($_POST["masp"]);
    $sp->setName($_POST["tensp"]);
    $sp->setPrice($_POST["giasp"]);
    $sp->setMount($_POST["soluong"]);
    $sp->setDecribe($_POST["mota"]);
    $hinhsp = $_POST['hinh_cu'];

    if (isset($_FILES['hinh_moi'])) {
        if ($_FILES['hinh_moi']['name'] !="") {
            $hinhsp = basename($_FILES["hinh_moi"]["name"]);
            $path = __DIR__ . "/../../assets/images/";
            $target_file = $path . $hinhsp;
            move_uploaded_file($_FILES['hinh_moi']['tmp_name'], $target_file);
            unlink(__DIR__ .'/../../assets/images/'.$_POST['hinh_cu']);
        }
    }

    $sp->setimage($hinhsp);
    $sp->capnhatsp($sp);
    
    header('Location:/quanly_sanpham');
    exit();
}

public function thanhtoansp()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if (isset($_SESSION["objuser"]["id_user"]) && $_SESSION["objuser"]["id_user"] != 0) {
        $id_user = $_SESSION['objuser']['id_user'];
        $diachi = $_POST["diachi"];
        $email = $_POST["Email"];
        $nguoinhan = $_POST["ten"];
        $phone = $_POST["phone"];
        $phuongthuc = $_POST["tt"];
        $hanhtrinh = $_POST["hanhtrinh"];
        $giohang = $_SESSION["giohang"];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ngaydat = date("Y-m-d H:i:s");
        $totalAmount = 0;

        try {
            $this->conn->beginTransaction();
            
            foreach ($giohang as $item) {
                $subtotal = $item[2] * $item[3];
                $totalAmount += $subtotal;
                $id_sp = $item[0];
                $ten = $item[1];
                $gia = $item[2];
                $sl = $item[3];

                $sqlDonHang = "INSERT INTO donhang (id_sp, thanh_toan, hanh_trinh, ngaydat, ten_sp, gia_sp, soluong)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $this->conn->prepare($sqlDonHang);
                $stmt->execute([$id_sp, $phuongthuc, $hanhtrinh, $ngaydat, $ten, $gia, $sl]);

                $lastOrderId = $this->conn->lastInsertId();
                $sqlUpdateTongTien = "UPDATE donhang SET tongdh = ? WHERE id_dh = ?";
                $stmt = $this->conn->prepare($sqlUpdateTongTien);
                $stmt->execute([$totalAmount, $lastOrderId]);

                $sqlGiamSoLuong = "UPDATE sanpham SET Mount = Mount - ? WHERE id_sp = ?";
                $stmt = $this->conn->prepare($sqlGiamSoLuong);
                $stmt->execute([$sl, $id_sp]);
            }


            $sqlChiTiet = "INSERT INTO dh_chitiet (id_user, id_dh, diaChi, nguoiNhan, email, sdt, ngaydat) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sqlChiTiet);
            $stmt->execute([$id_user, $lastOrderId, $diachi, $nguoinhan, $email, $phone, $ngaydat]);

            $this->conn->commit();
            unset($_SESSION['giohang']);
            header('Location: /donhang?id=' . $_SESSION['objuser']['id_user']);
            exit; 

        } catch (Exception $e) {
            $this->conn->rollBack();
            echo "Lỗi: " . $e->getMessage();
        }

        include __DIR__ . "/../view/guimail.php";

    } else {
        echo "Phiên 'objuser' không tồn tại hoặc giá trị 'id_user' không hợp lệ.";
    }
}


public function ansp() {
    if (isset($_GET['id'])) {
        $sp=new sanpham();
        $id = $_GET['id'];
        $sp->anSp($id);
  
       
}
header('Location:/quanly_sanpham');
}


public function hiensp() {
    if (isset($_GET['id'])) {
        $sp = new sanpham();
        $id = $_GET['id'];
        $sp->hienSp($id);
    }
    header('Location:/quanly_sanpham');
    
}
//admin khách hàng
public function khachhang() {
    
    include __DIR__ . "/../view/admin.php";
    include __DIR__ . "/../view/admin_quanly_taikhoan.php";

}

public function block() {
    if (isset($_GET['id'])) {
        $sp = new User();
        $id = $_GET['id'];
        $sp->block($id);
        unset($_SESSION['objuser']);
    }
    header('Location:/quanly_taikhoan');
    
}
public function unblock() {
    if (isset($_GET['id'])) {
        $sp = new User();
        $id = $_GET['id'];
        $sp->unblock($id);
       
    }
    header('Location:/quanly_taikhoan');
    
}

public function giao_kho() {
    if (isset($_GET['id'])) {
        $dh = new donhang();
        $id = $_GET['id'];
        $dh->giao_kho($id);
        header('Location:/quanly_donhang');
}
}
public function giao_ship() {
    if (isset($_GET['id'])) {
        $dh = new donhang();
        $id = $_GET['id'];
        $dh->giao_ship($id);
        header('Location:/quanly_donhang');
}
}
public function hoan_thanh() {
    if (isset($_GET['id'])) {
        $dh = new donhang();
        $id = $_GET['id'];
        $dh->hoan_thanh($id);
        //$dh->nhanhang($id);
        header('Location:/quanly_donhang');
}
}
public function edit_user(){
    $us = new User();
    $us->setUsername($_POST["tenus"]);
    $us->setPassword($_POST["passus"]);
    $us->setFullname($_POST["fullname"]);
    $us->setEmail($_POST["email"]);
    $us->setPhone($_POST["phone"]);
    $us->setAddress($_POST["address"]);
    
    $us->capnhatuser(
        $_POST["id"],
        $us->getUsername(),
        $us->getPassword(),
        $us->getFullname(),
        $us->getEmail(),
        $us->getPhone(),
        $us->getAddress()
    );
    if ($_SESSION['objuser']['position']==0) {
        header('Location:/quanly_taikhoan');
    exit();
    }else{
        header('Location:/');
        exit();
    }
}


}

?>
