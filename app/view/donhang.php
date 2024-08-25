
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Windmill Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/public/assets/css/tailwind.output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="/public/assets/js/init-alpine.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="/public/assets/js/charts-lines.js" defer></script>
    <script src="/public/assets/js/charts-pie.js" defer></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table tr td {
            border: 1px solid #e2e8f0;
            padding: 8px;
        }

        table tr td:not(:last-child) {
            border-right: 1px solid #e2e8f0;
        }

        img{
            width: 900px;
            height: 300px;
            margin-left: 300px;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>
    <img src="/assets/images/trending-01.jpg" alt="">
    
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Desktop sidebar -->
        <div class="flex flex-col flex-1 w-full">
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <!-- Table for Order Details -->
                    <div class="w-full overflow-hidden rounded-lg shadow-xs mt-6">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap mb-6">
                                <thead>
                                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        
                                        <th class="px-4 py-3">Họ tên</th>
                                        <th class="px-4 py-3">Email</th>
                                        <th class="px-4 py-3">Số điện thoại</th>
                                        <th class="px-4 py-3">Địa chỉ</th>
                                        <th class="px-4 py-3">Tên sản phẩm</th>
                                        <th class="px-4 py-3">Giá sản phẩm</th>
                                        <th class="px-4 py-3">Số lượng mua</th>
                                        <th class="px-4 py-3">Tổng đơn hàng</th>
                                        <th class="px-4 py-3">Hành trình</th>
                                        <th class="px-4 py-3">Ngày đặt</th>
                                       
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                   
                                    <tr>
                                        <td><?= $sp[0]['ho_ten'] ?></td>
                                        <td><?= $sp[0]['email'] ?></td>
                                        <td><?= $sp[0]['sodienthoai'] ?></td>
                                        <td><?= $sp[0]['dia_chi'] ?></td>
                                        <td><?= $sp[0]['ten_sp'] ?></td>
                                        <td><?= $sp[0]['gia_sp'] ?></td>
                                        <td><?= $sp[0]['soluong'] ?></td>
                                        <td><?= $sp[0]['tongdh'] ?></td>
                                        <?php
                                        if ($sp[0]['hanh_trinh'] == 0) {
                                            echo ' <td>Đã nhận đơn</td>';
                                        } else if ($sp[0]['hanh_trinh'] == 1) {
                                            echo ' <td>Đã giao đến kho</td>';
                                        } else if ($sp[0]['hanh_trinh'] == 2) {
                                            echo ' <td>Đã giao cho shipper</td>';
                                        } else {
                                            echo ' <td>Đã hoàn thành giao hàng</td>';
                                        }
                                        ?>
                                        <td><?= $sp[0]['ngaydat'] ?></td>

                                    </tr>
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <a  href="/donhang?id=<?=$_SESSION['objuser']['id_user'] ?>">Quay lại</a>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
