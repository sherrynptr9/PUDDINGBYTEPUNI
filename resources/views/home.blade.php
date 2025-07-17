@extends('layouts.app')

@section('title', 'Home')

@section('head')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
@endsection

@section('content')

<!-- Hero Section -->
<section class="hero-section text-white py-24 md:py-32 bg-gradient-to-br from-pink-500 to-pink-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="md:flex md:items-center md:space-x-12">
            <!-- Text -->
            <div class="md:w-1/2">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">Puding by Tepuni</h1>
                <p class="text-base md:text-lg leading-relaxed mb-6 text-white/90">
                    <strong>Puding by Tepuni</strong> adalah usaha rumahan yang bergerak di bidang kuliner manis, khususnya puding dengan rasa khas dan tampilan menarik. 
                </p>
                <p class="text-base md:text-lg leading-relaxed mb-6 text-white/90">
                    Kami melayani sistem <em>preorder</em> maksimal H-2 agar puding selalu fresh, tanpa bahan pengawet.
                </p>
                <p class="text-base md:text-lg leading-relaxed mb-8 text-white/90">
                    Terima kasih telah mempercayakan momen manis Anda bersama <strong>Puding by Tepuni</strong>.
                </p>
            </div>

            <!-- Image -->
            <div class="md:w-1/2 mt-12 md:mt-0 ml-25">
                <img src="{{ asset('storage/images/Pudding Regal Loyang Besar.png') }}" alt="Pudding Regal Loyang Besar Image" class="w-full max-w-md mx-auto md:mx-0 shadow-lg rounded-lg">
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center">
        <!-- Image -->
        <div class="md:w-1/2 mb-10 md:mb-0 md:pr-10 relative">
            <img src="{{ asset('storage/images/Regal.jpg') }}" alt="Puding" class="rounded-lg shadow-xl w-full">
            <div class="absolute -bottom-6 -right-6 bg-pink-500 text-white p-4 rounded-full shadow-lg">
                <i class="fas fa-heart text-3xl"></i>
            </div>
        </div>

        <!-- Text -->
        <div class="md:w-1/2">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">Our Story</h2>
            <p class="text-lg text-gray-600 mb-4">
                Berawal dari dapur kecil pada tahun 2015, Tepuni mulai membuat puding untuk keluarga dan teman-temannya.
            </p>
            <p class="text-lg text-gray-600 mb-6">
                Kini, kami menjadi brand lokal yang dipercaya dengan tetap mempertahankan rasa dan kualitas seperti awal berdiri.
            </p>

            <div class="flex items-center mt-6">
                <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="Tepuni" class="h-16 w-16 rounded-full border-4 border-pink-200">
                <div class="ml-4">
                    <h4 class="text-lg font-semibold text-gray-900">Stevefanny Putri</h4>
                    <p class="text-pink-600">Founder & Head Chef</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Menu Favorit -->
<section id="menu" class="py-16 bg-pink-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Favorit Kami</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Menu pilihan yang paling disukai pelanggan kami</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($favoritMenus as $menu)
                <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 flex flex-col overflow-hidden">
                    <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->nama }}" class="w-full h-48 object-cover">
                    <div class="p-6 flex flex-col flex-1">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $menu->nama }}</h3>
                        <p class="text-gray-600 mb-4 flex-1">{{ Str::limit($menu->deskripsi, 80) }}</p>
                        <div class="mb-3 flex justify-between items-center">
                            <span class="text-pink-600 font-bold text-lg">Rp {{ number_format($menu->harga, 0, ',', '.') }}</span>
                            <i class="fas fa-heart text-pink-500"></i>
                        </div>
                        <div class="flex space-x-2">
                            <!-- Order Button (Green) -->
                            <a href="{{ route('order.form', $menu->id) }}"
                               class="flex-1 bg-green-500 hover:bg-green-600 text-white py-2= px-4 rounded-lg text-sm font-semibold flex items-center justify-center transition">
                                <i class="fas fa-utensils mr-1"></i> Order
                            </a>

                            <!-- Add to Cart Button (Pink) -->
                            <form action="{{ route('cart.add', $menu->id) }}" method="POST" class="flex-1">
                                @csrf
                                <input type="hidden" name="jumlah" value="1">
                                <button type="submit"
                                        class="w-full bg-pink-500 hover:bg-pink-600 text-white py-2 px-4 rounded-lg text-sm font-semibold flex items-center justify-center transition">
                                    <i class="fas fa-shopping-cart mr-1"></i> Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500 col-span-full">Belum ada menu favorit.</p>
            @endforelse
        </div>

        <!-- View All Button -->
        <div class="mt-10 text-center">
            <a href="{{ route('menus.index') }}"
               class="inline-block bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-6 rounded-full shadow-md transition">
                <i class="fas fa-list mr-2"></i> View All Menu
            </a>
        </div>
    </div>
</section>
@endsection
