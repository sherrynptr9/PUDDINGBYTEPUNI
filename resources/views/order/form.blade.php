@extends('layouts.app')

@section('title', 'Form Pemesanan')

@section('content')
    <!-- Define user data in a PHP block -->
    @php
        $userData = auth()->check() ? auth()->user()->only(['name', 'no_wa', 'alamat']) : ['name' => '', 'no_wa' => '', 'alamat' => ''];
    @endphp

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

    <body class="bg-gradient-to-br from-pink-50 to-purple-50 min-h-screen">
        <div class="max-w-2xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <!-- Header with animation -->
            <div class="text-center mb-8 animate__animated animate__fadeInDown">
                <h1 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-purple-600 mb-2">Form Pemesanan</h1>
                <p class="text-gray-600">Yuk, pesan pudding favoritmu dengan mudah! 💖</p>
                <div class="flex justify-center mt-4">
                    <div class="animate__animated animate__bounce animate__infinite text-pink-500">
                        <i class="fas fa-heart text-2xl"></i>
                    </div>
                </div>
            </div>

            <!-- Order Card -->
            <div class="bg-cream rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl animate__animated animate__bounceIn">
                <!-- Order Summary -->
                <div class="bg-gradient-to-r from-pink-500 to-purple-600 p-6 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-xl font-bold">{{ $menu->nama }}</h2>
                            <p class="text-pink-100 text-sm">{{ $menu->deskripsi }}</p>
                            <p class="text-pink-200 font-medium mt-1">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                        </div>
                        <div class="bg-white/20 p-3 rounded-full">
                            <img src="{{ asset($menu->gambar ? 'storage/images/' . $menu->gambar : 'storage/images/fallback.jpg') }}" 
                                 alt="{{ $menu->nama }}" 
                                 class="w-12 h-12 rounded-full object-cover">
                        </div>
                    </div>
                    @if($menu->is_favorit)
                    <div class="mt-3 text-sm bg-pink-400 inline-block px-3 py-1 rounded-full">
                        <i class="fas fa-crown me-1"></i> Top Pick!
                    </div>
                    @endif
                </div>

                <!-- Form Section -->
                <form method="POST" action="{{ route('order.submit', $menu->id) }}" class="p-6 space-y-6">
                    @csrf
                    <input type="hidden" name="source" value="{{ isset($source) ? $source : 'direct' }}">
                    <!-- Use Account Info Toggle -->
                    <div class="flex items-center justify-between bg-pink-50 p-4 rounded-lg">
                        <div class="flex items-center">
                            <i class="fas fa-user-circle text-pink-500 mr-3 text-xl"></i>
                            <span class="text-gray-700 font-medium">Gunakan data akun saya</span>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="use_account" checked class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-pink-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-pink-500"></div>
                        </label>
                    </div>

                    <!-- Name Field -->
                    <div class="space-y-2">
                        <label for="nama_pemesan" class="flex items-center text-gray-700 font-medium">
                            <i class="fas fa-user text-pink-500 mr-2"></i> Nama Lengkap
                        </label>
                        <div class="relative">
                            <input type="text" id="nama_pemesan" name="nama_pemesan" value="{{ old('nama_pemesan', auth()->user()->name ?? '') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300 pl-10 transition-all duration-200 @error('nama_pemesan') border-pink-500 @enderror"
                                placeholder="Masukkan nama Anda">
                            <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            @error('nama_pemesan')
                            <p class="text-pink-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Phone Field -->
                    <div class="space-y-2">
                        <label for="no_wa" class="flex items-center text-gray-700 font-medium">
                            <i class="fas fa-phone text-pink-500 mr-2"></i> Nomor WhatsApp
                        </label>
                        <div class="relative">
                            <input type="tel" id="no_wa" name="no_wa" value="{{ old('no_wa', auth()->user()->no_wa ?? '') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300 pl-10 transition-all duration-200 @error('no_wa') border-pink-500 @enderror"
                                placeholder="Contoh: 08123456789">
                            <i class="fab fa-whatsapp absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            @error('no_wa')
                            <p class="text-pink-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Address Field -->
                    <div class="space-y-2">
                        <label for="alamat" class="flex items-center text-gray-700 font-medium">
                            <i class="fas fa-map-marker-alt text-pink-500 mr-2"></i> Alamat Lengkap
                        </label>
                        <div class="relative">
                            <textarea id="alamat" name="alamat" rows="3"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300 pl-10 transition-all duration-200 @error('alamat') border-pink-500 @enderror"
                                placeholder="Masukkan alamat pengiriman">{{ old('alamat', auth()->user()->alamat ?? '') }}</textarea>
                            <i class="fas fa-map-marker-alt absolute left-3 top-4 text-gray-400"></i>
                            @error('alamat')
                            <p class="text-pink-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Quantity Field -->
                    <div class="space-y-2">
                        <label for="jumlah" class="flex items-center text-gray-700 font-medium">
                            <i class="fas fa-hashtag text-pink-500 mr-2"></i> Jumlah Pesanan
                        </label>
                        <div class="relative">
                            <div class="flex items-center">
                                <button type="button" id="decrement" class="bg-gray-200 text-gray-700 px-3 py-2 rounded-l-lg hover:bg-gray-300 transition">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input type="number" id="jumlah" name="jumlah" min="1" value="{{ old('jumlah', $jumlah ?? 1) }}"
                                    class="w-full px-4 py-2 border-t border-b border-gray-300 text-center focus:outline-none focus:ring-2 focus:ring-pink-300 @error('jumlah') border-pink-500 @enderror">
                                <button type="button" id="increment" class="bg-gray-200 text-gray-700 px-3 py-2 rounded-r-lg hover:bg-gray-300 transition">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            @error('jumlah')
                            <p class="text-pink-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Delivery Method -->
                    <div class="space-y-2">
                        <label class="flex items-center text-gray-700 font-medium">
                            <i class="fas fa-truck text-pink-500 mr-2"></i> Metode Pengiriman
                        </label>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <input type="radio" id="pickup" name="pengiriman" value="pickup" class="hidden peer" {{ old('pengiriman', 'pickup') == 'pickup' ? 'checked' : '' }}>
                                <label for="pickup" class="flex flex-col items-center p-4 border border-gray-300 rounded-lg cursor-pointer peer-checked:border-pink-500 peer-checked:bg-pink-50 transition">
                                    <i class="fas fa-store text-2xl text-pink-500 mb-2"></i>
                                    <span>Pickup</span>
                                    <span class="text-sm text-gray-500">Ambil di tempat</span>
                                </label>
                            </div>
                            <div>
                                <input type="radio" id="delivery" name="pengiriman" value="delivery" class="hidden peer" {{ old('pengiriman') == 'delivery' ? 'checked' : '' }}>
                                <label for="delivery" class="flex flex-col items-center p-4 border border-gray-300 rounded-lg cursor-pointer peer-checked:border-pink-500 peer-checked:bg-pink-50 transition">
                                    <i class="fas fa-motorcycle text-2xl text-pink-500 mb-2"></i>
                                    <span>Delivery</span>
                                    <span class="text-sm text-gray-500">Antar ke alamat</span>
                                </label>
                            </div>
                        </div>
                        @error('pengiriman')
                        <p class="text-pink-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Notes -->
                    <div class="space-y-2">
                        <label for="catatan" class="flex items-center text-gray-700 font-medium">
                            <i class="fas fa-sticky-note text-pink-500 mr-2"></i> Catatan Tambahan
                        </label>
                        <textarea id="catatan" name="catatan" rows="2"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300 transition-all duration-200 @error('catatan') border-pink-500 @enderror"
                            placeholder="Contoh: Tambah topping cokelat, tanpa kacang">{{ old('catatan') }}</textarea>
                        @error('catatan')
                        <p class="text-pink-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-gradient-to-r from-pink-500 to-purple-600 text-white py-3 rounded-xl font-bold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 flex items-center justify-center">
                        <i class="fas fa-shopping-cart mr-2"></i> Lanjutkan Pesanan
                    </button>
                </form>
            </div>
        </div>

        <!-- Toast Notification -->
        <div id="toast" class="hidden fixed bottom-4 right-4 bg-pink-500 text-white px-4 py-3 rounded-lg shadow-lg flex items-center animate__animated">
            <i class="fas fa-exclamation-circle mr-2"></i>
            <span id="toast-message"></span>
        </div>

        <style>
            :root {
                --primary-pink: #FFC1CC;
                --secondary-pink: #FF9999;
                --pastel-purple: #E6B8FF;
                --cream: #FFF5F5;
                --text: #4A4A4A;
                --text-light: #7A7A7A;
                --accent: #FF6B6B;
            }

            body {
                font-family: 'Montserrat', sans-serif;
                color: var(--text);
                line-height: 1.6;
            }

            h1, h2 {
                font-family: 'Playfair Display', serif;
                font-weight: 700;
            }

            .rounded-2xl {
                border-radius: 1rem;
            }

            .bg-cream {
                background-color: var(--cream);
            }

            .input-focus:focus {
                border-color: var(--primary-pink);
                box-shadow: 0 0 0 3px rgba(255, 193, 204, 0.3);
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const useAccountCheckbox = document.getElementById('use_account');
                const jumlahInput = document.getElementById('jumlah');
                const incrementBtn = document.getElementById('increment');
                const decrementBtn = document.getElementById('decrement');
                const namaInput = document.getElementById('nama_pemesan');
                const noWaInput = document.getElementById('no_wa');
                const alamatInput = document.getElementById('alamat');
                const form = document.querySelector('form');
                const toast = document.getElementById('toast');
                const toastMessage = document.getElementById('toast-message');

                // User data from PHP
                const user = @json($userData);

                // Show toast notification
                const showToast = (message) => {
                    toastMessage.textContent = message;
                    toast.classList.remove('hidden', 'animate__fadeOut');
                    toast.classList.add('animate__fadeIn');
                    setTimeout(() => {
                        toast.classList.remove('animate__fadeIn');
                        toast.classList.add('animate__fadeOut');
                        setTimeout(() => toast.classList.add('hidden'), 500);
                    }, 3000);
                };

                // Handle account info toggle
                if (useAccountCheckbox && namaInput && noWaInput && alamatInput) {
                    // Initialize form based on checkbox state
                    if (useAccountCheckbox.checked) {
                        namaInput.value = user.name;
                        noWaInput.value = user.no_wa;
                        alamatInput.value = user.alamat;
                    }

                    useAccountCheckbox.addEventListener('change', () => {
                        const isChecked = useAccountCheckbox.checked;
                        if (isChecked) {
                            // Fill form with user data from database
                            namaInput.value = user.name;
                            noWaInput.value = user.no_wa;
                            alamatInput.value = user.alamat;
                        } else {
                            // Clear form fields
                            namaInput.value = '';
                            noWaInput.value = '';
                            alamatInput.value = '';
                        }
                    });
                }

                // Handle quantity increment/decrement
                incrementBtn?.addEventListener('click', () => {
                    jumlahInput.value = parseInt(jumlahInput.value || '1') + 1;
                    jumlahInput.classList.remove('border-pink-500', 'animate__animated', 'animate__shakeX');
                });

                decrementBtn?.addEventListener('click', () => {
                    const newValue = Math.max(1, parseInt(jumlahInput.value || '1') - 1);
                    jumlahInput.value = newValue;
                    if (newValue === 1) {
                        jumlahInput.classList.add('border-pink-500', 'animate__animated', 'animate__shakeX');
                        showToast('Jumlah pesanan minimal 1! 💖');
                        setTimeout(() => jumlahInput.classList.remove('border-pink-500', 'animate__animated', 'animate__shakeX'), 1000);
                    }
                });

                // Ensure quantity input is numeric and positive
                jumlahInput?.addEventListener('input', () => {
                    const value = jumlahInput.value;
                    if (!/^\d*$/.test(value) || value < 1 || isNaN(value)) {
                        jumlahInput.value = 1;
                        jumlahInput.classList.add('border-pink-500', 'animate__animated', 'animate__shakeX');
                        showToast('Jumlah harus angka positif! 💖');
                        setTimeout(() => jumlahInput.classList.remove('border-pink-500', 'animate__animated', 'animate__shakeX'), 1000);
                    }
                });

                // Debounced phone validation (allow digits, max 20 chars)
                let phoneValidationTimeout;
                noWaInput?.addEventListener('input', (e) => {
                    clearTimeout(phoneValidationTimeout);
                    const value = e.target.value;
                    const isValid = /^\d{10,20}$/.test(value);

                    phoneValidationTimeout = setTimeout(() => {
                        if (!/^\d*$/.test(value)) {
                            e.target.value = value.replace(/\D/g, '');
                            e.target.classList.add('border-pink-500', 'animate__animated', 'animate__shakeX');
                            showToast('Nomor WhatsApp hanya boleh angka! 💖');
                            setTimeout(() => e.target.classList.remove('border-pink-500', 'animate__animated', 'animate__shakeX'), 1000);
                        } else if (value && !isValid) {
                            e.target.classList.add('border-pink-500', 'animate__animated', 'animate__shakeX');
                            showToast('Nomor WhatsApp harus 10-20 digit! 💖');
                            setTimeout(() => e.target.classList.remove('border-pink-500', 'animate__animated', 'animate__shakeX'), 1000);
                        }
                    }, 300);
                });

                // Real-time required field validation
                [namaInput, noWaInput, alamatInput].forEach(input => {
                    input?.addEventListener('input', () => {
                        if (input.value.trim() === '') {
                            input.classList.add('border-pink-500', 'animate__animated', 'animate__shakeX');
                            showToast('Kolom ini wajib diisi! 💖');
                            setTimeout(() => input.classList.remove('border-pink-500', 'animate__animated', 'animate__shakeX'), 1000);
                        }
                    });
                });

                // Form submission validation
                form?.addEventListener('submit', (e) => {
                    let hasError = false;
                    [namaInput, noWaInput, alamatInput].forEach(input => {
                        if (input.value.trim() === '') {
                            input.classList.add('border-pink-500', 'animate__animated', 'animate__shakeX');
                            hasError = true;
                            setTimeout(() => input.classList.remove('border-pink-500', 'animate__animated', 'animate__shakeX'), 1000);
                        }
                    });
                    if (!/^\d{10,20}$/.test(noWaInput.value)) {
                        noWaInput.classList.add('border-pink-500', 'animate__animated', 'animate__shakeX');
                        hasError = true;
                        showToast('Nomor WhatsApp harus 10-20 digit! 💖');
                        setTimeout(() => noWaInput.classList.remove('border-pink-500', 'animate__animated', 'animate__shakeX'), 1000);
                    }
                    if (hasError) {
                        e.preventDefault();
                        showToast('Harap lengkapi semua kolom dengan benar! 💖');
                    }
                });
            });
        </script>
    </body>
@endsection