@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
<body class="bg-gradient-to-br from-pink-50 to-rose-50 min-h-screen">
    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 relative">
            <div class="absolute -top-6 -left-6 w-16 h-16 rounded-full bg-pink-200 opacity-30"></div>
            <div class="absolute -bottom-6 -right-6 w-16 h-16 rounded-full bg-rose-200 opacity-30"></div>
            <h1 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-rose-600 mb-3 relative z-10">Keranjang Belanja</h1>
            <p class="text-gray-600 relative z-10">Kelola item di keranjang Anda sebelum melanjutkan ke pemesanan</p>
            <div class="absolute top-12 right-0 w-24 h-1 bg-gradient-to-r from-pink-300 to-rose-300 rounded-full"></div>
        </div>

        @if (session('success'))
            <div class="bg-gradient-to-r from-pink-100 to-rose-100 border-l-4 border-pink-500 text-pink-800 p-4 rounded-lg mb-6 shadow-md flex items-center">
                <i class="fas fa-check-circle text-pink-500 mr-3 text-xl"></i>
                <div>{{ session('success') }}</div>
            </div>
        @endif
        @if (session('error'))
            <div class="bg-gradient-to-r from-rose-100 to-pink-100 border-l-4 border-rose-500 text-rose-800 p-4 rounded-lg mb-6 shadow-md flex items-center">
                <i class="fas fa-exclamation-circle text-rose-500 mr-3 text-xl"></i>
                <div>{{ session('error') }}</div>
            </div>
        @endif

        @if ($carts->isNotEmpty())
            <div class="space-y-6">
                @foreach ($carts as $cart)
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-pink-100 flex flex-col sm:flex-row items-center justify-between transition-all duration-300 hover:shadow-lg hover:border-pink-200">
                        <div class="flex items-center gap-5 mb-4 sm:mb-0">
                            <div class="relative">
                                <img src="{{ $cart->menu->gambar ? asset('storage/' . $cart->menu->gambar) : 'https://via.placeholder.com/80' }}"
                                        alt="{{ $cart->menu->nama }}"
                                        class="w-20 h-20 object-cover rounded-lg shadow-inner border border-pink-100">
                                <div class="absolute -top-2 -right-2 bg-pink-500 text-white text-xs font-bold rounded-full w-6 h-6 flex items-center justify-center">
                                    {{ $cart->jumlah }}
                                </div>
                            </div>
                            <div>
                                <h4 class="text-gray-800 font-medium text-lg">{{ $cart->menu->nama }}</h4>
                                <p class="text-pink-600 font-semibold">Rp {{ number_format($cart->menu->harga, 0, ',', '.') }}</p>
                                <p class="text-gray-500 text-sm mt-1">Subtotal: Rp {{ number_format($cart->menu->harga * $cart->jumlah, 0, ',', '.') }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3">
                            <div class="flex items-center border border-pink-200 rounded-full overflow-hidden">
                                <form action="{{ route('cart.update', $cart->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="action" value="decrease">
                                    <button type="submit" class="bg-pink-100 text-pink-700 px-3 py-1 hover:bg-pink-200 transition h-full">
                                        <i class="fas fa-minus text-xs"></i>
                                    </button>
                                </form>
                                <span class="px-3 py-1 text-center text-sm w-8">{{ $cart->jumlah }}</span>
                                <form action="{{ route('cart.update', $cart->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="action" value="increase">
                                    <button type="submit" class="bg-pink-100 text-pink-700 px-3 py-1 hover:bg-pink-200 transition h-full">
                                        <i class="fas fa-plus text-xs"></i>
                                    </button>
                                </form>
                            </div>

                            <form action="{{ route('cart.remove', $cart->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-rose-500 hover:text-rose-700 transition-colors duration-200">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-10 text-center">
                <a href="{{ route('order.cart') }}"
                    class="relative inline-block bg-gradient-to-r from-pink-500 to-rose-500 text-white px-8 py-3 rounded-full font-bold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <i class="fas fa-credit-card mr-2"></i> Lanjutkan ke Pembayaran
                </a>
            </div>
        @else
            <div class="text-center bg-white p-8 rounded-xl shadow-sm border border-pink-100 max-w-md mx-auto">
                <div class="w-24 h-24 bg-pink-100 rounded-full mx-auto flex items-center justify-center mb-6">
                    <i class="fas fa-shopping-cart text-pink-500 text-3xl"></i>
                </div>
                <h3 class="text-xl font-medium text-gray-800 mb-2">Keranjang Anda kosong</h3>
                <p class="text-gray-600 mb-6">Mulai berbelanja dan tambahkan menu favorit Anda</p>
                <a href="{{ route('menus.index') }}" 
                    class="inline-block bg-gradient-to-r from-pink-400 to-rose-400 text-white px-6 py-2 rounded-full font-medium shadow hover:shadow-md transition">
                    <i class="fas fa-utensils mr-2"></i> Jelajahi Menu
                </a>
            </div>
        @endif
    </div>
</body>
@endsection