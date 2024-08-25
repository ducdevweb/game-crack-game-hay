<?php
use App\model\donhang;
$sp = new donhang();
$month = isset($_GET['thang']) ? $_GET['thang'] : 0;
if (isset($_GET['submit'])) {
    $month = $_GET['thang'];
}
$tongtien = 0;
$result = ($month != 0) ? $sp->get_donhang_chitiet($month) : $sp->getdon(); 
foreach ($result as $row) {
    $tongtien += isset($row['tongdh']) ? $row['tongdh'] : 0; 
}
?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Doanh thu</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/public/assets/css/tailwind.output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="/public/assets/js/init-alpine.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
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
    </style>
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Desktop sidebar -->
        <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
            <div class="py-4 text-gray-500 dark:text-gray-400">
                <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">Windmill</a>
                <ul class="mt-6">
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="/new_admin">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            <span class="ml-4">Dashboard</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="/quanly_taikhoan">
                            <span class="ml-4">Quản lý tài khoản</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="/quanly_sanpham">
                            <span class="ml-4">Quản lý sản phẩm</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="/quanly_donhangct">
                            <span class="ml-4">Quản lý đơn hàng</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="/quanly_donhang">
                            <span class="ml-4">Quản lý doanh thu</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="/dangxuat">
                            <span class="ml-4">Đăng xuất</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="flex flex-col flex-1 w-full">

            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <form method="get" action="">
                        <label for="thang">Chọn tháng:</label>
                        <select name="thang" id="thang">
                            <option value="0" <?= ($month == 0) ? 'selected' : '' ?>>Tất cả</option>
                            <?php for ($i = 1; $i <= 12; $i++) : ?>
                                <option value="<?= $i ?>" <?= ($month == $i) ? 'selected' : '' ?>>Tháng <?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                        <button type="submit" name="submit">Lọc</button>
                    </form>
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">STT</th>
                                        <th class="px-4 py-3">ID Đơn hàng</th>
                                        <th class="px-4 py-3">Ngày đặt</th>
                                        <th class="px-4 py-3">Tổng đơn hàng</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    <?php if ($result && is_array($result)) {
                                        foreach ($result as $index => $rc) { ?>
                                            <tr>
                                                <td><?= $index + 1 ?></td>
                                                <td><?= htmlspecialchars($rc['id_dh']) ?></td>
                                                <td><?= htmlspecialchars(date('d/m/Y', strtotime($rc['ngaydat']))) ?></td>
                                                <td><?= number_format($rc['tongdh'], 0, ',', '.') ?> USD</td>
                                            </tr>
                                        <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h2 class="text-lg font-semibold">Tổng doanh thu:</h2>
                        <p class="text-xl"><?= number_format($tongtien, 0, ',', '.') ?> USD</p>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
