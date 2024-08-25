<?php
use App\model\donhang;
$sp = new donhang();
$result = $sp->getOne_dhct();
$month = isset($_GET['thang']) ? $_GET['thang'] : 0; 
if (isset($_GET['submit'])) {
    $month = $_GET['thang'];
}

$result = ($month != 0) ? $sp->get_donhang_chitiet($month) : $sp->getOne_dhct();
?>

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
        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .banner {
            background-color: #0071f8;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .flex {
            display: flex;
        }

        .flex-col {
            flex-direction: column;
        }

        .flex-1 {
            flex: 1;
        }

        .w-full {
            width: 100%;
        }

        .h-full {
            height: 100%;
        }

        .overflow-y-auto {
            overflow-y: auto;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table tr td {
            border: 1px solid #e2e8f0;
            padding: 8px;
            text-align: center;
        }

        table tr td:not(:last-child) {
            border-right: 1px solid #e2e8f0;
        }
    </style>
</head>

<body>
<div class="banner">
        <h1>Welcome to Your Dashboard</h1>
        <p>This is a fantastic dashboard to view your data.</p>
    </div>
        <div class="flex flex-col flex-1 w-full">
  
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                       <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
    <form method="get" action="">
    <label for="thang">Chọn tháng:</label>
    <select name="thang" id="thang">
        <option value="0" <?= ($month == 0) ? 'selected' : '' ?>>Tất cả</option>
        <?php for ($i = 1; $i <= 12; $i++) : ?>
            <option value="<?= $i ?>" <?= ($month == $i) ? 'selected' : '' ?>>Tháng <?= $i ?></option>
        <?php endfor; ?>
    </select>
    <input type="submit" name="submit" value="Lọc">
</form>

                                <thead>
                                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">STT</th>
                                        <th class="px-4 py-3">Mã đơn hàng</th>
                                        <th class="px-4 py-3">Địa chỉ</th>
                                        <th class="px-4 py-3">Người nhận</th>
                                        <th class="px-4 py-3">Email</th>
                                        <th class="px-4 py-3">Số điện thoại</th>
                                        <th class="px-4 py-3">Ngày đặt</th>
                                        <th class="px-4 py-3">Chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            <?php
                       
                                    for ($i = 0; $i < count($result); $i++) {
                                        $rc = $result[$i];
                                    ?>
                                        <tr>
                                            <td><?= $i + 1 ?></td>
                                            <td><?= $rc['id_dh'] ?></td>
                                            <td><?= $rc['diaChi'] ?></td>
                                            <td><?= $rc['nguoiNhan'] ?></td>
                                            <td><?= $rc['email'] ?></td>
                                            <td><?= $rc['sdt'] ?></td>
                                            <td><?= $rc['ngaydat'] ?></td>
                                            <td><a href="/ctd?id=<?= $rc['id_dh'] ?>">Chi tiết đơn</a></td>
                                        </tr>
                                    <?php
                                    }
                                
                                    ?>
                              
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <div><a href="/sanpham">Quay lại trang mua hàng</a></div>
</body>

</html>
