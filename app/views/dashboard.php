<?php require_once 'layouts/header.php'?>

<!-- Dashboard Container -->
<div class="bg-gradient-to-br from-purple-50 to-purple-100 p-6 rounded-xl">
    <!-- Header with Animation -->
    <div class="mb-8 bg-white p-6 rounded-xl shadow-md transform transition-all hover:scale-[1.01] border-l-4 border-purple-600">
        <h1 class="text-3xl font-bold text-purple-800 mb-2">Dashboard</h1>
        <p class="text-gray-600 text-lg">Selamat datang kembali, <span class="font-semibold text-purple-600">Admin!</span></p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Penjualan Card -->
        <div class="bg-white rounded-xl shadow-md p-6 transition-all hover:shadow-lg hover:translate-y-[-5px] border-t-4 border-purple-600">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-purple-500 text-sm font-medium uppercase tracking-wider mb-1">Total Penjualan</p>
                    <h3 class="text-2xl font-bold text-gray-800">Rp <?= number_format($data['total_pendapatan']['total_pendapatan'],0,',','.') ?></h3>
                </div>
                <div class="bg-purple-100 p-3 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="pt-2 mt-2 border-t border-gray-100">
                <p class="text-xs text-purple-500 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                    Laporan Terkini
                </p>
            </div>
        </div>

        <!-- Transaksi Card -->
        <div class="bg-white rounded-xl shadow-md p-6 transition-all hover:shadow-lg hover:translate-y-[-5px] border-t-4 border-purple-600">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-purple-500 text-sm font-medium uppercase tracking-wider mb-1">Transaksi</p>
                    <h3 class="text-2xl font-bold text-gray-800"><?= $data['jumlah_transaksi']['jumlah_transaksi'] ?? 0 ?></h3>
                </div>
                <div class="bg-purple-100 p-3 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
            </div>
            <div class="pt-2 mt-2 border-t border-gray-100">
                <p class="text-xs text-purple-500 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                    Terus Meningkat
                </p>
            </div>
        </div>

        <!-- Pelanggan Card -->
        <div class="bg-white rounded-xl shadow-md p-6 transition-all hover:shadow-lg hover:translate-y-[-5px] border-t-4 border-purple-600">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-purple-500 text-sm font-medium uppercase tracking-wider mb-1">Pelanggan</p>
                    <h3 class="text-2xl font-bold text-gray-800"><?= $data['pelanggan_baru']['pelanggan_baru'] ?></h3>
                </div>
                <div class="bg-purple-100 p-3 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
            </div>
            <div class="pt-2 mt-2 border-t border-gray-100">
                <p class="text-xs text-purple-500 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                    Pelanggan Baru
                </p>
            </div>
        </div>

        <!-- Produk Terjual Card -->
        <div class="bg-white rounded-xl shadow-md p-6 transition-all hover:shadow-lg hover:translate-y-[-5px] border-t-4 border-purple-600">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-purple-500 text-sm font-medium uppercase tracking-wider mb-1">Produk Terjual</p>
                    <h3 class="text-2xl font-bold text-gray-800"><?= $data['produk_terjual']['produk_terjual'] ?? 0 ?></h3>
                </div>
                <div class="bg-purple-100 p-3 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
            </div>
            <div class="pt-2 mt-2 border-t border-gray-100">
                <p class="text-xs text-purple-500 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                    Pencapaian Terbaik
                </p>
            </div>
        </div>
    </div>

    <!-- Products & Customers -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-all">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-purple-800">Produk Terlaris</h3>
                <a href="<?= BASE_URL?>/produk" class="bg-purple-100 text-purple-600 hover:bg-purple-200 py-1 px-3 rounded-lg text-sm font-medium transition-colors">
                    Lihat Semua
                </a>
            </div>
            <!-- Content untuk produk terbaru akan ditampilkan di sini -->
            <div class="space-y-4 mt-4">
                <?php foreach ($data['produk_terlaris'] as $index => $terlaris):  ?>
                        <div class="flex items-center">
                            <div class="h-12 w-12 rounded-full bg-primary/10 flex items-center justify-center text-primary font-semibold mr-4">
                                <?= $index + 1 ?>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm font-medium text-gray-800"><?= $terlaris['nama_produk'] ?></h4>
                            </div>
                            <div class="text-right">
                                <span class="text-sm font-medium text-gray-800"><?= $terlaris['total_terjual'] ?> terjual</span>
                            </div>
                        </div>
                    <?php endforeach; ?>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-all">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-purple-800">Tranasksi Terbaru</h3>
                <a href="<?= BASE_URL ?>/riwayat" class="bg-purple-100 text-purple-600 hover:bg-purple-200 py-1 px-3 rounded-lg text-sm font-medium transition-colors">
                    Lihat Semua
                </a>
            </div>
            <!-- Content untuk pelanggan teratas akan ditampilkan di sini -->
            <div class="space-y-4 mt-4">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                        <tr class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <th class="pb-3 pr-6">Produk</th>
                            <th class="pb-3 pr-6">Tanggal</th>
                            <th class="pb-3">Total</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                        <?php foreach ($data['transaksi_terbaru'] as $index => $terbaru): ?>
                            <tr>
                                <td class="py-3 pr-6">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 flex-shrink-0 bg-purple-100 rounded-lg flex items-center justify-center">
                                            <span class="text-primary text-xs font-bold">P<?= $terbaru['id'] ?></span>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-800"><?= $terbaru['nama_pelanggan'] ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 pr-6">
                                    <span class="text-sm text-gray-600"><?= date('d/m/y', strtotime($terbaru['tgl_transaksi'])) ?></span>
                                </td>
                                <td class="py-3">
                                    <span class="text-sm font-medium text-gray-800">Rp <?= number_format($terbaru['total_harga'],0,',','.') ?></span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'layouts/footer.php'?>
