<?php
use App\model\sanpham;
$records =8;
$pages = 0;
$page = 1;

if (isset($_REQUEST['txtPage'])) {
    $page = $_REQUEST['txtPage'];
}

$sps = new sanpham();
$listitems = $sps->getdata2();
$mode = count($listitems) % $records;

if ($mode > 0) {
    $pages = (count($listitems) - $mode) / $records + 1;
} else {
    $pages = count($listitems) / $records;
}

if ($page > $pages) {
    $page = 1;
}

$limits = $records * $page;
$st = $limits - $records;
$listitems = $sps->getdata_limit($st, $records);
?>
<style>
    
</style>
<div class="page-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Our Shop</h3>
              
                <span class="breadcrumb"><a href="/">Home</a> > Our Shop</span>
            </div>
        </div>
    </div>
</div>

<div class="section trending">
    <div class="container">
        <ul class="trending-filter">
            <li><a class="is_active" href="#!" data-filter="*">Show All</a></li>
            <li><a href="#!" data-filter=".adv">Adventure</a></li>
            <li><a href="#!" data-filter=".str">Shoting 3D</a></li>
            <li><a href="#!" data-filter=".rac">Fighting </a></li>
            <p>
                <form action="/timkiem" method="post">
                <input type="text" placeholder="Tìm kiếm sản phẩm" name="noidung">
                <input type="submit" name="timkiem" value="Tìm kiếm">
                </form>
        </p>
        </ul>
        
        <div class="row trending-box">
     
        <?php
    for ($i = 0; $i < count($listitems); $i++) {
        $rc = $listitems[$i];
        if ($rc['an'] == 1) {
            continue; 
        }
?>
    <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 adv">
        <div class="item">
            <div class="thumb">
                <a href="/chitiet?id=<?= $rc['id_sp'] ?>"><img src="/assets/images/<?= $rc['image'] ?>" alt="" width="300" height="300"></a>
                <span class="price">
                    <?php
                        if ($rc['Mount'] > 0) {
                            if ($rc['Sale'] != null) {
                                echo '<div>$'.$rc['Sale'] .'</div>';
                                echo '<em>$' . $rc['Price'] . '</em>';
                            } else {
                                echo '<div>$'.$rc['Price'] .'</div>';
                            }
                        } else {
                            echo 'Đã hết hàng';
                        }
                    ?>
                </span>
            </div>
            <div class="down-content">
                <?php
                    if (array_key_exists('Category', $rc)) {
                        echo '<span class="category">' . $rc['Category'] . '</span>';
                    }
                ?>
                <h4><?= $rc['Name'] ?></h4>
                <?php
                    if (isset($_SESSION['objuser'])) {
                        if ($rc['Mount'] > 0) { ?>
                            <a href="/giohang?id=<?= $rc['id_sp'] ?>"><i class="fa fa-shopping-bag"></i></a>
                        <?php } else {
                            echo 'Đã hết hàng';
                        }
                    } else {
                        echo '<a href="/dangnhap">Đăng nhập mới cho mua</a>';
                    }
                ?>
            </div>
        </div>
    </div>
<?php
    }
?>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <ul class="pagination">
    <?php
    for ($i = 1; $i <= $pages; $i++) {
        echo '<li><a href="?txtPage=' . $i . '">' . $i . '</a></li>';
    }
    ?>
</ul>

            </div>
        </div>
    </div>
</div>