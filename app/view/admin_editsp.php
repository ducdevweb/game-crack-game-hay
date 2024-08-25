<?php
use App\model\sanpham;
$sp = new sanpham();
$sp = $sp ->getmotsp($_GET['id']);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .container {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 400px;
        text-align: center;
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    label {
        font-weight: bold;
        margin-bottom: 8px;
        display: block;
    }

    input,
    textarea {
        margin-bottom: 16px;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        width: 100%;
        box-sizing: border-box;
    }

    button {
        background-color: #007bff;
        color: #fff;
        padding: 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
        box-sizing: border-box;
    }

    button:hover {
        background-color: #0056b3;
    }

    img {
        margin-top: 16px;
        border-radius: 4px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }
</style>

<body>

    <div class="container">
        <form action="/upload_edit_if" method="post" enctype="multipart/form-data">
            Mã sản phẩm: <label for=""><?= $sp[0]['id_sp'] ?></label>
            <input type="number" name="masp" value="<?= $sp[0]['id_sp']?>"><br>
            Tên sản phẩm: <input type="text" name="tensp" value="<?= $sp[0]['Name'] ?>"><br>
            Giá sản phẩm: <input type="number" name="giasp" value="<?= $sp[0]['Price'] ?>"><br>
            Ảnh sản phẩm: 
            <input type="file" name="hinh_moi" value=""><br>
            <input type="file" hidden name="hinh_cu" value="<?= isset($sp[0]['image']) ? $sp[0]['image'] : '' ?>">
            <img src="/assets/images/<?= $sp[0]['image'] ?>" alt="" width="100" height="100">
            <br>
            Số lượng : <input type="number" name="soluong" value="<?= $sp[0]['Mount'] ?>"><br>
            Mô tả: <textarea name="mota" id="" cols="20" rows="4"><?=$sp[0]['Decribe'] ?></textarea>
            <button type="submit">Cập nhật</button>
        </form>
    </div>
    </body>
</html>