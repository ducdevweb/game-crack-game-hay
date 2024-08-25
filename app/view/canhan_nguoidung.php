<?php
use App\model\User;
$user = new User();
$us = $user->get_mot_user($_GET['id']);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<style>
    body {
    background-color: lightblue;
}

.form-box {
    width: 50%;
    margin: auto;
    padding-top:20px;
}

.form-box h1 {
    text-align: center;
    font-weight: bold;
    text-transform: uppercase;
    color: tomato;
}

.form-box h1 span {
    font-weight: lighter;
}
</style>
<body>
<div class="container">
	<div class="row">
		<div class="form-box">
        <h1> <span>Trình sửa thông tin người dùng</span></h1>
    	    <form role="form" id="contact-form" action="/upload_edit_user" method="post" enctype="multipart/form-data">
            <!-- name field -->
            <input type="number" hidden name="id" value="<?= $us[0]['id_user'] ?>"><br>
                <div class="form-group">
                <div id="nameError" class="alert" role="alert"></div>
                <h4>tên tài khoản</h4>
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                        <input class="form-control" type="text" name="tenus" value="<?= $us[0]['username'] ?>"><br>
                    </div>
                </div>

                <div class="form-group">
                <div id="phoneError" class="alert" role="alert"></div>
                <h4>tên người dùng</h4>
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                        <input type="text" class="form-control" id="form-phone-field" name="fullname" value="<?= $us[0]['fullname'] ?>">
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <h4>mật khẩu</h4>
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-password"></span></div>
                        <input type="text" class="form-control" id="form-phone-field"name="passus" value="<?= $us[0]['password'] ?>">
                    </div>    
                </div>
            <!-- email field -->
                <div class="form-group">
                <div id="emailError" class="alert" role="alert"></div>
                <h2>Email người dùng</h2>
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-email"></span></div>
                        <input type="email" class="form-control" id="form-email-field"  name="email" value="<?= $us[0]['email'] ?>">>
                    </div>
                </div>
            <!-- phone field -->
                <div class="form-group">
                <div id="phoneError" class="alert" role="alert"></div>
                <h2>số điện thoại</h2>
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></div>
                        <input type="number" class="form-control" id="form-phone-field" name="phone" value="<?= $us[0]['phone'] ?>">
                    </div>
                </div>

                <div class="form-group">
                <div id="phoneError" class="alert" role="alert"></div>
                <h2>Địa chỉ người dùng</h2>
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></div>
                        <input type="text" class="form-control" id="form-phone-field" name="address" value="<?= $us[0]['address'] ?>">
                    </div>
                </div>
          
            <button type="submit" class="btn btn-default">Submit</button>
    	    </form>   
		</div>
	</div>
</div> 
 </body>
 <script>
    document.getElementById("contact-form").onsubmit = function() {
    var nameValidate = /[a-z]/;
    //Validate Name
    if(document.getElementById("form-name-field").value == "") {
        document.getElementById("nameError").innerHTML = "Please Enter A Name";
        document.getElementById("nameError").className = "alert-danger";
    }
}
 </script>
</html>