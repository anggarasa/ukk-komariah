<?php require_once '../app/views/layouts/header.php'?>

    <!-- Main Content -->
    <div class="bg-gradient-to-br from-purple-50 to-white rounded-lg shadow-lg overflow-hidden fade-in transition-all duration-300 transform hover:scale-[1.005]">
        <div class="flex flex-col md:flex-row items-center justify-between px-6 py-5 border-b border-purple-100">
            <div class="text-center md:text-left mb-4 md:mb-0">
                <h3 class="text-2xl leading-6 font-bold text-purple-800">Tambah Produk Baru</h3>
                <p class="mt-2 text-sm text-purple-600">Tambahkan produk baru ke dalam inventori Anda</p>
            </div>

            <div class="flex justify-center">
                <a href="<?= BASE_URL ?>/produk" class="flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-purple-700 hover:bg-purple-800 transform hover:scale-105 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        <?php
        $oldInput = isset($_SESSION['old_input']) ? $_SESSION['old_input'] : [];
        $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
        unset($_SESSION['old_input'], $_SESSION['errors']);
        ?>

        <div class="px-6 py-8 bg-white">
            <form action="<?= BASE_URL ?>/produk/store" method="post" class="space-y-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Nama Produk -->
                    <div class="relative group">
                        <label for="nama" class="block text-sm font-semibold text-gray-700 mb-2 group-hover:text-purple-700 transition-colors duration-200">
                            Nama Produk <span class="text-purple-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" name="nama" id="nama" value="<?= isset($oldInput['nama']) ? htmlspecialchars($oldInput['nama']) : '' ?>"
                                   required
                                   class="block w-full px-4 py-3 bg-white border <?= isset($errors['nama']) ? 'border-red-500' : 'border-purple-200' ?> rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200"
                                   placeholder="Masukkan nama produk">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <?php if (isset($errors['nama'])): ?>
                            <p class="text-red-500 text-sm mt-1 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                <?= $errors['nama'] ?>
                            </p>
                        <?php else: ?>
                            <p class="text-purple-500 text-xs mt-1 opacity-0 group-hover:opacity-100 transition-opacity duration-200">Masukkan nama produk yang jelas dan deskriptif</p>
                        <?php endif; ?>
                    </div>

                    <!-- Harga Produk -->
                    <div class="relative group">
                        <label for="harga" class="block text-sm font-semibold text-gray-700 mb-2 group-hover:text-purple-700 transition-colors duration-200">
                            Harga <span class="text-purple-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">Rp</span>
                            </div>
                            <input type="number" name="harga" id="harga" value="<?= isset($oldInput['harga']) ? htmlspecialchars($oldInput['harga']) : '' ?>"
                                   required
                                   class="block w-full pl-12 pr-4 py-3 bg-white border <?= isset($errors['harga']) ? 'border-red-500' : 'border-purple-200' ?> rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200"
                                   placeholder="0">
                        </div>
                        <?php if (isset($errors['harga'])): ?>
                            <p class="text-red-500 text-sm mt-1 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                <?= $errors['harga'] ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Stok -->
                <div class="relative group">
                        <label for="stok" class="block text-sm font-semibold text-gray-700 mb-2 group-hover:text-purple-700 transition-colors duration-200">
                            Stok <span class="text-purple-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="number" name="stok" id="stok" value="<?= isset($oldInput['stok']) ? htmlspecialchars($oldInput['stok']) : '' ?>"
                                   required
                                   class="block w-full px-4 py-3 bg-white border <?= isset($errors['stok']) ? 'border-red-500' : 'border-purple-200' ?> rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200"
                                   placeholder="Jumlah stok">
                        </div>
                        <?php if (isset($errors['stok'])): ?>
                            <p class="text-red-500 text-sm mt-1 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                <?= $errors['stok'] ?>
                            </p>
                        <?php endif; ?>
                    </div>

                <div class="flex flex-col sm:flex-row items-center justify-center sm:justify-end space-y-3 sm:space-y-0 sm:space-x-4 pt-4">
                    <button type="reset" class="w-full sm:w-auto px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-medium hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-200">
                        Reset Form
                    </button>
                    <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-purple-600 text-white rounded-lg font-medium hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 shadow-md transform hover:translate-y-[-2px] transition-all duration-200">
                        <div class="flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Tambah Produk
                        </div>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animasi input fields saat fokus
            const inputFields = document.querySelectorAll('input, select, textarea');
            inputFields.forEach(field => {
                field.addEventListener('focus', function() {
                    this.parentElement.classList.add('ring-2', 'ring-purple-300', 'ring-opacity-50');
                });
                field.addEventListener('blur', function() {
                    this.parentElement.classList.remove('ring-2', 'ring-purple-300', 'ring-opacity-50');
                });
            });
        });
    </script>

<?php require_once '../app/views/layouts/footer.php'?>
