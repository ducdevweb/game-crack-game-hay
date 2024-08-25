<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán</title>
    <link rel="stylesheet" href="/assets/css/checkout.css">
</head>

<body>
    <form action="/thanhtoan_if" method="post">
        <div class='container'>
            <div class='window'>
                <div class='order-info'>
                    <div class='order-info-content'>
                        <?php
                        @session_start();

                        $totalAmount = 0;
                        foreach ($_SESSION['giohang'] as $item) :
                        ?>
                            <div class='line'></div>
                            <table class='order-table'>
                                <tbody>
                                  
                                    <tr>
                                        <td>
                                            <img height="60px" width="100px" src="/assets/images/<?= $item[4] ?>" alt="<?= $item[1] ?>" readonly>
                                        </td>
                                        <td>
                                            <br> <span class='thin'><input type="text" value="<?= $item[1] ?>" name="giohang[<?= $item[0] ?>][ten]" readonly></span>
                                            <br> Giá: <br> <input type="number" value="<?= $item[2] ?>" name="giohang[<?= $item[0] ?>][gia]" readonly><br>
                                            <span class='thin small'> Số lượng: <input type="number" value="<?= $item[3] ?>" name="giohang[<?= $item[0] ?>][soluong]" readonly><br><br></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class='price'>Tiền hàng:$ <?php $subtotal = $item[2] * $item[3]; ?>
                                                <span><?= $subtotal ?></span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class='line'></div>
                        <?php $totalAmount += $subtotal ?>
                        <?php endforeach; ?>
                        <div style="color:red">
                            <span> Tổng tiền:$<?= $totalAmount ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class='credit-info'>
                 
                    <div class='credit-info-content'>
                        <img src='/assets/images/trending-02.jpg' height='200' width="300" class='credit-card-image' id='credit-card-image'></img>
                        <span> Địa chỉ nhận hàng</span>
                        <input class='input-field' required type="text" name="diachi" value="<?php echo isset($_SESSION['objuser']['address']) ? $_SESSION['objuser']['address'] : ''; ?>">                                                
                        <span> Họ tên người nhận</span>
                        <input class='input-field' required type="text" name="ten" value="<?php echo isset($_SESSION['objuser']['fullname']) ? $_SESSION['objuser']['fullname'] : ''; ?>">                                             
                        <span> Email</span>
                        <input class='input-field' required type="text" name="Email" value="<?php echo isset($_SESSION['objuser']['email']) ? $_SESSION['objuser']['email'] : ''; ?>">                                               
                        <span> Số điện thoại</span>
                        <input class='input-field' required type="number" name="phone" value="<?php echo isset($_SESSION['objuser']['phone']) ? $_SESSION['objuser']['phone'] : ''; ?>">
    
                        <input class='input-field' hidden type="text" name="trangthai" value="Chưa nhận hàng" readonly>
                        <input class='input-field' hidden type="text" name="hanhtrinh" value="Chưa nhận hàng" readonly>
                        <span> Phương thức thanh toán</span>
                        <table class='half-input-table' border="2px solid black">
                            <tr>
                                <td> Trả khi nhận hàng
                                    <input class='input-field' type="radio" name="tt" value="Trả khi nhận hàng" required>
                                </td>
                                <td>Trả thẻ
                                    <input class='input-field' type="radio" name="tt" value="Trả thẻ" required>
                                </td>
                            </tr>
                        </table>
                        <div class="cach">
                            <button class='pay-btn' type="submit">Thanh toán</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
