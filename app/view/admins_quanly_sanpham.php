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
        .add-product-link {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            width: 300px;
            transition: background-color 0.3s;
        }

        .add-product-link:hover {
            background-color:  #0056b3;
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
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" href="/new_admin">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            <span class="ml-4">Dashboard</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
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
              <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="/doanhthu">
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
                    <!-- New Table -->
                    <a href="/addsp" class="add-product-link">Thêm sản phẩm</a>
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">STT</th>
                                        <th class="px-4 py-3">Mã sản phẩm</th>
                                  
                                        <th class="px-4 py-3">Hình sản phẩm</th>
                                        <th class="px-4 py-3">Tên sản phẩm</th>
                                        <th class="px-4 py-3">Giá sản phẩm</th>
                                        <th class="px-4 py-3">Số lượng</th>
                                        <th class="px-4 py-3">Trạng thái</th>
                                        <th class="px-4 py-3">Ngày đăng</th>
                                        <th class="px-4 py-3">Mô tả</th>
                                        <th class="px-4 py-3">Sửa</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    <?php
                                    use App\model\sanpham;
                                    $sp = new sanpham();

                                    $result = $sp->getdata();
                                    for ($i = 0; $i < count($result); $i++) {
                                        $rc = $result[$i];
                                    ?>
                                        <tr>
                                            <td><?= $i + 1 ?></td>
                                            <td><?= $rc['id_sp'] ?></td>
                                    
                                            <td><img src="/assets/images/<?= $rc['image'] ?>" alt="" width="100" height="100"></td>
                                            <td><?= $rc['Name'] ?></td>
                                            <td><?= $rc['Price'] ?></td>
                                            <td><?= $rc['Mount'] ?></td>
                                            <td>
                                                <?php
                                                if ($rc['an'] === 0) {
                                                    echo 'Chưa ẩn';
                                                } else {
                                                    echo 'Đã ẩn';
                                                }
                                                ?>
                                            </td>
                                            <td><?= $rc['Date_import'] ?></td>
                                            <td><?= $rc['Decribe'] ?></td>
                                            <td><a href="/upload_edit?id=<?= $rc['id_sp'] ?>">Sửa</a></td>
                                            <td><a href="/ansp?id=<?= $rc['id_sp'] ?>">Ẩn</a></td>
                                            <td><a href="/hiensp?id=<?= $rc['id_sp'] ?>">Hiện</a></td>
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
    </body>
</html>
