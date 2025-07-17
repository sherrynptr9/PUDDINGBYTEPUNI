@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
<body class="bg-pink-50 min-h-screen">
<div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">

    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center">
            <i class="fas fa-shopping-cart text-3xl text-pink-600 mr-3"></i>
            <h1 class="text-3xl font-bold text-pink-600">Keranjang Belanja</h1>
        </div>
        <span id="item-count" class="bg-pink-600 text-white text-sm font-semibold px-2.5 py-0.5 rounded-full">
            {{ $carts->count() }}
        </span>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg shadow-sm flex justify-between items-center">
            <div>
                <i class="fas fa-check-circle mr-2"></i>
                <span>{{ session('success') }}</span>
            </div>
            <button onclick="this.parentElement.remove()" class="text-green-700 hover:text-green-900">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    @if ($carts->isEmpty())
        <!-- Empty Cart State -->
        <div id="empty-cart" class="text-center bg-white p-8 rounded-xl shadow-sm border border-pink-100">
            <h3 class="text-xl font-semibold text-gray-700 mb-2">Keranjang kamu masih kosong</h3>
            <p class="text-gray-500 mb-6">Mulai belanja dan temukan menu favoritmu!</p>
            <a href="{{ route('menus.index') }}" class="inline-block bg-pink-600 hover:bg-pink-700 text-white font-semibold py-2 px-6 rounded-full shadow-md transition">
                <i class="fas fa-utensils mr-2"></i> Lihat Menu
            </a>
        </div>
    @else
        <!-- Cart Items -->
        <div id="cart-items" class="space-y-4">
            @foreach($carts as $cart)
                <div class="cart-item bg-white p-5 rounded-xl shadow-sm border border-pink-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <div class="flex items-start gap-4">
                        <img src="{{ $cart->menu->gambar ? asset('storage/' . $cart->menu->gambar) : 'https://via.placeholder.com/80' }}" 
                             alt="{{ $cart->menu->nama }}" 
                             class="w-20 h-20 object-cover rounded-lg">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">{{ $cart->menu->nama }}</h3>
                            <p class="text-pink-600 font-medium mt-1">Rp {{ number_format($cart->menu->harga, 0, ',', '.') }}</p>
                            <div class="mt-2 flex items-center">
                                <!-- Kurangi Jumlah -->
                                <form method="POST" action="{{ route('cart.update', $cart->id) }}" class="mr-1">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="action" value="decrease">
                                    <button type="submit" class="w-7 h-7 border border-pink-300 rounded-full text-pink-600">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </form>

                                <!-- Jumlah Sekarang -->
                                <span class="w-10 text-center text-sm text-gray-700">{{ $cart->jumlah }}</span>

                                <!-- Tambah Jumlah -->
                                <form method="POST" action="{{ route('cart.update', $cart->id) }}" class="ml-1">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="action" value="increase">
                                    <button type="submit" class="w-7 h-7 border border-pink-300 rounded-full text-pink-600">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('cart.remove', $cart->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="remove-btn text-red-500 hover:text-red-700 p-2 rounded-full hover:bg-red-50" title="Hapus item">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
            @endforeach
        </div>

        <!-- Catatan -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-pink-100 mt-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Catatan Pesanan</h3>
            <textarea class="w-full p-3 border border-pink-200 rounded-lg focus:ring-2 focus:ring-pink-300 focus:border-pink-400" 
                      rows="3" placeholder="Contoh: Jangan pakai cabe, minta extra saus, dll."></textarea>
        </div>

        <!-- Order Summary (Tanpa Biaya Pengiriman) -->
        @php
            $subtotal = $carts->sum(function($c) {
                return $c->menu->harga * $c->jumlah;
            });
        @endphp

        <div id="order-summary" class="bg-white p-6 rounded-xl shadow-sm border border-pink-100 mt-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Ringkasan Pesanan</h3>
            <div class="space-y-3">
                <div class="flex justify-between">
                    <span class="text-gray-600">Subtotal</span>
                    <span class="font-medium">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                </div>
                <div class="border-t border-gray-200 pt-3 mt-3 flex justify-between">
                    <span class="text-lg font-bold text-gray-800">Total</span>
                    <span class="text-lg font-bold text-pink-600">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                </div>
            </div>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row justify-between gap-4 mt-6">
                <a href="{{ route('menus.index') }}" 
                   class="w-full sm:w-auto bg-pink-600 hover:bg-pink-700 text-white font-semibold py-3 px-6 rounded-full shadow-md transition text-center">
                    <i class="fas fa-arrow-left mr-2"></i> Lanjut Belanja
                </a>
                <a href="{{ route('order.form', $carts->first()->menu_id) }}" 
                   class="w-full sm:w-auto bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-full shadow-md transition text-center">
                    <i class="fas fa-check-circle mr-2"></i> Lanjutkan Pesanan
                </a>
            </div>
        </div>
    @endif
</div>
@endsection
