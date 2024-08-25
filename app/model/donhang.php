<?php
    namespace App\model;
    use App\Model\xl_data;
    class donhang{
        public function getdon() {
            $xl = new xl_data();
            $sql = "SELECT * FROM donhang ";
            $result = $xl->readitem($sql);
            return $result;
        }
        public function getmotdon($id_dh) {
            $xl = new xl_data();
            $sql = "SELECT * FROM donhang WHERE id_dh =".$id_dh;
            $result = $xl->readitem($sql);
            return $result;
        }
        
    // donhang.php
    public function getdh_thang($month = null) {
        $xl = new xl_data();
        if ($month === null) {
            $sql = "SELECT * FROM donhang";
        } else {
            $sql = "SELECT * FROM donhang WHERE MONTH(ngaydat) = $month";
        }
    
        $result = $xl->readitem($sql);
        return $result;
    }

        public function giao_kho($id) {
            $xl = new xl_data();
            $sql = "UPDATE donhang SET hanh_trinh = 1  WHERE id_dh =" . $id;
            
            $result = $xl->readitem($sql);
            return $result;
        }
        public function giao_ship($id) {
            $xl = new xl_data();
            $sql = "UPDATE donhang SET hanh_trinh = 2 WHERE id_dh =" . $id;
            
            $result = $xl->readitem($sql);
            return $result;
        }
        public function hoan_thanh($id) {
            $xl = new xl_data();
            $sql = "UPDATE donhang SET hanh_trinh = 3 WHERE id_dh =" . $id;
            
            $result = $xl->readitem($sql);
            return $result;
        }
        
       
public function get_donhang_chitiet($month = null) {
    $xl = new xl_data();
    if ($month === null) {
        $sql = "SELECT * FROM dh_chitiet";
    } else {
        $sql = "SELECT * FROM dh_chitiet WHERE MONTH(ngaydat) = $month";
    }

    $result = $xl->readitem($sql);
    return $result;
}
public function getOne_dhct() {
    $xl = new xl_data();
    $sql = "SELECT * FROM dh_chitiet ";
    $result = $xl->readitem($sql);
    return $result;
}

public function getAll_dhct() {
    $xl = new xl_data();
    $sql = "SELECT * FROM dh_chitiet";
    $result = $xl->readitem($sql);
    return $result;
}



        
}