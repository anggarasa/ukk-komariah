<?php require_once '../app/views/layouts/header.php'?>

<!-- Main container with purple gradient background -->
<div class="bg-gradient-to-br from-purple-100 to-white rounded-xl shadow-lg p-6 mb-8"
     x-data="{
        show: false,
        pelanggan: null,
        showModal(id) {
            this.show = true;
            this.fetchDetail(id);
        },
        fetchDetail(id) {
            fetch(`<?= BASE_URL ?>/pelanggan/detail/${id}`)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        this.pelanggan = data.data;
                    } else {
                        alert(data.message);
                        this.show = false;
                    }
                })
                .catch(error => {
                    console.error('Error fetching detail:', error);
                    alert('Gagal mengambil data pelanggan.');
                    this.show = false;
                });
        }
     }">
    <!-- Header section with modern style -->
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8">
        <div class="flex items-center mb-4 md:mb-0">
            <i class="fas fa-users text-purple-600 text-3xl mr-3"></i>
            <h1 class="text-2xl font-bold text-purple-800">Data Pelanggan</h1>
        </div>
        <div class="flex flex-col sm:flex-row gap-3">
            <!-- Search form with improved styling -->
            <form action="<?= BASE_URL ?>/pelanggan" method="GET" class="flex flex-col sm:flex-row gap-3">
                <div class="relative">
                    <input type="text" name="keyword" placeholder="Cari pelanggan..."
                           value="<?= isset($data['keyword']) ? htmlspecialchars($data['keyword']) : '' ?>"
                           class="pl-10 pr-4 py-2 border border-purple-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent shadow-sm transition-all">
                    <i class="fas fa-search absolute left-3 top-3 text-purple-400"></i>
                </div>
                <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-lg flex items-center justify-center transition-all duration-300 shadow-md hover:shadow-lg">
                    <i class="fas fa-search mr-2"></i> Cari
                </button>
            </form>
            <!-- Add new customer button with animation -->
            <a href="<?= BASE_URL ?>/pelanggan/tambah" class="bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-lg flex items-center justify-center transition-all duration-300 shadow-md hover:shadow-lg transform hover:scale-105">
                <i class="fas fa-plus mr-2"></i> Tambah Pelanggan
            </a>
        </div>
    </div>

    <!-- Table with improved styling -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                <tr class="bg-purple-100 border-b border-purple-200">
                    <th class="px-4 py-3 text-left text-xs font-medium text-purple-800 uppercase tracking-wider">Nama</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-purple-800 uppercase tracking-wider hidden md:table-cell">Email</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-purple-800 uppercase tracking-wider">Telepon</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-purple-800 uppercase tracking-wider hidden lg:table-cell">Alamat</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-purple-800 uppercase tracking-wider">Aksi</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-purple-100">
                <?php foreach ($data['pelanggans'] as $index => $pelanggan): ?>
                    <tr class="hover:bg-purple-50 transition-all duration-150 <?= $index % 2 === 0 ? 'bg-white' : 'bg-purple-50' ?>">
                        <td class="px-4 py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10 mr-3">
                                    <div class="h-10 w-10 rounded-full bg-purple-200 flex items-center justify-center">
                                        <span class="text-purple-700 font-medium"><?= substr($pelanggan['nama'], 0, 1) ?></span>
                                    </div>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900"><?= $pelanggan['nama'] ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-4 hidden md:table-cell">
                            <div class="flex items-center">
                                <i class="fas fa-envelope text-purple-400 mr-2"></i>
                                <span class="text-gray-600"><?= $pelanggan['email'] ?></span>
                            </div>
                        </td>
                        <td class="px-4 py-4">
                            <div class="flex items-center">
                                <i class="fas fa-phone text-purple-400 mr-2"></i>
                                <span class="text-gray-600"><?= $pelanggan['no_hp'] ?></span>
                            </div>
                        </td>
                        <td class="px-4 py-4 hidden lg:table-cell">
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt text-purple-400 mr-2"></i>
                                <span class="text-gray-600"><?= htmlspecialchars(substr($pelanggan['alamat'], 0, 20)) . (strlen($pelanggan['alamat']) > 20 ? '...' : '') ?></span>
                            </div>
                        </td>
                        <td class="px-4 py-4">
                            <div class="flex items-center space-x-3">
                                <button class="text-purple-600 hover:text-purple-800 bg-purple-100 hover:bg-purple-200 p-2 rounded-full transition-all"
                                        @click="showModal($el.dataset.id)"
                                        data-id="<?= $pelanggan['id'] ?>"
                                        title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <a href="<?= BASE_URL ?>/pelanggan/edit/<?= $pelanggan['id'] ?>"
                                   class="text-blue-600 hover:text-blue-800 bg-blue-100 hover:bg-blue-200 p-2 rounded-full transition-all"
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="<?= BASE_URL ?>/pelanggan/delete/<?= $pelanggan['id'] ?>" method="POST" onclick="return confirm('Apakah Anda yakin ingin menghapus pelanggan ini?')">
                                    <button type="submit"
                                       class="text-red-600 hover:text-red-800 bg-red-100 hover:bg-red-200 p-2 rounded-full transition-all"
                                       title="Hapus">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Empty state for no customers -->
        <?php if (empty($data['pelanggans'])): ?>
            <div class="text-center py-10">
                <div class="text-purple-400 mb-4">
                    <i class="fas fa-users text-5xl"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900">Belum ada data pelanggan</h3>
                <p class="text-gray-500 mb-4">Tambahkan pelanggan pertama Anda untuk mulai</p>
                <a href="<?= BASE_URL ?>/pelanggan/tambah" class="inline-flex items-center px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-all">
                    <i class="fas fa-plus mr-2"></i> Tambah Pelanggan
                </a>
            </div>
        <?php endif; ?>

        <!-- Pagination -->
        <nav class="my-6">
            <ul class="flex justify-center space-x-2">
                <?php if ($data['currentPage'] > 1): ?>
                    <li>
                        <a href="<?= BASE_URL ?>/pelanggan?page=<?= $data['currentPage'] - 1 ?>&keyword=<?= $data['keyword'] ?? '' ?>" class="px-4 py-2 bg-gray-200 text-gray-600 rounded hover:bg-gray-300">
                            Previous
                        </a>
                    </li>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $data['totalPages']; $i++): ?>
                    <li>
                        <a href="<?= BASE_URL ?>/pelanggan?page=<?= $i ?>&keyword=<?= $data['keyword'] ?? '' ?>" class="px-4 py-2 <?= $i == $data['currentPage'] ? 'bg-purple-500 text-white' : 'bg-gray-200 text-gray-600' ?> rounded hover:bg-gray-300">
                            <?= $i ?>
                        </a>
                    </li>
                <?php endfor; ?>
                <?php if ($data['currentPage'] < $data['totalPages']): ?>
                    <li>
                        <a href="<?= BASE_URL ?>/pelanggan?page=<?= $data['currentPage'] + 1 ?>&keyword=<?= $data['keyword'] ?? '' ?>" class="px-4 py-2 bg-gray-200 text-gray-600 rounded hover:bg-gray-300">
                            Next
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>

    <!-- Detail Modal -->
    <div x-show="show"
         class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
        <div x-show="show"
             @click.away="show = false"
             class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4 overflow-hidden"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform scale-95"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-95">
            <div class="bg-purple-600 px-6 py-4 flex justify-between items-center">
                <h3 class="text-lg font-bold text-white">Detail Pelanggan</h3>
                <button @click="show = false" class="text-white hover:text-purple-200">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="p-6" x-show="pelanggan">
                <div class="flex justify-center mb-6">
                    <div class="h-24 w-24 rounded-full bg-purple-200 flex items-center justify-center text-3xl text-purple-700 font-bold">
                        <span x-text="pelanggan?.nama?.charAt(0)"></span>
                    </div>
                </div>
                <div class="space-y-4">
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Nama Lengkap</h4>
                        <p class="text-gray-900 font-medium" x-text="pelanggan?.nama"></p>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Email</h4>
                        <p class="text-gray-900" x-text="pelanggan?.email"></p>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Nomor Telepon</h4>
                        <p class="text-gray-900" x-text="pelanggan?.no_hp"></p>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Alamat</h4>
                        <p class="text-gray-900" x-text="pelanggan?.alamat"></p>
                    </div>
                </div>
                <div class="mt-6 flex justify-end space-x-3">
                    <button @click="show = false" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                        Tutup
                    </button>
                    <a :href="`<?= BASE_URL ?>/pelanggan/edit/${pelanggan?.id}`" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                        Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once '../app/views/layouts/footer.php'?>
