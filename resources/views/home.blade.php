@extends('layouts.app')

@section('title', 'Home - Puding by Tepuni')

@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }

        .hero-section {
            background: linear-gradient(135deg, #ec4899 0%, #7c3aed 100%);
            position: relative;
            overflow: hidden;
        }

        .hero-section::before,
        .hero-section::after {
            content: '';
            position: absolute;
            border-radius: 50%;
        }

        .hero-section::before {
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: rgba(255,255,255,0.1);
        }

        .hero-section::after {
            bottom: -100px;
            left: -100px;
            width: 300px;
            height: 300px;
            background: rgba(255,255,255,0.05);
        }

        .menu-card {
            transition: all 0.3s ease;
            border-radius: 16px;
            overflow: hidden;
            position: relative;
        }

        .menu-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .menu-img {
            transition: all 0.5s ease;
            height: 220px;
            object-fit: cover;
        }

        .menu-card:hover .menu-img {
            transform: scale(1.05);
        }

        .btn-primary {
            background: linear-gradient(135deg, #ec4899 0%, #7c3aed 100%);
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(124, 58, 237, 0.4);
        }

        .section-title {
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 50%;
            height: 4px;
            background: linear-gradient(90deg, #ec4899 0%, #7c3aed 100%);
            border-radius: 2px;
        }
    </style>


<!-- Hero Section -->
<section class="hero-section text-white py-24 md:py-32 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="md:flex md:items-center md:space-x-12">
            <!-- Text -->
            <div class="md:w-1/2 animate__animated animate__fadeInLeft">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">Puding by Tepuni</h1>
                <p class="text-base md:text-lg leading-relaxed mb-6 text-white/90">
                    <strong>Puding by Tepuni</strong> adalah usaha rumahan yang bergerak di bidang kuliner manis, khususnya puding dengan rasa khas dan tampilan menarik.
                </p>
                <p class="text-base md:text-lg leading-relaxed mb-6 text-white/80">
                    Kami melayani sistem <em>preorder</em> maksimal H-2 agar puding selalu fresh, tanpa bahan pengawet.
                </p>
                <p class="text-base md:text-lg font-semibold mb-8 text-white/90">
                    Terima kasih telah mempercayakan momen manis Anda bersama <strong>Puding by Tepuni</strong>.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#menu" class="btn-primary text-white font-semibold py-3 px-8 rounded-full text-center" aria-label="Order puddings now">
                        <i class="fas fa-utensils mr-2"></i> Order Now
                    </a>
                    <a href="#about" class="bg-white text-pink-600 font-semibold py-3 px-8 rounded-full text-center hover:bg-gray-100 transition" aria-label="Learn more about Puding by Tepuni">
                        <i class="fas fa-info-circle mr-2"></i> Learn More
                    </a>
                </div>
            </div>

            <!-- Image -->
            <div class="md:w-1/2 mt-12 md:mt-0 animate__animated animate__fadeInRight">
                <img src="{{ asset('storage/images/Pudding Regal Loyang Besar.png') }}" alt="Pudding Regal Loyang Besar" class="w-full max-w-md mx-auto md:mx-0 shadow-md rounded upset-lg border-8 border-white" loading="lazy">
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center justify-center gap-12">
            <!-- Image -->
            <div class="md:w-1/2">
                <div class="relative">
                    <img src="{{ asset('storage/images/Pudding.jpg') }}" alt="Our Puddings" class="rounded-lg shadow-md w-full max-w-lg" loading="lazy">
                    <div class="absolute top-0 right-0 bg-blue-500 text-white p-4 rounded-full shadow">
                        <i class="fas fa-heart text-3xl"></i>
                    </div>
                </div>
            </div>

            <!-- Text -->
            <div class="md:w-1/2">
                <h2 class="section-title text-4xl font-bold text-gray-900 mb-6">Our Story</h2>
                <p class="text-lg text-gray-600 mb-4">
                    Berawal dari dapur kecil pada tahun 2015, Tepuni mulai membuat puding untuk keluarga dan teman-temannya.
                </p>
                <p class="text-lg text-gray-600 mb-6">
                    Kini, kami menjadi brand lokal yang dipercaya dengan tetap mempertahankan rasa kualitas seperti awal berdiri.
                </p>
                <div class="flex items-center mt-6">
                    <img src="{{ asset('storage/images/Foto fanny.jpg') }}" alt="Stevefanny Putri" class="h-16 w-16 rounded-full border-4 border-blue-200">
                    <div class="ml-4">
                        <h4 class="text-lg font-semibold text-gray-900">Stevefanny Putri</h4>
                        <p class="text-blue-600">Founder & Head Chef</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Menu Favorit -->
<section id="menu" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="section-title text-3xl font-semibold text-gray-900">Favorit Kami</h2>
            <p class="text-gray-500 max-w-2xl mx-auto">Menu pilihan yang paling disukai pelanggan kami</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($favoritMenus as $menu)
                <div class="menu-card bg-white rounded-2xl shadow-md hover:shadow-lg transition-all duration-200 ease-in-out flex flex-col overflow-hidden">
                    <div class="overflow-hidden">
                        <img src="{{ asset($menu->image ? 'storage/images/' . $menu->image : 'storage/images/fallback.jpg') }}" alt="{{ $menu->name }}" class="menu-img w-full h-48 object-cover" loading="lazy">
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $menu->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ $menu->description }}</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-blue-600 font-bold text-lg">Rp {{ number_format($menu->price, 0, ',', '.') }}</span>
                            <div class="flex text-yellow-400 text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                        <a href="#order" class="btn-primary text-white font-semibold py-2 px-4 rounded-full text-center mt-auto">Order Now</a>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500 col-span-full">No favorite menus available at the moment.</p>
            @endforelse
        </div>
    </div>
</section>

@endsection