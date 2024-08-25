<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
</head>
<style>
   body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 500px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form {
    display: grid;
    gap: 20px;
}

label {
    font-weight: bold;
}

input[type="number"],
input[type="text"],
textarea,
input[type="file"],
button {
    width: calc(100% - 20px);
    padding: 12px;
    border: 2px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    outline: none;
}

input[type="number"]:focus,
input[type="text"]:focus,
textarea:focus,
input[type="file"]:focus,
button:focus {
    border-color: #4caf50;
}

input[type="file"] + label {
    padding: 10px;
    border: 2px dashed #ccc;
    border-radius: 5px;
    display: block;
    text-align: center;
    cursor: pointer;
    transition: border 0.3s;
}

input[type="file"] + label:hover {
    border-color: #4caf50;
}

select {
    width: calc(100% - 20px);
    padding: 12px;
    border: 2px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    outline: none;
    background-color: #fff;
}

button {
    background-color: #4caf50;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s;
    border: none;
}

button:hover {
    background-color: #45a049;
}

    </style>
<body>
    <div class="container">
        <form action="/upload_sp" method="post" enctype="multipart/form-data">
 <input type="number" hidden name="id_sp" value=""><br>
            Tên sản phẩm: <input type="text" name="Name" value=""><br>
            Giá sản phẩm: <input type="number" name="Price" value=""><br>
            Ảnh sản phẩm: <input type="file" name="image" value=""><br>
            Số lượng : <input type="number" name="Mount" value=""><br>
            Sale: <select name="sale" id="">
                <option value="0">0%</option>
                <option value="1">10%</option>
                <option value="2">20%</option>
                <option value="3">30%</option>
                <option value="4">40%</option>
                <option value="5">50%</option>
              
            </select>
            Mô tả: <textarea name="Decribe" id="" cols="50" rows="4"></textarea>
            <button type="submit">Thêm</button>
        </form>
    </div>
</body>
</html>