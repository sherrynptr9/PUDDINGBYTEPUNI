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
                        <h2 class="text-xl font-bold">Pesanan Anda</h2>
                        <p class="text-pink-100">Detail pesanan yang akan Anda buat</p>
                    </div>
                    <div class="bg-white/20 p-3 rounded-full">
                        <i class="fas fa-utensils text-2xl"></i>
                    </div>
                </div>
            </div>

            <!-- Form Section -->
            <form method="POST" action="{{ $source === 'cart' ? route('order.submitCart') : route('order.submit', $menu->id) }}" class="p-6 space-y-6">
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

                <!-- Order Items -->
                <div class="space-y-4">
                    <label class="flex items-center text-gray-700 font-medium">
                        <i class="fas fa-utensils text-pink-500 mr-2"></i> Detail Pesanan
                    </label>
                    @if ($source === 'cart' && isset($carts) && $carts->isNotEmpty())
                        @foreach ($carts as $index => $cart)
                            <div class="bg-pink-50 p-4 rounded-lg flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    <img src="{{ $cart->menu->gambar ? asset('storage/' . $cart->menu->gambar) : 'https://via.placeholder.com/60' }}" 
                                         alt="{{ $cart->menu->nama }}" 
                                         class="w-16 h-16 object-cover rounded-lg">
                                    <div>
                                        <h4 class="text-gray-800 font-medium">{{ $cart->menu->nama }}</h4>
                                        <p class="text-pink-600 text-sm">Rp {{ number_format($cart->menu->harga, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <button type="button" class="decrement-btn bg-gray-200 text-gray-700 px-3 py-2 rounded-l-lg hover:bg-gray-300 transition"
                                            data-index="{{ $index }}">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input type="number" id="jumlah-{{ $index }}" name="items[{{ $cart->menu_id }}][jumlah]" min="1" 
                                           value="{{ old("items.{$cart->menu_id}.jumlah", $cart->jumlah) }}"
                                           class="w-16 px-2 py-2 border-t border-b border-gray-300 text-center focus:outline-none jumlah-input"
                                           data-index="{{ $index }}">
                                    <input type="hidden" name="items[{{ $cart->menu_id }}][menu_id]" value="{{ $cart->menu_id }}">
                                    <button type="button" class="increment-btn bg-gray-200 text-gray-700 px-3 py-2 rounded-r-lg hover:bg-gray-300 transition"
                                            data-index="{{ $index }}">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- Single Menu Item -->
                        <div class="bg-pink-50 p-4 rounded-lg flex items-center justify-between">
                            <div class="flex items-center gap-4">
                                <img src="{{ $menu->gambar ? asset('storage/' . $menu->gambar) : 'https://via.placeholder.com/60' }}" 
                                     alt="{{ $menu->nama }}" 
                                     class="w-16 h-16 object-cover rounded-lg">
                                <div>
                                    <h4 class="text-gray-800 font-medium">{{ $menu->nama }}</h4>
                                    <p class="text-pink-600 text-sm">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <button type="button" id="decrement" class="bg-gray-200 text-gray-700 px-3 py-2 rounded-l-lg hover:bg-gray-300 transition">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input type="number" id="jumlah" name="jumlah" min="1" 
                                       value="{{ old('jumlah', 1) }}"
                                       class="w-16 px-2 py-2 border-t border-b border-gray-300 text-center focus:outline-none">
                                <button type="button" id="increment" class="bg-gray-200 text-gray-700 px-3 py-2 rounded-r-lg hover:bg-gray-300 transition">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    @endif
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
        const jumlahInputs = document.querySelectorAll('.jumlah-input');
        const incrementButtons = document.querySelectorAll('.increment-btn');
        const decrementButtons = document.querySelectorAll('.decrement-btn');
        const singleJumlahInput = document.getElementById('jumlah');
        const singleIncrementBtn = document.getElementById('increment');
        const singleDecrementBtn = document.getElementById('decrement');

        // Handle account info toggle
        useAccountCheckbox?.addEventListener('change', () => {
            const isChecked = useAccountCheckbox.checked;
            const user = @json(auth()->user());

            document.getElementById('nama').value = isChecked && user.name ? user.name : '';
            document.getElementById('telepon').value = isChecked && user.telepon ? user.telepon : '';
            document.getElementById('alamat').value = isChecked && user.alamat ? user.alamat : '';
            document.getElementById('catatan').value = '';
        });

        // Handle multiple cart items quantity
        jumlahInputs.forEach(input => {
            input.addEventListener('input', () => {
                if (input.value < 1 || isNaN(input.value)) {
                    input.value = 1;
                }
            });
        });

        incrementButtons.forEach(button => {
            button.addEventListener('click', () => {
                const index = button.dataset.index;
                const input = document.getElementById(`jumlah-${index}`);
                input.value = parseInt(input.value || '1') + 1;
            });
        });

        decrementButtons.forEach(button => {
            button.addEventListener('click', () => {
                const index = button.dataset.index;
                const input = document.getElementById(`jumlah-${index}`);
                input.value = Math.max(1, parseInt(input.value || '1') - 1);
            });
        });

        // Handle single menu item quantity
        singleIncrementBtn?.addEventListener('click', () => {
            singleJumlahInput.value = parseInt(singleJumlahInput.value || '1') + 1;
        });

        singleDecrementBtn?.addEventListener('click', () => {
            singleJumlahInput.value = Math.max(1, parseInt(singleJumlahInput.value || '1') - 1);
        });

        singleJumlahInput?.addEventListener('input', () => {
            if (singleJumlahInput.value < 1 || isNaN(singleJumlahInput.value)) {
                singleJumlahInput.value = 1;
            }
        });
    });
</script>
@endsection