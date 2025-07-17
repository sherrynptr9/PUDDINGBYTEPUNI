@extends('layouts.app')

@section('title', 'All Menu')

@section('content')
<section class="py-16 bg-gradient-to-b from-pink-50 to-white min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="text-center mb-16">
            <div class="relative inline-block">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 animate-fade-in-down relative z-10">
                    Discover Our <span class="text-pink-600">Delicious</span> Pudding Collection
                </h1>
                <div class="absolute -bottom-2 left-0 right-0 h-3 bg-pink-100 opacity-60 rounded-full animate-scale-x"></div>
            </div>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto animate-fade-in-up delay-100">
                Indulge in our handcrafted puddings made with love and the finest ingredients
            </p>
        </div>

        <!-- Menu Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($menus as $menu)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 flex flex-col group border border-white hover:border-pink-100">
                    <!-- Image with Favorite Badge -->
                    <div class="relative overflow-hidden h-56">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent z-10"></div>
                        <img src="{{ asset($menu->gambar ? 'storage/' . $menu->gambar : 'storage/images/fallback.jpg') }}" 
                             alt="{{ $menu->nama }}" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        
                        @if($menu->is_favorit)
                            <div class="absolute top-4 right-4 bg-pink-500 text-white px-3 py-1 rounded-full text-xs font-bold flex items-center shadow-lg z-20">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                </svg>
                                Favorite
                            </div>
                        @endif
                    </div>
                    
                    <!-- Content -->
                    <div class="p-6 flex flex-col flex-1">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-xl font-bold text-gray-800 group-hover:text-pink-600 transition-colors">{{ $menu->nama }}</h3>
                            <span class="text-pink-600 font-bold text-lg bg-pink-50 px-2 py-1 rounded-md">Rp {{ number_format($menu->harga, 0, ',', '.') }}</span>
                        </div>
                        
                        <p class="text-gray-600 mb-4 flex-1">{{ Str::limit($menu->deskripsi, 80) }}</p>
                        
                        <!-- Rating and Category -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <div class="flex text-yellow-400 mr-2">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $menu->rating)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                            </svg>
                                        @endif
                                    @endfor
                                </div>
                                <span class="text-gray-500 text-sm">({{ $menu->review_count }})</span>
                            </div>
                            <span class="text-xs font-medium bg-gray-100 text-gray-600 px-2 py-1 rounded-full">{{ $menu->category }}</span>
                        </div>

                        <!-- Action Buttons -->
                        <div class="grid grid-cols-2 gap-3 mt-auto">
                            <!-- Order Button -->
                            @auth
                                <a href="{{ route('order.form', $menu->id) }}?source=menu"
                                   class="relative overflow-hidden bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white py-3 px-4 rounded-lg font-semibold flex items-center justify-center transition-all shadow hover:shadow-md group">
                                    <span class="relative z-10 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        Order
                                    </span>
                                    <span class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 transition-opacity"></span>
                                </a>
                            @else
                                <a href="{{ route('auth.login') }}?redirect={{ urlencode(route('order.form', $menu->id) . '?source=menu') }}"
                                   class="relative overflow-hidden bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white py-3 px-4 rounded-lg font-semibold flex items-center justify-center transition-all shadow hover:shadow-md group">
                                    <span class="relative z-10 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        Order
                                    </span>
                                    <span class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 transition-opacity"></span>
                                </a>
                            @endauth

                            <!-- Add to Cart Button -->
                            @auth
                                <form action="{{ route('cart.add', $menu->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="jumlah" value="1">
                                    <button type="submit"
                                            class="relative overflow-hidden w-full bg-gradient-to-r from-pink-500 to-pink-600 hover:from-pink-600 hover:to-pink-700 text-white py-3 px-4 rounded-lg font-semibold flex items-center justify-center transition-all shadow hover:shadow-md group">
                                        <span class="relative z-10 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                            </svg>
                                            Add to Cart
                                        </span>
                                        <span class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 transition-opacity"></span>
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('auth.login') }}?redirect={{ urlencode(route('cart.add', $menu->id)) }}"
                                   class="w-full bg-pink-300 text-white py-3 px-4 rounded-lg font-semibold flex items-center justify-center transition cursor-not-allowed relative overflow-hidden group">
                                    <span class="relative z-10 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        Login to Add
                                    </span>
                                    <span class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 transition-opacity"></span>
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center bg-white rounded-xl shadow-md p-8 animate-bounce-in">
                    <div class="mx-auto w-24 h-24 mb-4 text-pink-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">No Puddings Available</h3>
                    <p class="text-gray-600 mb-4">We're currently preparing fresh batches of delicious puddings!</p>
                    <a href="{{ route('home') }}" class="inline-block relative overflow-hidden bg-pink-500 text-white px-6 py-2 rounded-lg hover:bg-pink-600 transition group">
                        <span class="relative z-10">Back to Home</span>
                        <span class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 transition-opacity"></span>
                    </a>
                </div>
            @endforelse
        </div>

        @if ($menus->hasPages())
            <div class="mt-12 flex justify-center">
                {{ $menus->links('vendor.pagination.tailwind') }}
            </div>
        @endif
        
        <!-- Special Offer Banner -->
        <div class="mt-16 bg-gradient-to-r from-pink-500 to-purple-600 rounded-2xl p-6 text-white shadow-xl relative overflow-hidden">
            <div class="absolute -right-10 -top-10 w-32 h-32 bg-white/10 rounded-full"></div>
            <div class="absolute -right-5 -bottom-5 w-24 h-24 bg-white/10 rounded-full"></div>
            <div class="relative z-10 flex flex-col md:flex-row items-center justify-between">
                <div class="mb-4 md:mb-0">
                    <h3 class="text-xl font-bold">Special Weekend Offer!</h3>
                    <p class="opacity-90">Get 15% off on all puddings ordered on Saturday & Sunday</p>
                </div>
                <button class="relative overflow-hidden bg-white text-pink-600 px-6 py-2 rounded-full font-semibold hover:bg-gray-100 transition shadow-lg group">
                    <span class="relative z-10">Order Now</span>
                    <span class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                </button>
            </div>
        </div>
    </div>
</section>

<style>
    .animate-fade-in-down {
        animation: fadeInDown 0.6s ease-out forwards;
    }
    .animate-fade-in-up {
        animation: fadeInUp 0.6s ease-out forwards;
    }
    .animate-scale-x {
        animation: scaleX 0.8s ease-out forwards;
    }
    .delay-100 {
        animation-delay: 0.1s;
    }
    .delay-200 {
        animation-delay: 0.2s;
    }
    .animate-bounce-in {
        animation: bounceIn 0.8s ease-out forwards;
    }
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    @keyframes scaleX {
        from {
            transform: scaleX(0);
        }
        to {
            transform: scaleX(1);
        }
    }
    @keyframes bounceIn {
        0% {
            opacity: 0;
            transform: scale(0.5);
        }
        50% {
            opacity: 1;
            transform: scale(1.05);
        }
        100% {
            transform: scale(1);
        }
    }
</style>
@endsection