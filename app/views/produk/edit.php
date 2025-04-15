<?php require_once '../app/views/layouts/header.php'?>

    <!-- Main Content -->
    <div class="min-h-screen bg-gradient-to-br from-purple-50 to-purple-100 py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <!-- Card Container -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl fade-in">
                <!-- Header -->
                <div class="bg-gradient-to-r from-purple-600 to-purple-800 px-6 py-6 border-b border-purple-200">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                        <div class="mb-4 md:mb-0">
                            <h2 class="text-xl md:text-2xl font-bold text-white">
                                Edit Produk
                            </h2>
                            <p class="mt-1 text-purple-100 text-sm">
                                <?= $data['produk']['nama_produk'] ?> - Silakan ubah data produk yang diperlukan
                            </p>
                        </div>

                        <div>
                            <a href="<?= BASE_URL ?>/produk" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-purple-700 bg-white hover:bg-purple-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-all duration-200 shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>

                <?php
                $oldInput = isset($_SESSION['old_input']) ? $_SESSION['old_input'] : [];
                $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
                unset($_SESSION['old_input'], $_SESSION['errors']);
                ?>

                <!-- Form Content -->
                <form action="<?= BASE_URL ?>/produk/update/<?= $data['produk']['id'] ?>" method="post" class="px-6 py-6">
                    <div class="space-y-8">
                        <!-- Form Fields Container -->
                        <div class="bg-purple-50 rounded-lg p-6 shadow-inner">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Nama Produk -->
                                <div class="col-span-2 md:col-span-1">
                                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">
                                        Nama Produk <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <input
                                                type="text"
                                                name="nama"
                                                id="nama"
                                                value="<?= isset($oldInput['nama']) ? htmlspecialchars($oldInput['nama']) : htmlspecialchars($data['produk']['nama_produk']) ?>"
                                                required
                                                class="pl-10 mt-1 block w-full px-3 py-3 bg-white border <?= isset($errors['nama']) ? 'border-red-500' : 'border-purple-300' ?> rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 sm:text-sm"
                                                placeholder="Masukkan nama produk"
                                        >
                                    </div>
                                    <?php if (isset($errors['nama'])): ?>
                                        <p class="text-red-500 text-sm mt-1 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                            </svg>
                                            <?= $errors['nama'] ?>
                                        </p>
                                    <?php endif; ?>
                                </div>

                                <!-- Harga Produk -->
                                <div class="col-span-2 md:col-span-1">
                                    <label for="harga" class="block text-sm font-medium text-gray-700 mb-1">
                                        Harga <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-purple-400 font-medium">Rp</span>
                                        </div>
                                        <input
                                                type="number"
                                                name="harga"
                                                id="harga"
                                                value="<?= isset($oldInput['harga']) ? htmlspecialchars($oldInput['harga']) : htmlspecialchars($data['produk']['harga_produk']) ?>"
                                                required
                                                class="pl-10 mt-1 block w-full px-3 py-3 bg-white border <?= isset($errors['harga']) ? 'border-red-500' : 'border-purple-300' ?> rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 sm:text-sm"
                                                placeholder="Masukkan harga produk"
                                        >
                                    </div>
                                    <?php if (isset($errors['harga'])): ?>
                                        <p class="text-red-500 text-sm mt-1 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                            </svg>
                                            <?= $errors['harga'] ?>
                                        </p>
                                    <?php endif; ?>
                                </div>

                                <!-- Stok -->
                                <div class="col-span-2">
                                    <label for="stok" class="block text-sm font-medium text-gray-700 mb-1">
                                        Stok <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                            </svg>
                                        </div>
                                        <input
                                                type="number"
                                                name="stok"
                                                id="stok"
                                                value="<?= isset($oldInput['stok']) ? htmlspecialchars($oldInput['stok']) : htmlspecialchars($data['produk']['stok']) ?>"
                                                required
                                                class="pl-10 mt-1 block w-full px-3 py-3 bg-white border <?= isset($errors['stok']) ? 'border-red-500' : 'border-purple-300' ?> rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 sm:text-sm"
                                                placeholder="Masukkan jumlah stok"
                                        >
                                    </div>
                                    <?php if (isset($errors['stok'])): ?>
                                        <p class="text-red-500 text-sm mt-1 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                            </svg>
                                            <?= $errors['stok'] ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex flex-col sm:flex-row-reverse sm:justify-between gap-3">
                            <div class="flex gap-3">
                                <button type="submit" class="w-full sm:w-auto flex justify-center items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-all duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    Simpan Perubahan
                                </button>

                                <button type="reset" class="w-full sm:w-auto flex justify-center items-center px-6 py-3 border border-gray-300 shadow-sm text-base font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-all duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                    </svg>
                                    Reset
                                </button>
                            </div>

                            <a href="<?= BASE_URL ?>/produk" class="w-full sm:w-auto flex justify-center items-center px-6 py-3 border border-gray-300 shadow-sm text-base font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-all duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Batal
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require_once '../app/views/layouts/footer.php'?>
