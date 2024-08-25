<?php
    namespace App\model;
    use App\Model\xl_data;
    use PDO;
    class sanpham{
        private $id_sp = 0;
        private $id_dm = 0;
        private $Name = "";
        private $Price = 0;
        private $Date_import = "";
        private $Viewsp = 0;
        private $Decribe = "";
        private $Mount = 0;
        private $Sale = 0;
        private $image = "";
        
        private $conn;  

        public function __construct()
        {
            $this->conn = database::connection_database();  
        }
        public function setId_dm($id_dm){
            return $this->id_dm = $id_dm;
        }
        public function getId_dm(){
            return $this->id_dm;
        }
        public function setPrice($Price){
            return  $this->Price = $Price;
        }
        public function getPrice(){
            return  $this->Price;
        }
        public function setimage($image){
            return  $this->image = $image;
        }
        public function getimage(){
            return  $this->image;
        }
        public function setSale($Sale){
            return  $this->Sale = $Sale;
        }
        public function getSale(){
            return  $this->Sale;
        }
    
        public function setMount($Mount){
            return  $this->Mount = $Mount;
        }
        public function getMount(){
            return  $this->Mount;
        }
        public function setDecribe($Decribe){
            return  $this->Decribe = $Decribe;
        }
        public function getDecride(){
            return  $this->Decribe;
        }
        public function setViewsp($Viewsp){
            return  $this->Viewsp = $Viewsp;
        }
        public function getViewsp(){
            return  $this->Viewsp;
        }
        public function setDate_import($Date_import){
            return  $this->Date_import = $Date_import;
        }
        public function getDate_import(){
            return  $this->Date_import;
        }
        public function setName($Name){
            return  $this->Name = $Name;
        }
        public function getName(){
            return  $this->Name;
        }
        public function setId($id_sp){
            return $this->id_sp = $id_sp;
        }
        public function getId(){
            return $this->id_sp;
        }
        public function getmotsp($id){
            $xl = new xl_data();
            $sql = "select * from sanpham where id_sp =".$id;
            $result = $xl->readitem($sql);
            return $result;
        }
        
        public function deletesp($sp){
            $xl = new xl_data();
            $sql = "delete from sanpham where id_sp =".$sp->getId();
            $xl->execute_item($sql);
        }
        //cate
        public function getCate() {
            $xl = new xl_data();
            $sql = "SELECT * FROM danhmuc WHERE id_dm IS NOT NULL"; 
            $result = $xl->readitem($sql);
            return $result;
        }
      
        
        //
        public function getdata(){
            $xl = new xl_data();
            $sql = "SELECT * FROM sanpham ";
            $result = $xl->readitem($sql);
            return $result;
        }
        public function getdata2(){
            $xl = new xl_data();
            $sql = "SELECT * FROM sanpham WHERE an = 0";
            $result = $xl->readitem($sql);
          
            return $result;
        }
        //ẩn
       
        public function anSp($id) {
            $xl = new xl_data();
            $sql = "UPDATE sanpham SET an = 1 WHERE id_sp =" . $id;
            $result = $xl->readitem($sql);
            return $result;
        }
        public function hienSp($id) {
            $xl = new xl_data();
            $sql = "UPDATE sanpham SET an = 0 WHERE id_sp =" . $id;
            $result = $xl->readitem($sql);
            return $result;
        }
        public function getdata_limit($st,$stp){
            $xl = new xl_data();
            $sql = "select * from sanpham order by id_sp desc limit ".$st.",".$stp;
            $result = $xl->readitem($sql);
            return $result;
        }

//đơn hàng chi tiết
        

   //admin
   public function themsp($sp) {
    $xl = new xl_data();
    $Price = $sp->getPrice();
    $image = $sp->getimage();
    $Sale = $sp->getSale();
    $Mount = $sp->getMount();
    $Decribe = $sp->getDecride();
    $Name = $sp->getName();
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $ngaydat = $sp->getDate_import();
    $Date_import=$ngaydat;
    $Date_import = date("Y-m-d H:i:s");
    $sql = "INSERT INTO sanpham ( Price, image, Sale, Mount, Decribe, Date_import, Name) 
            VALUES ( '$Price', '$image', '$Sale', '$Mount', '$Decribe', '$Date_import', '$Name')";
    $xl->execute_item($sql);
}
public function capnhatsp($sp) {
    $xl = new xl_data();
    $id_sp = $sp->getId();
    $Price = $sp->getPrice();
    $image = $sp->getimage();
    $Sale = $sp->getSale();
    $Mount = $sp->getMount();
    $Decribe = $sp->getDecride();
    date_default_timezone_set('Asia/Ho_Chi_Minh');
     $ngaydat = $sp->getDate_import();
     $Date_import=$ngaydat;
     $Date_import = date("Y-m-d H:i:s");
    $Name = $sp->getName();
    $sql = "UPDATE sanpham SET Price = '$Price', image = '$image', Sale = '$Sale', Mount = '$Mount', 
            Decribe = '$Decribe', Date_import = '$Date_import', Name = '$Name'
            WHERE id_sp = '$id_sp'";
    
    $xl->execute_item($sql);
}

}


   
    
 
    


?>