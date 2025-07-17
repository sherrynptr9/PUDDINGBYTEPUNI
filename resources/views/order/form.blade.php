@extends('layouts.app')

@section('title', 'Form Pemesanan')

@section('content')
<body class="bg-gradient-to-br from-pink-50 to-rose-50 min-h-screen">
    <div class="max-w-2xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Header with animation -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold gradient-text mb-2">Form Pemesanan</h1>
            <p class="text-gray-600">Silakan lengkapi formulir berikut untuk memesan menu kami</p>
            <div class="flex justify-center mt-4">
                <div class="animate-bounce text-pink-500">
                    <i class="fas fa-arrow-down text-2xl"></i>
                </div>
            </div>
        </div>

        <!-- Order Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl">
            <!-- Order Summary -->
            <div class="bg-gradient-to-r from-pink-500 to-rose-500 p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-bold">Menu Spesial</h2>
                        <p class="text-pink-100">Pilihan terbaik untuk Anda</p>
                    </div>
                    <div class="bg-white/20 p-3 rounded-full">
                        <i class="fas fa-utensils text-2xl"></i>
                    </div>
                </div>
            </div>

            <!-- Form Section -->
            <form method="POST" action="{{ route('order.submit', $menu->id) }}" class="p-6 space-y-6">
                @csrf
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
                    <label for="nama" class="flex items-center text-gray-700 font-medium">
                        <i class="fas fa-user text-pink-500 mr-2"></i> Nama Lengkap
                    </label>
                    <div class="relative">
                        <input type="text" id="nama" name="nama" value="{{ old('nama', auth()->user()->name ?? '') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:outline-none pl-10 transition-all duration-200"
                            placeholder="Masukkan nama Anda">
                        <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>

                <!-- Phone Field -->
                <div class="space-y-2">
                    <label for="telepon" class="flex items-center text-gray-700 font-medium">
                        <i class="fas fa-phone text-pink-500 mr-2"></i> Nomor Telepon
                    </label>
                    <div class="relative">
                        <input type="tel" id="telepon" name="telepon" value="{{ old('telepon', auth()->user()->telepon ?? '') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:outline-none pl-10 transition-all duration-200"
                            placeholder="Contoh: 08123456789">
                        <i class="fas fa-phone absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>

                <!-- Address Field -->
                <div class="space-y-2">
                    <label for="alamat" class="flex items-center text-gray-700 font-medium">
                        <i class="fas fa-map-marker-alt text-pink-500 mr-2"></i> Alamat Lengkap
                    </label>
                    <div class="relative">
                        <textarea id="alamat" name="alamat" rows="3"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:outline-none pl-10 transition-all duration-200"
                            placeholder="Masukkan alamat pengiriman">{{ old('alamat', auth()->user()->alamat ?? '') }}</textarea>
                        <i class="fas fa-map-marker-alt absolute left-3 top-4 text-gray-400"></i>
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
                            <input type="number" id="jumlah" name="jumlah" min="1" 
                                value="{{ old('jumlah', (isset($source) && $source === 'cart' && session('cart') && isset(session('cart')[$menu->id])) ? session('cart')[$menu->id]['quantity'] : 1) }}"
                                class="w-full px-4 py-2 border-t border-b border-gray-300 text-center focus:outline-none">
                            <button type="button" id="increment" class="bg-gray-200 text-gray-700 px-3 py-2 rounded-r-lg hover:bg-gray-300 transition">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Delivery Method -->
                <div class="space-y-2">
                    <label class="flex items-center text-gray-700 font-medium">
                        <i class="fas fa-truck text-pink-500 mr-2"></i> Metode Pengiriman
                    </label>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <input type="radio" id="pickup" name="pengiriman" value="pickup" class="hidden peer" {{ old('pengiriman') == 'pickup' ? 'checked' : '' }}>
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
                </div>

                <!-- Notes -->
                <div class="space-y-2">
                    <label for="catatan" class="flex items-center text-gray-700 font-medium">
                        <i class="fas fa-sticky-note text-pink-500 mr-2"></i> Catatan Tambahan
                    </label>
                    <textarea id="catatan" name="catatan" rows="2"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:outline-none transition-all duration-200"
                        placeholder="Contoh: Tidak pakai pedas, tambah saus, dll.">{{ old('catatan') }}</textarea>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-gradient-to-r from-pink-500 to-rose-500 text-white py-3 rounded-xl font-bold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 flex items-center justify-center">
                    <i class="fas fa-shopping-cart mr-2"></i> Lanjutkan Pesanan
                </button>
            </form>
        </div>
    </div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const useAccountCheckbox = document.getElementById('use_account');
        const jumlahInput = document.getElementById('jumlah');
        const incrementBtn = document.getElementById('increment');
        const decrementBtn = document.getElementById('decrement');

        // Handle account info toggle
        useAccountCheckbox?.addEventListener('change', () => {
            const isChecked = useAccountCheckbox.checked;
            const user = @json(auth()->user());

            document.getElementById('nama').value     = isChecked && user.name     ? user.name     : '';
            document.getElementById('telepon').value  = isChecked && user.telepon  ? user.telepon  : '';
            document.getElementById('alamat').value   = isChecked && user.alamat   ? user.alamat   : '';
            document.getElementById('catatan').value  = '';
        });

        // Handle quantity increment/decrement
        incrementBtn?.addEventListener('click', () => {
            jumlahInput.value = parseInt(jumlahInput.value || '1') + 1;
        });

        decrementBtn?.addEventListener('click', () => {
            jumlahInput.value = Math.max(1, parseInt(jumlahInput.value || '1') - 1);
        });

        // Ensure quantity input stays positive
        jumlahInput?.addEventListener('input', () => {
            if (jumlahInput.value < 1 || isNaN(jumlahInput.value)) {
                jumlahInput.value = 1;
            }
        });
    });
</script>
@endsection