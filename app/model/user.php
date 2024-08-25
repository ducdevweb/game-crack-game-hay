<?php
namespace App\model;
use App\model\xl_data;

class user
{
    public $id_user;
    public $username;
    public $password;
    public $fullname;
    public $email;
    public $phone;
    public $address;
    public $position;

    public function setIdUser($id_user) {
        $this->id_user = $id_user;
    }

    public function getIdUser() {
        return $this->id_user;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setFullname($fullname) {
        $this->fullname = $fullname;
    }

    public function getFullname() {
        return $this->fullname;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setPosition($position) {
        $this->position = $position;
    }

    public function getPosition() {
        return $this->position;
    }
    public function getUser()
    {
        $xl = new xl_data();
        $sql = "SELECT * FROM taikhoan";
        $result = $xl->readitem($sql);
        return $result;
    }

    public function mot_taikhoan($username, $password) 
    {
        $xl = new xl_data();
        $sql = "SELECT * FROM taikhoan WHERE username = '$username' AND password = '$password'";
        $result = $xl->readitem($sql);
        return $result;
    }
    public function get_mot_user($id){
        $xl = new xl_data();
        $sql = "SELECT * FROM taikhoan WHERE id_user =".$id;
        $result = $xl->readitem($sql);
        return $result;
    }
    
    public function block($id) {
        $xl = new xl_data();
        $sql = "UPDATE taikhoan SET block = 1 WHERE id_user =" . $id;
        $result = $xl->readitem($sql);
        return $result;
    }
    public function unblock($id) {
        $xl = new xl_data();
        $sql = "UPDATE taikhoan SET block = 0 WHERE id_user =" . $id;
        $result = $xl->readitem($sql);
        return $result;
    }
    public function addUser($username, $password, $fullname, $email, $phone, $address, $position, $image)
    {
        $xl = new xl_data();
        $avatarPath = '/assets/images/' . basename($image['name']);
        move_uploaded_file($image['tmp_name'], $avatarPath);        
        $sql = "INSERT INTO taikhoan (username, password, fullname, email, phone, address, position, image) 
                VALUES (:username, :password, :fullname, :email, :phone, :address, :position, :image)";
    
        $db = new database();
        $stmt = $db->connection_database()->prepare($sql);
    
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':image', $avatarPath); 
    
        $stmt->execute();
    }
    
    public function capnhatuser($id_user, $username, $password, $fullname, $email, $phone, $address) {
        $xl = new xl_data();
        
        $sql = "UPDATE taikhoan SET username = '$username', password = '$password', fullname = '$fullname', 
                email = '$email', phone = '$phone', address = '$address'
                WHERE id_user = '$id_user'";
        
        $xl->execute_item($sql);
    }
    
}
?>