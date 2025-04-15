<?php require_once '../app/views/layouts/header.php'?>

    <!-- Main Content -->
    <div class="flex-1 overflow-x-hidden bg-gray-50">
        <!-- Top Navigation -->
        <header class="bg-gradient-to-r from-purple-600 to-purple-800 shadow-md">
            <div class="container mx-auto py-6 px-4">
                <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                    <div class="flex items-center">
                        <h2 class="text-2xl font-bold text-white">Daftar Produk</h2>
                    </div>
                    <form action="<?= BASE_URL ?>/produk" method="GET" class="w-full md:w-auto">
                        <div class="flex items-center">
                            <div class="relative flex-grow">
                                <input
                                        type="text"
                                        name="keyword"
                                        value="<?= isset($data['keyword']) ? $data['keyword'] : '' ?>"
                                        placeholder="Cari produk..."
                                        class="w-full px-5 py-3 rounded-l-lg border-0 focus:outline-none focus:ring-2 focus:ring-purple-400 shadow-sm"
                                >
                                <i class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            </div>
                            <button type="submit" class="px-5 py-3 bg-purple-800 hover:bg-purple-900 text-white rounded-r-lg transition-colors duration-200 shadow-sm">
                                <i class="fas fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="container mx-auto p-4 md:p-6">
            <!-- Statistik -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Total Produk Card -->
                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center">
                        <div class="p-3 bg-purple-100 rounded-full mr-5">
                            <i class="fas fa-box text-purple-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-gray-600 text-sm font-medium uppercase tracking-wider">Total Produk</h3>
                            <p class="text-3xl font-bold text-purple-800 mt-1"><?= $data['total_produk'] ?></p>
                        </div>
                    </div>
                </div>

                <!-- Produk Terjual Card -->
                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center">
                        <div class="p-3 bg-purple-100 rounded-full mr-5">
                            <i class="fas fa-shopping-cart text-purple-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-gray-600 text-sm font-medium uppercase tracking-wider">Produk Terjual</h3>
                            <p class="text-3xl font-bold text-purple-800 mt-1"><?= $data['total_terjual'] ?></p>
                        </div>
                    </div>
                </div>

                <!-- Total Pendapatan Card -->
                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center">
                        <div class="p-3 bg-purple-100 rounded-full mr-5">
                            <i class="fas fa-money-bill-wave text-purple-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-gray-600 text-sm font-medium uppercase tracking-wider">Total Pendapatan</h3>
                            <p class="text-3xl font-bold text-purple-800 mt-1">Rp <?= number_format($data['total_pendapatan'],0,',','.') ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Management Section -->
            <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                <div class="flex flex-wrap justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 md:mb-0">
                        <span class="border-b-4 border-purple-500 pb-1">Kelola Produk</span>
                    </h2>
                    <a href="<?= BASE_URL ?>/produk/tambah" class="px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-all duration-200 flex items-center font-medium shadow-md hover:shadow-lg">
                        <i class="fas fa-plus mr-2"></i> Tambah Produk
                    </a>
                </div>

                <!-- Products Table -->
                <div class="overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Produk
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Harga
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Stok
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Terjual
                                </th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <?php foreach ($data['produks'] as $produk): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900"><?= $produk['nama_produk'] ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Rp <?= number_format($produk['harga_produk'],0,',','.') ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900"><?= $produk['stok'] ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900"><?= $produk['terjual'] ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="<?= BASE_URL ?>/produk/edit/<?= $produk['id'] ?>" class="text-pink hover:text-pink-dark mr-2"><i class="fas fa-edit"></i></a>
                                        <a href="<?= BASE_URL ?>/produk/delete/<?= $produk['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')" class="text-red-600 hover:text-red-900"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <div class="mt-6 flex justify-center">
                        <nav class="flex items-center space-x-2">
                            <?php if ($data['current_page'] > 1): ?>
                                <a href="<?= BASE_URL ?>/produk?page=<?= $data['current_page'] - 1 ?><?= isset($data['keyword']) && !empty($data['keyword']) ? '&keyword=' . $data['keyword'] : '' ?>" class="px-3 py-1 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $data['total_pages']; $i++): ?>
                                <a href="<?= BASE_URL ?>/produk?page=<?= $i ?><?= isset($data['keyword']) && !empty($data['keyword']) ? '&keyword=' . $data['keyword'] : '' ?>"
                                   class="px-3 py-1 <?= $i === $data['current_page'] ? 'bg-purple-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' ?> rounded-md">
                                    <?= $i ?>
                                </a>
                            <?php endfor; ?>

                            <?php if ($data['current_page'] < $data['total_pages']): ?>
                                <a href="<?= BASE_URL ?>/produk?page=<?= $data['current_page'] + 1 ?><?= isset($data['keyword']) && !empty($data['keyword']) ? '&keyword=' . $data['keyword'] : '' ?>" class="px-3 py-1 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            <?php endif; ?>
                        </nav>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('click', function(e) {
            if (e.target.closest('[onclick]')) {
                const message = e.target.getAttribute('onclick').match(/return confirm\('([^']+)'\)/)[1];
                if (!confirm(message)) {
                    e.preventDefault();
                }
            }
        });
    </script>

<?php require_once '../app/views/layouts/footer.php'?>
