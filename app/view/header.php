
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Lugx Gaming Shop HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/csss/bootstrap.min.css">
    <link rel="stylesheet" href="assets/csss/style.css">
    <link rel="stylesheet" href="assets/csss/tiny-slider.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-lugx-gaming.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="/public/vendor/bootstrap/css/checkOut.css">
<!--

TemplateMo 589 lugx gaming

https://templatemo.com/tm-589-lugx-gaming

-->

  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->
<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="/" class="logo">
                        <img src="assets/images/logo.png" alt="" style="width: 158px;">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="/" class="active">Trang chủ</a></li>
                        <li><a href="/sanpham">Sản phẩm</a></li>
                        <li><a href="/giohang">Giỏ hàng</a></li>
                         <?php
                        
                        @session_start();
                        if (isset($_SESSION['objuser'])) {?>
                            <li><a href="/donhang?id=<?=$_SESSION['objuser']['id_user'] ?>" class="logout">Đơn hàng </a></li>
                            <li><a href="/canhan?id=<?=$_SESSION['objuser']['id_user']?>" class="logout">Xin chào: <?=$_SESSION['objuser']['fullname']?> </a></li>
                            <li><a href="/dangxuat" class="logout">Đăng xuất</a></li>
                        <?php  
                        } else {
                            echo '<li><a href="/dangnhap">Đăng Nhập</a></li>';
                            echo '<li><a href="/dangky">Đăng Ký</a></li>';
                        }
                        ?>

                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->
