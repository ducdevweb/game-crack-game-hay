<?php
    namespace App\model;
    use App\model\Controller;
    class giohang{
        function kiemtra($id){
            @session_start();
            for($i = 0; $i < sizeof($_SESSION['giohang']); $i++){
                if ( $_SESSION['giohang'][$i][0] == $id[0]){
                    return $i;
                }
        }
        return -1;
    }

}
?>