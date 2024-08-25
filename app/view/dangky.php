<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
   
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="login-form-14/css/style.css">

    <script src="login-form-14/js/jquery.min.js"></script>
    <script src="login-form-14/js/popper.js"></script>
    <script src="login-form-14/js/bootstrap.min.js"></script>
    <script src="login-form-14/js/main.js"></script>
</head>

<body>
  
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section"><h1>CHÀO MỪNG ĐẾN VỚI SHOP GAME SKTT1</h1></h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url(assets/images/banner-image.jpg);">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Đăng ký</h3>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                                    </p>
                                </div>
                            </div>
            
                            <form action="/dangky" class="signup-form" method="post">
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Họ và tên</label>
                                    <input type="text" class="form-control" placeholder="Họ và tên" name="fullname" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="username">Tên đăng nhập</label>
                                    <input type="text" class="form-control" placeholder="Tên đăng nhập" name="user" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Mật khẩu</label>
                                    <input type="password" class="form-control" placeholder="Mật khẩu" name="pass" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Điện thoại</label>
                                    <input type="number" class="form-control" placeholder="Chỉ nhận số" name="phone" required>
                                </div>
                                <div class="form-group mb-3">
                                     <label class="label" for="avatar">Ảnh đại diện</label>
                                     <input type="file" class="form-control" name="file" >
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Email</label>
                                    <input type="email" class="form-control" placeholder="Phải đúng định dạng" name="emal" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Địa chỉ</label>
                                    <input type="text" class="form-control" placeholder="" name="address" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="dangky" class="form-control btn btn-primary rounded submit px-3" value="Đăng ký">
                                </div>
                            </form>
                            
                            <p class="text-center">Đã có tài khoản? <a href="/dangnhap">Đăng nhập</a></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Kết thúc nội dung thẻ <body> -->
</body>

</html>
