<?php require_once '../app/views/layouts/header.php'?>

    <div class="min-h-screen bg-purple-50 flex flex-col">
        <!-- Main Content -->
        <div class="flex-1 p-4 md:p-8 flex justify-center items-center">
            <div class="w-full max-w-2xl bg-white rounded-2xl shadow-xl p-6 md:p-8 border border-purple-100">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="bg-purple-600 p-2 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-purple-800">Edit Data Pelanggan</h2>
                </div>

                <?php
                $oldInput = isset($_SESSION['old_input']) ? $_SESSION['old_input'] : [];
                $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
                unset($_SESSION['old_input'], $_SESSION['errors']);
                ?>

                <form action="<?= BASE_URL ?>/pelanggan/update/<?= $data['pelanggan']['id'] ?>" method="post" class="space-y-6">
                    <!-- Nama -->
                    <div class="transition-all duration-200 hover:shadow-md p-3 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <input type="text" name="nama" value="<?= isset($oldInput['nama']) ? htmlspecialchars($oldInput['nama']) : htmlspecialchars($data['pelanggan']['nama']) ?>" required placeholder="Masukkan nama lengkap" class="mt-1 w-full pl-10 px-4 py-3 border border-purple-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500" />
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

                    <!-- Email -->
                    <div class="transition-all duration-200 hover:shadow-md p-3 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input type="email" name="email" value="<?= isset($oldInput['email']) ? htmlspecialchars($oldInput['email']) : htmlspecialchars($data['pelanggan']['email']) ?>" required placeholder="contoh@email.com" class="mt-1 w-full pl-10 px-4 py-3 border border-purple-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500" />
                        </div>
                        <?php if (isset($errors['email'])): ?>
                            <p class="text-red-500 text-sm mt-1 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                <?= $errors['email'] ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- No Telepon -->
                    <div class="transition-all duration-200 hover:shadow-md p-3 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-1">No Telepon</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <input type="tel" name="no_hp" value="<?= isset($oldInput['no_hp']) ? htmlspecialchars($oldInput['no_hp']) : htmlspecialchars($data['pelanggan']['no_hp']) ?>" required placeholder="08xxxxxxxxxx" class="mt-1 w-full pl-10 px-4 py-3 border border-purple-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500" />
                        </div>
                        <?php if (isset($errors['no_hp'])): ?>
                            <p class="text-red-500 text-sm mt-1 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                <?= $errors['no_hp'] ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- Alamat -->
                    <div class="transition-all duration-200 hover:shadow-md p-3 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <textarea rows="3" name="alamat" placeholder="Masukkan alamat lengkap" class="mt-1 w-full pl-10 px-4 py-3 border border-purple-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500"><?= isset($oldInput['alamat']) ? htmlspecialchars($oldInput['alamat']) : htmlspecialchars($data['pelanggan']['alamat']) ?></textarea>
                        </div>
                    </div>

                    <!-- Tombol -->
                    <div class="flex flex-col sm:flex-row justify-end gap-3 mt-8">
                        <a href="<?= BASE_URL ?>/pelanggan" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-xl transition duration-200 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali
                        </a>
                        <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-xl transition duration-200 flex items-center justify-center shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require_once '../app/views/layouts/footer.php'?>
