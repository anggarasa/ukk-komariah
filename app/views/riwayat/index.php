<?php require_once '../app/views/layouts/header.php'?>

    <div class="container mx-auto px-4 py-8 max-w-6xl" x-data="{
        show: false,
        transaksi: null,
        detailItems: [],
        showModal(id) {
            this.show = true;
            this.fetchDetail(id);
        },
        fetchDetail(id) {
            fetch(`<?= BASE_URL ?>/riwayat/detail/${id}`)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        this.transaksi = data.transaksi;
                        this.detailItems = Array.isArray(data.data) ? data.data : [data.data];
                    } else {
                        alert(data.message);
                        this.show = false;
                    }
                })
                .catch(error => {
                    console.error('Error fetching detail:', error);
                    alert('Gagal mengambil data transaksi.');
                    this.show = false;
                });
        }
    }">
        <!-- Modern Header Card with Purple Gradient -->
        <div class="rounded-xl bg-gradient-to-r from-purple-600 to-indigo-700 p-6 shadow-lg mb-8 transform hover:scale-[1.01] transition-all duration-300">
            <div class="flex flex-col md:flex-row md:items-center justify-between">
                <div class="flex items-center mb-4 md:mb-0">
                    <div class="bg-white p-3 rounded-full shadow-md mr-4">
                        <i class="fas fa-history text-purple-600 text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-white">Riwayat Transaksi</h1>
                        <p class="text-purple-200 text-sm">Daftar seluruh transaksi yang telah dilakukan</p>
                    </div>
                </div>
                <form action="<?= BASE_URL ?>/riwayat/search" method="post" class="flex flex-col sm:flex-row gap-3">
                    <div class="relative">
                        <input type="text" name="keyword" placeholder="Cari transaksi..."
                               value="<?= isset($data['keyword']) ? $data['keyword'] : '' ?>"
                               class="pl-10 pr-4 py-3 rounded-lg border border-purple-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent w-full sm:w-64 shadow-sm text-gray-700">
                        <i class="fas fa-search absolute left-3 top-3.5 text-purple-400"></i>
                    </div>
                    <button type="submit" class="bg-white text-purple-700 font-medium px-4 py-3 text-center rounded-lg hover:bg-purple-50 transition duration-300 shadow-sm">
                        <i class="fas fa-search mr-1"></i> Cari
                    </button>
                    <?php if(isset($data['keyword']) && !empty($data['keyword'])): ?>
                        <a href="<?= BASE_URL ?>/riwayat" class="bg-purple-800 px-4 py-3 text-center text-white rounded-lg hover:bg-purple-900 transition duration-300 shadow-sm">
                            <i class="fas fa-undo mr-1"></i> Reset
                        </a>
                    <?php endif; ?>
                </form>
            </div>
        </div>

        <!-- Stats Cards Row -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-purple-500 hover:shadow-lg transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Total Transaksi</p>
                        <h3 class="text-2xl font-bold text-gray-800"><?= count($data['transaksis']) ?></h3>
                    </div>
                    <div class="bg-purple-100 p-3 rounded-full">
                        <i class="fas fa-receipt text-purple-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-indigo-500 hover:shadow-lg transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Transaksi Bulan Ini</p>
                        <h3 class="text-2xl font-bold text-gray-800">
                            <?php
                            $currentMonth = 0;
                            foreach ($data['transaksis'] as $t) {
                                $transDate = new DateTime($t['tgl_transaksi']);
                                if ($transDate->format('m') == date('m')) $currentMonth++;
                            }
                            echo $currentMonth;
                            ?>
                        </h3>
                    </div>
                    <div class="bg-indigo-100 p-3 rounded-full">
                        <i class="fas fa-calendar-alt text-indigo-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-violet-500 hover:shadow-lg transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Total Pendapatan</p>
                        <h3 class="text-2xl font-bold text-gray-800">
                            <?php
                            $total = 0;
                            foreach ($data['transaksis'] as $t) {
                                $total += $t['total_harga'];
                            }
                            echo 'Rp ' . number_format($total, 0, ',', '.');
                            ?>
                        </h3>
                    </div>
                    <div class="bg-violet-100 p-3 rounded-full">
                        <i class="fas fa-coins text-violet-600 text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Desktop Table with Purple Theme -->
        <div class="hidden md:block bg-white rounded-xl shadow-lg overflow-hidden mb-8 border border-purple-100">
            <table class="w-full">
                <thead>
                <tr class="bg-gradient-to-r from-purple-600 to-indigo-700 text-white">
                    <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">Pelanggan</th>
                    <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">Total Harga</th>
                    <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">Pembayaran</th>
                    <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">Kembalian</th>
                    <th class="px-6 py-4 text-right text-xs font-medium uppercase tracking-wider">Aksi</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-purple-100">
                <?php if (empty($data['transaksis'])): ?>
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-search text-4xl text-purple-200 mb-3"></i>
                                <p class="font-medium">Tidak ada data transaksi ditemukan</p>
                                <p class="text-sm text-gray-400 mt-1">Silakan coba pencarian lain atau reset filter</p>
                            </div>
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($data['transaksis'] as $transaksi): ?>
                        <tr class="hover:bg-purple-50 transition duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                <div class="flex items-center">
                                    <i class="fas fa-calendar-day text-purple-400 mr-2"></i>
                                    <?= date('d M Y', strtotime($transaksi['tgl_transaksi'])) ?>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 bg-purple-100 rounded-full flex items-center justify-center mr-2">
                                        <i class="fas fa-user text-purple-500"></i>
                                    </div>
                                    <?= $transaksi['nama_pelanggan'] ?>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                Rp <?= number_format($transaksi['total_harga'], 0, ',', '.') ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                Rp <?= number_format($transaksi['uang_diberikan'], 0, ',', '.') ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                Rp <?= number_format($transaksi['kembalian'], 0, ',', '.') ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button
                                        @click="showModal(<?= $transaksi['transaksi_id'] ?>)"
                                        class="bg-purple-100 hover:bg-purple-200 text-purple-700 px-3 py-1 rounded-full flex items-center justify-center space-x-1 transition duration-200 ml-auto">
                                    <i class="fas fa-eye text-xs"></i>
                                    <span>Detail</span>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Mobile Card View -->
        <div class="md:hidden space-y-4">
            <?php if (empty($data['transaksis'])): ?>
                <div class="bg-white rounded-xl shadow p-8 text-center">
                    <i class="fas fa-search text-4xl text-purple-200 mb-3"></i>
                    <p class="font-medium text-gray-600">Tidak ada data transaksi ditemukan</p>
                    <p class="text-sm text-gray-400 mt-1">Silakan coba pencarian lain atau reset filter</p>
                </div>
            <?php else: ?>
                <?php foreach ($data['transaksis'] as $transaksi): ?>
                    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-purple-100 hover:shadow-lg transition duration-300">
                        <div class="bg-gradient-to-r from-purple-600 to-indigo-700 px-4 py-3 flex justify-between items-center">
                            <div class="flex items-center">
                                <div class="h-8 w-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center mr-2">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                                <div>
                                    <p class="text-white font-medium"><?= $transaksi['nama_pelanggan'] ?></p>
                                    <p class="text-purple-200 text-xs">ID: #<?= $transaksi['transaksi_id'] ?></p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-xs text-purple-200"><?= date('d M Y', strtotime($transaksi['tgl_transaksi'])) ?></p>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="grid grid-cols-2 gap-3 mb-4">
                                <div>
                                    <p class="text-gray-500 text-xs">Total Harga</p>
                                    <p class="font-semibold text-gray-800">Rp <?= number_format($transaksi['total_harga'], 0, ',', '.') ?></p>
                                </div>
                                <div>
                                    <p class="text-gray-500 text-xs">Pembayaran</p>
                                    <p class="font-semibold text-gray-800">Rp <?= number_format($transaksi['uang_diberikan'], 0, ',', '.') ?></p>
                                </div>
                                <div>
                                    <p class="text-gray-500 text-xs">Kembalian</p>
                                    <p class="font-semibold text-gray-800">Rp <?= number_format($transaksi['kembalian'], 0, ',', '.') ?></p>
                                </div>
                                <div>
                                    <p class="text-gray-500 text-xs">Status</p>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <span class="w-1.5 h-1.5 mr-1.5 rounded-full bg-green-500"></span>
                                    Lunas
                                </span>
                                </div>
                            </div>
                            <button
                                    @click="showModal(<?= $transaksi['transaksi_id'] ?>)"
                                    class="w-full bg-purple-100 hover:bg-purple-200 text-purple-700 font-medium py-2 rounded-lg transition duration-200 flex items-center justify-center">
                                <i class="fas fa-file-invoice mr-2"></i> Lihat Detail Transaksi
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <div class="mt-6 flex justify-center">
            <div class="flex flex-wrap items-center space-x-1">
                <?php if($data['current_page'] > 1): ?>
                    <!-- Previous Page Button -->
                    <?php if(isset($data['keyword']) && !empty($data['keyword'])): ?>
                        <form action="<?= BASE_URL ?>/riwayat/search" method="post">
                            <input type="hidden" name="keyword" value="<?= $data['keyword'] ?>">
                            <input type="hidden" name="page" value="<?= $data['current_page'] - 1 ?>">
                            <button type="submit" class="px-4 py-2 bg-purple-100 text-purple-700 rounded-lg hover:bg-purple-200">
                                <i class="fas fa-chevron-left mr-1"></i> Prev
                            </button>
                        </form>
                    <?php else: ?>
                        <a href="<?= BASE_URL ?>/riwayat/index/<?= $data['current_page'] - 1 ?>" class="px-4 py-2 bg-purple-100 text-purple-700 rounded-lg hover:bg-purple-200">
                            <i class="fas fa-chevron-left mr-1"></i> Prev
                        </a>
                    <?php endif; ?>
                <?php endif; ?>

                <!-- Page Numbers -->
                <?php
                $start_page = max(1, $data['current_page'] - 2);
                $end_page = min($data['total_pages'], $data['current_page'] + 2);

                for($i = $start_page; $i <= $end_page; $i++):
                    ?>
                    <?php if($i == $data['current_page']): ?>
                    <span class="px-4 py-2 bg-purple-600 text-white rounded-lg">
                    <?= $i ?>
                </span>
                <?php else: ?>
                    <?php if(isset($data['keyword']) && !empty($data['keyword'])): ?>
                        <form action="<?= BASE_URL ?>/riwayat/search" method="post" class="inline">
                            <input type="hidden" name="keyword" value="<?= $data['keyword'] ?>">
                            <input type="hidden" name="page" value="<?= $i ?>">
                            <button type="submit" class="px-4 py-2 bg-white border border-purple-300 text-purple-700 rounded-lg hover:bg-purple-50">
                                <?= $i ?>
                            </button>
                        </form>
                    <?php else: ?>
                        <a href="<?= BASE_URL ?>/riwayat/index/<?= $i ?>" class="px-4 py-2 bg-white border border-purple-300 text-purple-700 rounded-lg hover:bg-purple-50">
                            <?= $i ?>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
                <?php endfor; ?>

                <?php if($data['current_page'] < $data['total_pages']): ?>
                    <!-- Next Page Button -->
                    <?php if(isset($data['keyword']) && !empty($data['keyword'])): ?>
                        <form action="<?= BASE_URL ?>/riwayat/search" method="post">
                            <input type="hidden" name="keyword" value="<?= $data['keyword'] ?>">
                            <input type="hidden" name="page" value="<?= $data['current_page'] + 1 ?>">
                            <button type="submit" class="px-4 py-2 bg-purple-100 text-purple-700 rounded-lg hover:bg-purple-200">
                                Next <i class="fas fa-chevron-right ml-1"></i>
                            </button>
                        </form>
                    <?php else: ?>
                        <a href="<?= BASE_URL ?>/riwayat/index/<?= $data['current_page'] + 1 ?>" class="px-4 py-2 bg-purple-100 text-purple-700 rounded-lg hover:bg-purple-200">
                            Next <i class="fas fa-chevron-right ml-1"></i>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>

        <!-- Pagination Info -->
        <div class="text-center text-gray-500 mt-2">
            <p>Showing page <?= $data['current_page'] ?> of <?= $data['total_pages'] ?> (Total: <?= $data['total_data'] ?> records)</p>
        </div>

        <!-- Detail Modal -->
        <div x-show="show" x-cloak class="fixed inset-0 z-50 overflow-y-auto" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div @click="show = false" class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
                </div>

                <div x-show="show" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                    <div class="absolute top-0 right-0 pt-4 pr-4">
                        <button @click="show = false" type="button" class="text-gray-400 hover:text-gray-500 focus:outline-none">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>
                    <div>
                        <div class="bg-gradient-to-r from-purple-600 to-indigo-700 -mx-4 -mt-5 px-6 py-4 rounded-t-lg">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg leading-6 font-medium text-white" id="modal-title">
                                    Detail Transaksi
                                </h3>
                                <span class="bg-white bg-opacity-20 px-2 py-1 rounded-md text-xs text-white" x-text="'ID: #' + (transaksi ? transaksi.transaksi_id : '')"></span>
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="bg-purple-50 rounded-lg p-4 mb-4">
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <p class="text-xs text-gray-500">Tanggal</p>
                                        <p class="font-medium" x-text="transaksi ? new Date(transaksi.tgl_transaksi).toLocaleString('id-ID', {day: 'numeric', month: 'long', year: 'numeric'}) : ''"></p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Pelanggan</p>
                                        <p class="font-medium" x-text="transaksi ? transaksi.nama_pelanggan : ''"></p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Total Harga</p>
                                        <p class="font-medium" x-text="transaksi ? 'Rp ' + new Intl.NumberFormat('id-ID').format(transaksi.total_harga) : ''"></p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Pembayaran</p>
                                        <p class="font-medium" x-text="transaksi ? 'Rp ' + new Intl.NumberFormat('id-ID').format(transaksi.uang_diberikan) : ''"></p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Kembalian</p>
                                        <p class="font-medium" x-text="transaksi ? 'Rp ' + new Intl.NumberFormat('id-ID').format(transaksi.kembalian) : ''"></p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Status</p>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <span class="w-1.5 h-1.5 mr-1.5 rounded-full bg-green-500"></span>
                                        Lunas
                                    </span>
                                    </div>
                                </div>
                            </div>

                            <p class="font-medium text-gray-700 mb-2">Items:</p>
                            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                                <div class="divide-y divide-gray-200">
                                    <template x-for="(item, index) in detailItems" :key="index">
                                        <div class="p-3 hover:bg-gray-50">
                                            <div class="flex justify-between items-start">
                                                <div>
                                                    <p class="font-medium text-gray-800" x-text="item.nama_produk"></p>
                                                    <div class="flex items-center text-sm text-gray-500">
                                                        <span x-text="item.jumlah + ' x'"></span>
                                                        <span class="mx-1">Rp</span>
                                                        <span x-text="new Intl.NumberFormat('id-ID').format(item.harga_satuan)"></span>
                                                    </div>
                                                </div>
                                                <p class="font-semibold text-gray-900" x-text="'Rp ' + new Intl.NumberFormat('id-ID').format(item.subtotal)"></p>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <button @click="show = false" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-transparent rounded-md hover:bg-gray-200 focus:outline-none">
                                Tutup
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        [x-cloak] { display: none !important; }
    </style>

<?php require_once '../app/views/layouts/footer.php'?>
