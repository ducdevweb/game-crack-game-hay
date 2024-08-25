<?php
use App\model\User;
$user = new User();
$us = $user->get_mot_user($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile Update</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="page-heading header-text">
    <div class="container">
        <form action="/upload_edit_user" method="post" enctype="multipart/form-data">
            <input type="number"  name="id" value="<?= $us[0]['id_user'] ?>"><br>
            Tên người dùng: <input type="text" name="tenus" value="<?= $us[0]['username'] ?>"><br>
            Mật khẩu người dùng: <input type="text" name="passus" value="<?= $us[0]['password'] ?>"><br>
            Tên đầy đủ người dùng: <input type="text" name="fullname" value="<?= $us[0]['fullname'] ?>"><br>
            Địa chỉ người dùng: <input type="text" name="address" value="<?= $us[0]['address'] ?>"><br>
            Số điện thoại : <input type="number" name="phone" value="<?= $us[0]['phone'] ?>"><br>
            Email : <input type="email" name="email" value="<?= $us[0]['email'] ?>"><br>
            <button type="submit">Cập nhật</button>
        </form>
    </div>
    </div>
</body>
</html>
