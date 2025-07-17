@extends('layouts.app')

@section('title', 'All Menu')

@section('content')
<section class="py-16 bg-pink-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">All Pudding Menu</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Temukan berbagai pilihan puding favoritmu di sini.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($menus as $menu)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition flex flex-col">
                    <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->nama }}" class="w-full h-48 object-cover">
                    <div class="p-6 flex flex-col flex-1">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $menu->nama }}</h3>
                        <p class="text-gray-600 mb-4 flex-1">{{ Str::limit($menu->deskripsi, 80) }}</p>

                        <div class="mb-3 flex justify-between items-center">
                            <span class="text-pink-600 font-bold">Rp {{ number_format($menu->harga, 0, ',', '.') }}</span>
                            @if($menu->is_favorit)
                                <i class="fas fa-heart text-pink-500"></i>
                            @endif
                        </div>

                        <div class="grid grid-cols-2 gap-2 mt-auto">
                            <!-- Order Button -->
                            <a href="{{ route('order.form', $menu->id) }}"
                               class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg text-sm font-semibold flex items-center justify-center transition">
                                <i class="fas fa-utensils mr-1"></i> Order
                            </a>

                            <!-- Add to Cart Button -->
                            <form action="{{ route('cart.add', $menu->id) }}" method="POST">
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
                <p class="col-span-full text-center text-gray-500">Belum ada menu tersedia.</p>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $menus->links() }}
        </div>
    </div>
</section>
@endsection
