<?php
include_once(__DIR__ . "/header.php");
?>

<div class="page-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Search Results</h3>
            </div>
        </div>
    </div>
</div>

<div class="section trending">
    <div class="container">
        <div class="row trending-box">
            <?php foreach ($searchResults as $rc) { ?>
                <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 adv">
                    <div class="item">
                        <div class="thumb">
                            <a href="/chitiet?id=<?= $rc['id_sp'] ?>"><img src="/assets/images/<?= $rc['image'] ?>" alt="" width="300" height="300"></a>
                            <span class="price">
                                <?php
                                if ($rc['an'] == 0) {
                                    if ($rc['Mount'] > 0) {
                                        if ($rc['Sale'] != null) {
                                            echo ' <div>$' . $rc['Sale'] . '</div>';
                                            echo '<em>$' . $rc['Price'] . '</em>';
                                        } else {
                                            echo ' <div>$' . $rc['Price'] . '</div>';
                                        }
                                    } else {
                                        echo 'Out of Stock';
                                    }
                                } else {
                                    echo 'Admin Locked';
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
                                if ($rc['Mount'] > 0) {
                                    if ($rc['an'] === 0) {
                                        ?>
                                        <a href="/giohang?id=<?= $rc['id_sp'] ?>"><i class="fa fa-shopping-bag"></i></a>
                                    <?php
                                    } else {
                                        echo 'Admin Locked';
                                    }
                                } else {
                                    echo 'Out of Stock';
                                }
                            } else {
                                echo '<a href="/dangnhap">Login to buy</a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php
include_once(__DIR__ . "/footer.php");
?>
