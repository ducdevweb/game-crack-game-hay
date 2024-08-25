<div class="untree_co-section before-footer-section">
    <div class="container">
        <div class="row mb-5">
            <form class="col-md-12" method="post">
                <div class="site-blocks-table">
                <?php if (isset($_SESSION['giohang']) && is_array($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) : ?>
                <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Stt</th>
                                    <th class="product-name">Hình ảnh</th>
                                    <th class="product-total">Tên</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product-quantity">Số lượng</th>
                                    <th class="product-total">Tổng</th>
                                    <th class="product-total">Sửa</th>
                                    <th class="product-remove">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                    $totalAmount = 0;
                                    foreach ($_SESSION['giohang'] as $i => $item) {
                                        $subtotal = $item[2] * $item[3];
                                        $totalAmount += $subtotal;
                            ?>
                                    <tr>
                                        <td class="product-thumbnail"><?= $i + 1 ?></td>
                                        <td class="product-name">
                                            <?php if (isset($item[4])) : ?>
                                                <img height="60px" width="100px" src="/assets/images/<?= $item[4] ?>">
                                            <?php endif; ?>
                                        </td>
                                        <td class="product-name"><?= isset($item[1]) ? $item[1] : '' ?></td>
                                        <td class="product-price"><?= isset($item[2]) ? $item[2] : '' ?></td>
                                        <form action="/giohang_info" enctype="multipart/form-data" method="post">
                                            <td class="product-quantity">
                                                <input type="number" name="soluong" value="<?= isset($item[3]) ? $item[3] : 0 ?>" min="0" max="100">
                                                <input type="hidden" name="id_edit" value="<?= isset($item[0]) ? $item[0] : '' ?>">
                                            </td>
                                            <td class="product-name"><?= isset($item[2]) && isset($item[3]) ? ($item[2] * $item[3]) : '' ?></td>
                                            <td><input type="submit" name="Edit" value="Sửa"></td>
                                        </form>
                                        <td class="product-remove">
                                            <a href="/giohang?del=<?= isset($item[0]) ? $item[0] : '' ?>">
                                                <input class="btn btn-sm btn-danger" type="button" value="Delete">
                                            </a>
                                        </td>
                                    </tr>
                            <?php
                            echo $item[0];
                                    }
                            ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <p>Không có sản phẩm trong giỏ hàng.</p>
                    <?php endif; ?>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row mb-5">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <button class="btn btn-black btn-sm btn-block">Update Cart</button>
                    </div>
                    <div class="col-md-6">
                      <form action="/sanpham" method="get">
                       <button type="submit" class="btn btn-outline-black btn-sm btn-block">Continue Shopping</button>
                     </form>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="text-black h4" for="coupon">Coupon</label>
                        <p>Enter your coupon code if you have one.</p>
                    </div>
                    <div class="col-md-8 mb-3 mb-md-0">
                        <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-black">Apply Coupon</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pl-5">
                <div class="row justify-content-end">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12 text-right border-bottom mb-5">
                                <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                            </div>
                        </div>
                        <div class="row mb-3">
                           
                        </div>
            <div class="row mb-5">
                 <div class="col-md-6">
                    <span class="text-black">Total Amount</span>
                              </div>
                                 <div class="col-md-6 text-right">
                                <strong class="text-black">$<?php 
                               if (isset($_SESSION['giohang']) && is_array($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
                                 
                                echo number_format($totalAmount, 2); 
                            
                                }?></strong>
                                 </div>
            </div>
                            </div>
                        </div>

                        <div class="row">
                         
                            <div class="col-md-12">
                         <a href="/checkOut" class="btn btn-black btn-lg py-3 btn-block">Proceed To Checkout</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>
    