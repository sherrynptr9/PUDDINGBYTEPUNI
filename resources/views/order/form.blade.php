@extends('layouts.app')

@section('title', 'Form Pemesanan')

@section('content')
    @php
        $userData = auth()->check() ? auth()->user()->only(['name', 'telepon', 'alamat']) : ['name' => '', 'telepon' => '', 'alamat' => ''];
    @endphp

    <body class="bg-gradient-to-br from-pink-50 to-indigo-50 min-h-screen">
        <div class="max-w-2xl mx-auto py-8 px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-8 animate__animated animate__fadeInDown">
                <div class="inline-block relative">
                    <h1 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-indigo-600 mb-2 relative z-10">
                        Form Pemesanan
                    </h1>
                    <div class="absolute -bottom-1 left-0 right-0 h-2 bg-pink-200 rounded-full opacity-70 animate-pulse"></div>
                </div>
                <p class="text-gray-600 mb-6">Isi form berikut untuk memesan pudding favoritmu! 🍮✨</p>

                <div class="flex justify-center mb-8">
                    <div class="flex items-center">
                        <div class="flex flex-col items-center">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-r from-pink-500 to-indigo-600 flex items-center justify-center text-white font-bold shadow-lg transform transition-all duration-300 hover:scale-110">
                                1
                            </div>
                            <span class="text-xs mt-1 text-gray-600">Pilih Menu</span>
                        </div>
                        <div class="w-16 h-1 bg-gradient-to-r from-pink-300 to-indigo-300 mx-2"></div>
                        <div class="flex flex-col items-center">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-r from-pink-500 to-indigo-600 flex items-center justify-center text-white font-bold shadow-lg transform transition-all duration-300 hover:scale-110">
                                2
                            </div>
                            <span class="text-xs mt-1 text-gray-600">Isi Data</span>
                        </div>
                        <div class="w-16 h-1 bg-gray-300 mx-2"></div>
                        <div class="flex flex-col items-center">
                            <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center text-gray-500 font-bold transform transition-all duration-300 hover:scale-110">
                                3
                            </div>
                            <span class="text-xs mt-1 text-gray-400">Pembayaran</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden transition-all duration-500 hover:shadow-2xl animate__animated animate__fadeInUp">
                <div class="bg-gradient-to-r from-pink-500 to-indigo-600 p-6 text-white relative overflow-hidden">
                    <div class="absolute -right-10 -top-10 w-32 h-32 bg-white/10 rounded-full"></div>
                    <div class="absolute -right-5 -bottom-5 w-20 h-20 bg-white/10 rounded-full"></div>
                    <div class="absolute -left-10 -bottom-10 w-24 h-24 bg-white/10 rounded-full"></div>

                    @if(isset($source) && $source === 'menu' && isset($menu) && !is_null($menu))
                        <div class="flex items-center justify-between relative z-10">
                            <div class="flex-1">
                                <h2 class="text-2xl font-bold">{{ $menu->nama }}</h2>
                                <p class="text-pink-100 text-sm">{{ $menu->deskripsi }}</p>
                                <p class="text-pink-200 font-medium mt-2 text-lg">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                                @if($menu->is_favorit)
                                <div class="mt-3 text-sm bg-pink-400/80 inline-block px-3 py-1 rounded-full backdrop-blur-sm">
                                    <i class="fas fa-crown me-1"></i> Best Seller!
                                </div>
                                @endif
                            </div>
                            <div class="ml-4">
                                <div class="bg-white/20 p-3 rounded-full shadow-lg transform hover:scale-110 transition duration-300 group">
                                    <img src="{{ asset($menu->gambar ? 'storage/' . $menu->gambar : 'storage/images/fallback.jpg') }}"
                                        alt="{{ $menu->nama }}"
                                        class="w-16 h-16 rounded-full object-cover border-2 border-white group-hover:border-pink-300 transition duration-300">
                                </div>
                            </div>
                        </div>
                    @elseif(isset($source) && $source === 'cart' && isset($carts) && $carts->isNotEmpty())
                        <h2 class="text-2xl font-bold mb-4 relative z-10">Keranjang Belanja</h2>
                        <div class="max-h-60 overflow-y-auto pr-2 relative z-10 custom-scrollbar">
                            @foreach($carts as $index => $cart)
                                @if($cart->menu) {{-- NULL CHECK HERE --}}
                                    <div class="flex items-center justify-between mt-4 {{ $index > 0 ? 'border-t border-pink-400/50 pt-4' : '' }}">
                                        <div class="flex items-center">
                                            <div class="bg-white/20 p-2 rounded-full mr-3 transform hover:scale-110 transition duration-200">
                                                <img src="{{ asset($cart->menu->gambar ? 'storage/' . $cart->menu->gambar : 'storage/images/fallback.jpg') }}"
                                                     alt="{{ $cart->menu->nama }}"
                                                     class="w-10 h-10 rounded-full object-cover border border-white">
                                            </div>
                                            <div>
                                                <h3 class="text-lg font-medium">{{ $cart->menu->nama }}</h3>
                                                <p class="text-pink-100 text-sm">{{ $cart->menu->deskripsi ?? 'Deskripsi tidak tersedia' }}</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-pink-200 font-medium">Rp {{ number_format($cart->menu->harga, 0, ',', '.') }}</p>
                                            <p class="text-pink-100 text-sm">x {{ $cart->jumlah }}</p>
                                            @if($cart->menu->is_favorit)
                                            <div class="mt-1 text-xs bg-pink-400/80 inline-block px-2 py-0.5 rounded-full backdrop-blur-sm">
                                                <i class="fas fa-crown me-1"></i> Top
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                @else
                                    {{-- Fallback for orphaned cart items --}}
                                    <div class="flex items-center justify-between mt-4 {{ $index > 0 ? 'border-t border-gray-300 pt-4' : '' }}">
                                        <div class="flex items-center">
                                            <div class="bg-gray-200 p-2 rounded-full mr-3">
                                                <i class="fas fa-exclamation-triangle text-gray-500 w-10 h-10 flex items-center justify-center"></i>
                                            </div>
                                            <div>
                                                <h3 class="text-lg font-medium text-gray-700">Item tidak tersedia</h3>
                                                <p class="text-gray-500 text-sm">Menu ini mungkin sudah dihapus atau tidak ditemukan.</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-gray-500 font-medium">Jumlah: {{ $cart->jumlah }}</p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="mt-4 pt-4 border-t border-pink-400/50 relative z-10">
                            <div class="flex justify-between items-center">
                                <span class="font-medium">Total Pesanan:</span>
                                <span class="font-bold text-lg">
                                    Rp {{ number_format($carts->sum(function($cart) { return $cart->menu ? $cart->menu->harga * $cart->jumlah : 0; }), 0, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    @else
                        <h2 class="text-xl font-bold">Tidak Ada Pesanan</h2>
                        <p class="text-pink-100 text-sm">Silakan tambahkan item ke keranjang atau pilih menu untuk memesan.</p>
                    @endif
                </div>

                <form method="POST" action="{{ (isset($source) && $source === 'cart') ? route('order.submit.cart') : (isset($menu) ? route('order.submit', $menu->id) : '#') }}" class="p-6 space-y-6">
                    @csrf
                    <input type="hidden" name="source" value="{{ $source ?? 'direct' }}">

                    @auth
                    <button type="button" id="use-account-btn" class="w-full bg-pink-100 text-pink-700 py-3 rounded-xl font-semibold shadow-md hover:bg-pink-200 transition-all duration-300 flex items-center justify-center relative overflow-hidden group">
                        <span class="relative z-10 flex items-center">
                            <i class="fas fa-user-circle mr-2"></i> Gunakan Data Akun Saya
                        </span>
                        <span class="absolute inset-0 bg-gradient-to-r from-pink-200 to-pink-300 opacity-0 group-hover:opacity-100 transition duration-300"></span>
                    </button>
                    @endauth

                    @if(isset($source) && $source === 'cart' && isset($carts) && $carts->isNotEmpty())
                        @foreach($carts as $index => $cart)
                            @if($cart->menu)
                                <input type="hidden" name="items[{{ $index }}][menu_id]" value="{{ $cart->menu_id }}">
                                <input type="hidden" name="items[{{ $index }}][jumlah]" value="{{ $cart->jumlah }}">
                            @endif
                        @endforeach
                    @endif

                    <div class="space-y-4">
                        <h3 class="text-lg font-bold text-gray-700 flex items-center">
                            <span class="bg-gradient-to-r from-pink-500 to-indigo-600 text-white w-8 h-8 rounded-full flex items-center justify-center mr-3 shadow-md">1</span>
                            Informasi Pemesan
                        </h3>

                        <div class="space-y-4">
                            <div class="space-y-2">
                                <label for="nama_pemesan" class="flex items-center text-gray-700 font-medium">
                                    <i class="fas fa-user text-pink-500 mr-2"></i> Nama Lengkap
                                </label>
                                <div class="relative">
                                    <input type="text" id="nama_pemesan" name="nama_pemesan" value="{{ old('nama_pemesan', $userData['name'] ?? '') }}"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300 pl-10 transition-all duration-200 @error('nama_pemesan') border-pink-500 @enderror"
                                        placeholder="Masukkan nama Anda" required>
                                    <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    @error('nama_pemesan')
                                    <p class="text-pink-500 text-sm mt-1 animate__animated animate__fadeIn"><i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label for="telepon" class="flex items-center text-gray-700 font-medium">
                                    <i class="fas fa-phone text-pink-500 mr-2"></i> Nomor WhatsApp
                                </label>
                                <div class="relative">
                                    <div class="flex items-center">
                                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">+62</span>
                                        <input type="tel" id="telepon" name="telepon" value="{{ old('telepon', $userData['telepon'] ?? '') }}"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300 pl-12 transition-all duration-200 @error('telepon') border-pink-500 @enderror"
                                            placeholder="8123456789 (contoh)" required>
                                        <i class="fab fa-whatsapp absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    </div>
                                    @error('telepon')
                                    <p class="text-pink-500 text-sm mt-1 animate__animated animate__fadeIn"><i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label for="alamat" class="flex items-center text-gray-700 font-medium">
                                    <i class="fas fa-map-marker-alt text-pink-500 mr-2"></i> Alamat Lengkap
                                </label>
                                <div class="relative">
                                    <textarea id="alamat" name="alamat" rows="3"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300 pl-10 transition-all duration-200 @error('alamat') border-pink-500 @enderror"
                                        placeholder="Masukkan alamat pengiriman (termasuk kecamatan dan kelurahan)" required>{{ old('alamat', $userData['alamat'] ?? '') }}</textarea>
                                    <i class="fas fa-map-marker-alt absolute left-3 top-3 text-gray-400"></i>
                                    @error('alamat')
                                    <p class="text-pink-500 text-sm mt-1 animate__animated animate__fadeIn"><i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(isset($source) && $source === 'menu' && isset($menu))
                        <div class="space-y-4">
                            <h3 class="text-lg font-bold text-gray-700 flex items-center">
                                <span class="bg-gradient-to-r from-pink-500 to-indigo-600 text-white w-8 h-8 rounded-full flex items-center justify-center mr-3 shadow-md">2</span>
                                Jumlah Pesanan
                            </h3>

                            <div class="space-y-2">
                                <label for="jumlah" class="flex items-center text-gray-700 font-medium">
                                    <i class="fas fa-hashtag text-pink-500 mr-2"></i> Kuantitas
                                </label>
                                <div class="relative">
                                    <div class="flex items-center max-w-xs">
                                        <button type="button" id="decrement" class="bg-gray-200 text-gray-700 px-4 py-3 rounded-l-lg hover:bg-gray-300 transition active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-pink-300">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="number" id="jumlah" name="jumlah" min="1" value="{{ old('jumlah', $jumlah ?? 1) }}"
                                            class="w-full px-4 py-3 border-t border-b border-gray-300 text-center focus:outline-none focus:ring-2 focus:ring-pink-300 @error('jumlah') border-pink-500 @enderror" required>
                                        <button type="button" id="increment" class="bg-gray-200 text-gray-700 px-4 py-3 rounded-r-lg hover:bg-gray-300 transition active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-pink-300">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    @error('jumlah')
                                    <p class="text-pink-500 text-sm mt-1 animate__animated animate__fadeIn"><i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="space-y-4">
                        <h3 class="text-lg font-bold text-gray-700 flex items-center">
                            <span class="bg-gradient-to-r from-pink-500 to-indigo-600 text-white w-8 h-8 rounded-full flex items-center justify-center mr-3 shadow-md">3</span>
                            Metode Pengiriman
                        </h3>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <input type="radio" id="pickup" name="pengiriman" value="pickup" class="hidden peer" {{ old('pengiriman', 'pickup') == 'pickup' ? 'checked' : '' }}>
                                <label for="pickup" class="flex flex-col items-center p-4 border-2 border-gray-200 rounded-xl cursor-pointer peer-checked:border-pink-500 peer-checked:bg-pink-50 peer-checked:shadow-md transition-all duration-300 h-full hover:border-pink-300">
                                    <div class="bg-pink-100 text-pink-600 w-12 h-12 rounded-full flex items-center justify-center mb-3 transform peer-checked:scale-110 transition duration-300">
                                        <i class="fas fa-store text-xl"></i>
                                    </div>
                                    <span class="font-semibold">Pickup</span>
                                    <span class="text-sm text-gray-500 text-center mt-1">Ambil di toko kami</span>
                                    <span class="text-xs text-pink-500 mt-2 font-medium">GRATIS</span>
                                    <div class="mt-2 text-xs text-gray-400 hidden peer-checked:block animate__animated animate__fadeIn">
                                        <i class="fas fa-info-circle mr-1"></i> Alamat toko akan dikirim via WhatsApp
                                    </div>
                                </label>
                            </div>

                            <div>
                                <input type="radio" id="delivery" name="pengiriman" value="delivery" class="hidden peer" {{ old('pengiriman') == 'delivery' ? 'checked' : '' }}>
                                <label for="delivery" class="flex flex-col items-center p-4 border-2 border-gray-200 rounded-xl cursor-pointer peer-checked:border-indigo-500 peer-checked:bg-indigo-50 peer-checked:shadow-md transition-all duration-300 h-full hover:border-indigo-300">
                                    <div class="bg-indigo-100 text-indigo-600 w-12 h-12 rounded-full flex items-center justify-center mb-3 transform peer-checked:scale-110 transition duration-300">
                                        <i class="fas fa-motorcycle text-xl"></i>
                                    </div>
                                    <span class="font-semibold">Delivery</span>
                                    <span class="text-sm text-gray-500 text-center mt-1">Antar ke alamat</span>
                                    <span class="text-xs text-indigo-500 mt-2 font-medium">+ Rp 10.000</span>
                                    <div class="mt-2 text-xs text-gray-400 hidden peer-checked:block animate__animated animate__fadeIn">
                                        <i class="fas fa-info-circle mr-1"></i> Ongkir tergantung lokasi
                                    </div>
                                </label>
                            </div>
                        </div>
                        @error('pengiriman')
                        <p class="text-pink-500 text-sm mt-1 animate__animated animate__fadeIn"><i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-4">
                        <h3 class="text-lg font-bold text-gray-700 flex items-center">
                            <span class="bg-gradient-to-r from-pink-500 to-indigo-600 text-white w-8 h-8 rounded-full flex items-center justify-center mr-3 shadow-md">4</span>
                            Catatan Tambahan
                        </h3>

                        <div class="relative">
                            <textarea id="catatan" name="catatan" rows="2"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300 pl-10 transition-all duration-200 @error('catatan') border-pink-500 @enderror"
                                placeholder="Contoh: Tambah topping cokelat, tanpa kacang, atau request khusus lainnya">{{ old('catatan') }}</textarea>
                            <i class="fas fa-edit absolute left-3 top-3 text-gray-400"></i>
                            @error('catatan')
                            <p class="text-pink-500 text-sm mt-1 animate__animated animate__fadeIn"><i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-pink-500 to-indigo-600 text-white py-4 rounded-xl font-bold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 active:translate-y-0 flex items-center justify-center relative overflow-hidden group">
                        <span class="relative z-10 flex items-center">
                            <i class="fas fa-paper-plane mr-2"></i> Lanjutkan Pembayaran
                        </span>
                        <span class="absolute inset-0 bg-gradient-to-r from-pink-600 to-indigo-700 opacity-0 group-hover:opacity-100 transition duration-300"></span>
                        <span class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 transition duration-300"></span>
                    </button>
                </form>
            </div>
        </div>

        <div class="fixed bottom-6 right-6 z-50">
            <button id="help-btn" class="w-14 h-14 bg-gradient-to-r from-pink-500 to-indigo-600 text-white rounded-full shadow-xl flex items-center justify-center hover:shadow-2xl transition-all duration-300 transform hover:scale-110 group">
                <i class="fas fa-question text-xl group-hover:rotate-12 transition-transform duration-300"></i>
            </button>
        </div>

        <div id="help-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden backdrop-blur-sm">
            <div class="bg-white rounded-2xl p-6 max-w-md w-full mx-4 animate__animated animate__fadeInUp shadow-2xl">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold text-gray-800">Butuh Bantuan?</h3>
                    <button id="close-help" class="text-gray-500 hover:text-gray-700 transition-colors duration-200">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                </div>
                <div class="space-y-4">
                    <div class="flex items-start bg-pink-50 p-4 rounded-lg hover:bg-pink-100 transition-colors duration-200">
                        <div class="bg-pink-100 text-pink-600 rounded-full p-3 mr-3 flex-shrink-0">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Hubungi Kami</h4>
                            <p class="text-gray-600 text-sm mt-1">0812-3456-7890</p>
                        </div>
                    </div>
                    <div class="flex items-start bg-indigo-50 p-4 rounded-lg hover:bg-indigo-100 transition-colors duration-200">
                        <div class="bg-indigo-100 text-indigo-600 rounded-full p-3 mr-3 flex-shrink-0">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">WhatsApp</h4>
                            <p class="text-gray-600 text-sm mt-1">
                                <a href="https://wa.me/6281234567890" class="text-indigo-600 hover:underline">Klik untuk chat langsung</a>
                            </p>
                        </div>
                    </div>
                    <div class="flex items-start bg-purple-50 p-4 rounded-lg hover:bg-purple-100 transition-colors duration-200">
                        <div class="bg-purple-100 text-purple-600 rounded-full p-3 mr-3 flex-shrink-0">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Lokasi Toko</h4>
                            <p class="text-gray-600 text-sm mt-1">Jl. Pudding Manis No. 123, Kota Manis</p>
                            <a href="https://maps.google.com?q=Jl.+Pudding+Manis+No.+123,+Kota+Manis" class="text-purple-600 text-xs hover:underline mt-1 inline-block">
                                <i class="fas fa-map-pin mr-1"></i> Lihat di Google Maps
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mt-6 pt-4 border-t border-gray-200">
                    <p class="text-sm text-gray-500">
                        <i class="far fa-clock mr-1"></i> Jam Operasional: 09.00 - 21.00 WIB (Setiap Hari)
                    </p>
                </div>
            </div>
        </div>

        <div id="toast" class="hidden fixed bottom-4 right-4 bg-gradient-to-r from-pink-500 to-indigo-600 text-white px-6 py-4 rounded-xl shadow-xl flex items-center animate__animated z-50 max-w-xs">
            <div class="bg-white/20 rounded-full p-2 mr-3 flex-shrink-0">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <span id="toast-message" class="font-medium text-sm"></span>
            <button id="close-toast" class="ml-4 text-white/70 hover:text-white">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <style>
            /* Custom animations */
            @keyframes float1 {
                0%, 100% { transform: translateY(0) translateX(0) rotate(0deg); }
                50% { transform: translateY(-20px) translateX(10px) rotate(5deg); }
            }
            @keyframes float2 {
                0%, 100% { transform: translateY(0) translateX(0) rotate(0deg); }
                50% { transform: translateY(-30px) translateX(-15px) rotate(-5deg); }
            }
            @keyframes float3 {
                0%, 100% { transform: translateY(0) translateX(0) rotate(0deg); }
                50% { transform: translateY(-15px) translateX(20px) rotate(3deg); }
            }
            @keyframes float4 {
                0%, 100% { transform: translateY(0) translateX(0) rotate(0deg); }
                50% { transform: translateY(-10px) translateX(-10px) rotate(-2deg); }
            }
            .animate-float1 {
                animation: float1 8s ease-in-out infinite;
            }
            .animate-float2 {
                animation: float2 10s ease-in-out infinite;
            }
            .animate-float3 {
                animation: float3 7s ease-in-out infinite;
            }
            .animate-float4 {
                animation: float4 9s ease-in-out infinite;
            }

            /* Custom scrollbar */
            .custom-scrollbar::-webkit-scrollbar {
                width: 6px;
            }
            .custom-scrollbar::-webkit-scrollbar-track {
                background: rgba(255,255,255,0.1);
                border-radius: 10px;
            }
            .custom-scrollbar::-webkit-scrollbar-thumb {
                background: rgba(255,255,255,0.3);
                border-radius: 10px;
            }
            .custom-scrollbar::-webkit-scrollbar-thumb:hover {
                background: rgba(255,255,255,0.5);
            }

            /* Enhanced input focus */
            input:focus, textarea:focus, select:focus {
                box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.2);
                border-color: rgba(236, 72, 153, 0.5);
            }

            /* Smooth transitions */
            .transition-all {
                transition-property: all;
                transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
                transition-duration: 200ms;
            }

            /* Radio button checked state */
            input[type="radio"]:checked + label {
                border-color: var(--checked-color); /* This variable is not defined in your CSS. It's best to use Tailwind classes directly or define custom properties. */
                background-color: var(--checked-bg); /* This variable is not defined in your CSS. */
            }

            /* Quantity input spinner removal */
            input[type=number]::-webkit-inner-spin-button,
            input[type=number]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
            input[type=number] {
                -moz-appearance: textfield;
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                // DOM elements
                const useAccountBtn = document.getElementById('use-account-btn');
                const namaInput = document.getElementById('nama_pemesan');
                const noWaInput = document.getElementById('telepon'); // Corrected ID from 'telepon' to 'telepon'
                const alamatInput = document.getElementById('alamat');
                const jumlahInput = document.getElementById('jumlah');
                const incrementBtn = document.getElementById('increment');
                const decrementBtn = document.getElementById('decrement');
                const form = document.querySelector('form');
                const toast = document.getElementById('toast');
                const toastMessage = document.getElementById('toast-message');
                const closeToast = document.getElementById('close-toast');
                const helpBtn = document.getElementById('help-btn');
                const helpModal = document.getElementById('help-modal');
                const closeHelp = document.getElementById('close-help');
                const deliveryOption = document.getElementById('delivery');
                const pickupOption = document.getElementById('pickup');

                // User data from PHP
                const user = @json($userData);

                // Show toast notification with animation
                const showToast = (message, type = 'info', duration = 3000) => {
                    const colors = {
                        info: 'bg-gradient-to-r from-pink-500 to-indigo-600',
                        error: 'bg-gradient-to-r from-red-500 to-pink-600',
                        success: 'bg-gradient-to-r from-green-500 to-teal-600',
                        warning: 'bg-gradient-to-r from-amber-500 to-orange-600'
                    };

                    toast.className = `hidden fixed bottom-4 right-4 text-white px-6 py-4 rounded-xl shadow-xl flex items-center z-50 animate__animated animate__fadeInRight ${colors[type]} max-w-xs`;
                    toastMessage.textContent = message;
                    toast.classList.remove('hidden');

                    // Clear any existing timeout
                    if (toast.timeoutId) {
                        clearTimeout(toast.timeoutId);
                    }

                    // Set new timeout
                    toast.timeoutId = setTimeout(() => {
                        hideToast();
                    }, duration);
                };

                // Hide toast with animation
                const hideToast = () => {
                    toast.classList.remove('animate__fadeInRight');
                    toast.classList.add('animate__fadeOutRight');
                    setTimeout(() => {
                        toast.classList.add('hidden');
                        toast.classList.remove('animate__fadeOutRight');
                    }, 300);
                };

                // Close toast when close button is clicked
                closeToast?.addEventListener('click', hideToast);

                // Handle help modal
                helpBtn?.addEventListener('click', () => {
                    helpModal.classList.remove('hidden');
                    helpModal.querySelector('div').classList.add('animate__fadeInUp');
                });

                closeHelp?.addEventListener('click', () => {
                    helpModal.querySelector('div').classList.remove('animate__fadeInUp');
                    helpModal.querySelector('div').classList.add('animate__fadeOutDown');
                    setTimeout(() => {
                        helpModal.classList.add('hidden');
                        helpModal.querySelector('div').classList.remove('animate__fadeOutDown');
                    }, 300);
                });

                // Close modal when clicking outside
                helpModal?.addEventListener('click', (e) => {
                    if (e.target === helpModal) {
                        helpModal.querySelector('div').classList.remove('animate__fadeInUp');
                        helpModal.querySelector('div').classList.add('animate__fadeOutDown');
                        setTimeout(() => {
                            helpModal.classList.add('hidden');
                            helpModal.querySelector('div').classList.remove('animate__fadeOutDown');
                        }, 300);
                    }
                });

                // Handle account info toggle
                if (useAccountBtn && namaInput && noWaInput && alamatInput) {
                    let usingAccount = false;

                    // Set initial values if user is logged in and no old data
                    // Check if old values are empty AND user is logged in
                    if ('{{ auth()->check() }}' && !'{{ old("nama_pemesan") }}' && !'{{ old("telepon") }}' && !'{{ old("alamat") }}') {
                        namaInput.value = user.name || '';
                        noWaInput.value = user.telepon || '';
                        alamatInput.value = user.alamat || '';
                        // Only mark as "using account" if there's actual data from the user object
                        if (user.name || user.telepon || user.alamat) {
                            usingAccount = true;
                            useAccountBtn.innerHTML = '<span class="relative z-10 flex items-center"><i class="fas fa-times-circle mr-2"></i> Hapus Data Akun Saya</span><span class="absolute inset-0 bg-gradient-to-r from-pink-200 to-pink-300 opacity-0 group-hover:opacity-100 transition duration-300"></span>';
                        }
                    }

                    useAccountBtn.addEventListener('click', () => {
                        usingAccount = !usingAccount;
                        if (usingAccount) {
                            namaInput.value = user.name || '';
                            noWaInput.value = user.telepon || '';
                            alamatInput.value = user.alamat || '';
                            useAccountBtn.innerHTML = '<span class="relative z-10 flex items-center"><i class="fas fa-times-circle mr-2"></i> Hapus Data Akun Saya</span><span class="absolute inset-0 bg-gradient-to-r from-pink-200 to-pink-300 opacity-0 group-hover:opacity-100 transition duration-300"></span>';
                            showToast('Data akun berhasil digunakan!', 'success');
                        } else {
                            namaInput.value = '';
                            noWaInput.value = '';
                            alamatInput.value = '';
                            useAccountBtn.innerHTML = '<span class="relative z-10 flex items-center"><i class="fas fa-user-circle mr-2"></i> Gunakan Data Akun Saya</span><span class="absolute inset-0 bg-gradient-to-r from-pink-200 to-pink-300 opacity-0 group-hover:opacity-100 transition duration-300"></span>';
                        }
                    });
                }

                // Quantity controls
                if (jumlahInput && incrementBtn && decrementBtn) {
                    // Add animation to quantity change
                    const animateQuantityChange = (direction) => {
                        jumlahInput.classList.add('animate__animated', `animate__${direction === 'up' ? 'bounceIn' : 'shakeX'}`); // Changed bounce to bounceIn for visual
                        setTimeout(() => {
                            jumlahInput.classList.remove('animate__animated', `animate__${direction === 'up' ? 'bounceIn' : 'shakeX'}`);
                        }, 1000);
                    };

                    incrementBtn.addEventListener('click', () => {
                        jumlahInput.value = parseInt(jumlahInput.value || '0') + 1; // Start from 0 if empty
                        animateQuantityChange('up');
                    });

                    decrementBtn.addEventListener('click', () => {
                        const newValue = Math.max(1, parseInt(jumlahInput.value || '0') - 1); // Ensure minimum is 1
                        jumlahInput.value = newValue;
                        if (newValue === 1) {
                            animateQuantityChange('down');
                            showToast('Jumlah minimal pesanan adalah 1', 'warning');
                        } else {
                            animateQuantityChange('up'); // Animate up even on decrement if valid
                        }
                    });

                    jumlahInput.addEventListener('input', () => {
                        // Ensure input is a valid positive number
                        let value = parseInt(jumlahInput.value);
                        if (isNaN(value) || value < 1) {
                            jumlahInput.value = 1;
                            animateQuantityChange('down');
                            showToast('Masukkan jumlah yang valid (minimal 1)', 'error');
                        }
                    });

                    // Add focus styles for keyboard accessibility
                    incrementBtn.addEventListener('focus', () => {
                        incrementBtn.classList.add('ring-2', 'ring-pink-300');
                    });
                    incrementBtn.addEventListener('blur', () => {
                        incrementBtn.classList.remove('ring-2', 'ring-pink-300');
                    });
                    decrementBtn.addEventListener('focus', () => {
                        decrementBtn.classList.add('ring-2', 'ring-pink-300');
                    });
                    decrementBtn.addEventListener('blur', () => {
                        decrementBtn.classList.remove('ring-2', 'ring-pink-300');
                    });
                }

                // Phone number validation
                let phoneValidationTimeout;
                noWaInput?.addEventListener('input', (e) => {
                    clearTimeout(phoneValidationTimeout);
                    const value = e.target.value;

                    // Remove non-numeric characters
                    e.target.value = value.replace(/\D/g, '');

                    phoneValidationTimeout = setTimeout(() => {
                        // Validates for 9 to 12 digits (after stripping +62 if present)
                        if (e.target.value && !/^\d{9,12}$/.test(e.target.value)) {
                            animateInput(e.target, 'shakeX');
                            showToast('Nomor WhatsApp harus 9-12 digit (tanpa +62)', 'error');
                        } else {
                            // If valid, remove error classes
                            e.target.classList.remove('border-pink-500', 'animate__animated', 'animate__shakeX');
                        }
                    }, 500);
                });

                // Real-time required field validation for main inputs
                [namaInput, noWaInput, alamatInput].forEach(input => {
                    input?.addEventListener('input', () => {
                        if (input.value.trim() === '') {
                            input.classList.add('border-pink-500', 'animate__animated', 'animate__shakeX');
                            // No toast here to avoid spamming, will show on submit
                            setTimeout(() => input.classList.remove('border-pink-500', 'animate__animated', 'animate__shakeX'), 1000);
                        } else {
                            input.classList.remove('border-pink-500', 'animate__animated', 'animate__shakeX');
                        }
                    });
                });

                // Delivery method selection effects
                if (deliveryOption && pickupOption) {
                    // Re-apply checked styles on page load if 'old' value is set
                    const updateRadioStyles = () => {
                        if (pickupOption.checked) {
                            document.querySelector('label[for="pickup"]')?.classList.add('peer-checked:border-pink-500', 'peer-checked:bg-pink-50', 'peer-checked:shadow-md');
                            document.querySelector('label[for="delivery"]')?.classList.remove('peer-checked:border-indigo-500', 'peer-checked:bg-indigo-50', 'peer-checked:shadow-md');
                        } else if (deliveryOption.checked) {
                            document.querySelector('label[for="delivery"]')?.classList.add('peer-checked:border-indigo-500', 'peer-checked:bg-indigo-50', 'peer-checked:shadow-md');
                            document.querySelector('label[for="pickup"]')?.classList.remove('peer-checked:border-pink-500', 'peer-checked:bg-pink-50', 'peer-checked:shadow-md');
                        }
                    };
                    updateRadioStyles(); // Call on load

                    pickupOption.addEventListener('change', () => {
                        animateInput(document.querySelector('label[for="pickup"]'), 'pulse'); // Animate the label
                        updateRadioStyles(); // Update colors immediately
                    });

                    deliveryOption.addEventListener('change', () => {
                        animateInput(document.querySelector('label[for="delivery"]'), 'pulse'); // Animate the label
                        updateRadioStyles(); // Update colors immediately
                    });
                }

                // Form submission validation
                form?.addEventListener('submit', (e) => {
                    let hasError = false;
                    const requiredInputs = [namaInput, noWaInput, alamatInput];

                    // Add quantity input if exists and is relevant (for single menu order)
                    if (jumlahInput) requiredInputs.push(jumlahInput);

                    // Validate required fields
                    requiredInputs.forEach(input => {
                        if (input && input.value.trim() === '') {
                            animateInput(input, 'shakeX');
                            hasError = true;
                        }
                    });

                    // Specific WhatsApp number validation
                    if (noWaInput && !/^\d{9,12}$/.test(noWaInput.value)) {
                        animateInput(noWaInput, 'shakeX');
                        hasError = true;
                    }

                    // Specific quantity validation if it exists and is relevant
                    if (jumlahInput && (parseInt(jumlahInput.value) < 1 || isNaN(parseInt(jumlahInput.value)))) {
                        animateInput(jumlahInput, 'shakeX');
                        hasError = true;
                    }

                    // Delivery method validation
                    const deliveryMethod = document.querySelector('input[name="pengiriman"]:checked');
                    if (!deliveryMethod) {
                        hasError = true;
                        showToast('Pilih metode pengiriman terlebih dahulu', 'error');
                    }

                    if (hasError) {
                        e.preventDefault();
                        // Only show generic toast if specific errors are already shown or fields are empty
                        if (!document.querySelector('.text-pink-500.text-sm.mt-1')) {
                             showToast('Harap lengkapi semua kolom dengan benar!', 'error');
                        }
                    } else {
                        // Show loading state on submit button
                        const submitBtn = form.querySelector('button[type="submit"]');
                        if (submitBtn) {
                            submitBtn.innerHTML = '<span class="relative z-10 flex items-center"><i class="fas fa-spinner fa-spin mr-2"></i> Memproses...</span><span class="absolute inset-0 bg-gradient-to-r from-pink-600 to-indigo-700 opacity-0 group-hover:opacity-100 transition duration-300"></span>';
                            submitBtn.disabled = true;

                            // Add slight delay to show the loading state
                            setTimeout(() => {
                                form.submit();
                            }, 500);
                        }
                    }
                });

                // Helper function to animate inputs
                function animateInput(element, animation) {
                    element.classList.add('animate__animated', `animate__${animation}`);
                    setTimeout(() => {
                        element.classList.remove('animate__animated', `animate__${animation}`);
                    }, 1000);
                }

                // Add subtle animation to form sections when they come into view
                const observerOptions = {
                    threshold: 0.1
                };

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('animate__animated', 'animate__fadeInUp');
                            observer.unobserve(entry.target);
                        }
                    });
                }, observerOptions);

                document.querySelectorAll('form > div').forEach(section => {
                    // Only observe sections that don't have existing old() errors, to let Blade handle first render errors
                    if (!section.querySelector('.text-pink-500.text-sm.mt-1')) {
                        section.classList.add('opacity-0'); // Hide initially to animate in
                        observer.observe(section);
                    }
                });
            });
        </script>
    </body>
@endsection