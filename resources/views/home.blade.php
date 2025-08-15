@extends('layouts.app')

@section('title', 'Home - Puding by Tepuni')

@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

    <!-- Hero Section -->
    <section class="hero-section text-white">
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        
        <div class="container">
            <div class="hero-content">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0 animate__animated animate__bounceInLeft">
                        <h1 class="display-4 font-weight-bold mb-4">Puding by Tepuni</h1>
                        <p class="lead mb-4" style="opacity: 0.9; font-size: 1.3rem;">
                            Sweet, artisanal puddings made with love and the finest ingredients for your happy moments! 💖
                        </p>
                        <p class="mb-5" style="opacity: 0.8;">
                            Pre-order 2 days in advance for the freshest, preservative-free treats! 🧁
                        </p>
                        <div class="d-flex flex-column flex-sm-row gap-3">
<<<<<<< HEAD
                            <a href="#menu" class="btn btn-primary btn-lg">
=======
                            <a href="{{ route('menus.index') }}" class="btn btn-primary btn-lg">
>>>>>>> fd6a9bb5 (commit)
                                <i class="fas fa-utensils mr-2"></i> Explore Menu
                            </a>
                            <a href="#about" class="btn btn-outline-light btn-lg">
                                <i class="fas fa-heart mr-2"></i> Our Story
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 animate__animated animate__bounceInRight">
                        <div class="position-relative">
                            <img src="{{ asset('storage/images/Pudding Regal Loyang Besar.png') }}" 
                                 alt="Premium Pudding by Tepuni" 
                                 class="img-fluid rounded-3xl shadow-lg border-4 border-pink-200"
                                 loading="lazy"
                                 style="transform: perspective(1000px) rotateY(-10deg);">
                            <div class="position-absolute bottom-0 start-0 translate-middle-y bg-pink-100 text-pink-600 p-3 rounded-circle shadow" style="width: 80px; height: 80px;">
                                <i class="fas fa-heart fs-3 animate__animated animate__pulse animate__infinite"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-6 py-lg-7 bg-pink-50 position-relative">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="about-img-container">
<<<<<<< HEAD
                        <img src="{{ asset('storage/images/Pudding.jpg') }}" 
=======
                        <img src="{{ asset('storage/images/Regal.jpg') }}" 
>>>>>>> fd6a9bb5 (commit)
                             alt="Our Puddings" 
                             class="img-fluid w-100 rounded-3xl"
                             loading="lazy">
                    </div>
                </div>
                <div class="col-lg-6 animate__animated animate__fadeInUp">
                    <h2 class="bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-purple-600 text-center text-lg-start">Our Sweet Story</h2>
                    <p class="mb-4">
                        Puding by Tepuni started as a cozy kitchen dream in 2015, turning love for sweets into delightful puddings that warm hearts. 💕
                    </p>
                    <p class="mb-5">
                        We cherish our roots, crafting each pudding with traditional recipes and a sprinkle of joy to make every bite special! 🌸
                    </p>
                    
                    <div class="bg-white p-4 rounded-2xl shadow-sm border border-pink-100">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/images/Foto fanny.jpg') }}" 
                                 alt="Stevefanny Putri" 
                                 class="rounded-circle me-4" 
                                 width="80"
                                 style="border: 3px solid var(--primary-pink);">
                            <div>
                                <h5 class="mb-1">Stevefanny Putri</h5>
                                <p class="text-muted mb-0">Founder & Pudding Fairy</p>
                                <div class="mt-2">
<<<<<<< HEAD
                                    <a href="#" class="text-pink-600 me-3"><i class="fab fa-instagram"></i></a>
                                    <a href="#" class="text-pink-600"><i class="fab fa-whatsapp"></i></a>
=======
                                    <a href="https://www.instagram.com/stvfnnyptr?igsh=Yno5eXI0ODZudWp0" class="text-pink-600 me-3"><i class="fab fa-instagram"></i></a>

>>>>>>> fd6a9bb5 (commit)
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="text-center p-4 animate__animated animate__bounceIn" data-wow-delay="0.1s">
                        <div class="feature-icon mx-auto bg-gradient-to-r from-pink-300 to-purple-300">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <h4 class="h5 mb-3">Fresh Ingredients</h4>
                        <p class="text-muted mb-0">
                            Only the best natural ingredients for a burst of flavor in every bite! 🌿
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center p-4 animate__animated animate__bounceIn" data-wow-delay="0.2s">
                        <div class="feature-icon mx-auto bg-gradient-to-r from-pink-300 to-purple-300">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h4 class="h5 mb-3">Made with Love</h4>
                        <p class="text-muted mb-0">
                            Handcrafted with care to make every pudding a sweet hug! 💖
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center p-4 animate__animated animate__bounceIn" data-wow-delay="0.3s">
                        <div class="feature-icon mx-auto bg-gradient-to-r from-pink-300 to-purple-300">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <h4 class="h5 mb-3">Freshly Pre-ordered</h4>
                        <p class="text-muted mb-0">
                            Baked fresh just for you, no preservatives, pure delight! 🧁
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Menu Section -->
    <section id="menu" class="py-6 py-lg-7 bg-pink-50">
        <div class="container">
            <div class="text-center mb-6 animate__animated animate__fadeInDown">
                <h2 class="bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-purple-600">Our Yummy Puddings</h2>
                <p class="section-title text-muted lead">Dive into our sweetest creations! 🌟</p>
            </div>

            <div class="row g-4">
                @forelse($favoritMenus as $menu)
                    <div class="col-md-6 col-lg-4">
                        <div class="menu-card h-100 animate__animated animate__zoomIn" data-wow-delay="{{ 0.1 * $loop->index }}s">
                            <div class="menu-img-container">
<<<<<<< HEAD
                                <img src="{{ asset($menu->gambar ? 'storage/images/' . $menu->gambar : 'storage/images/fallback.jpg') }}" 
                                     alt="{{ $menu->nama }}" 
                                     class="menu-img"
                                     loading="lazy">
=======
                                <img src="{{ asset($menu->gambar ? 'storage/' . $menu->gambar : 'storage/images/fallback.jpg') }}" 
                             alt="{{ $menu->nama }}" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
>>>>>>> fd6a9bb5 (commit)
                                @if($menu->is_favorit)
                                    <div class="menu-badge bg-pink-400">
                                        <i class="fas fa-crown me-1"></i> Top Pick!
                                    </div>
                                @endif
                            </div>
                            <div class="p-4 flex-grow-1 d-flex flex-column">
                                <h3 class="h5 mb-2">{{ $menu->nama }}</h3>
                                <p class="text-muted small mb-3 flex-grow-1">{{ $menu->deskripsi }}</p>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="price">Rp {{ number_format($menu->harga, 0, ',', '.') }}</span>
                                    <div class="text-pink-400">
                                        <i class="fas fa-heart"></i>
                                        <i class="fas fa-heart"></i>
                                        <i class="fas fa-heart"></i>
                                        <i class="fas fa-heart"></i>
                                        <i class="fas fa-heart-half-alt"></i>
                                    </div>
                                </div>
                                @auth
                                    <a href="{{ route('order.form', $menu->id) }}?source=home" 
                                       class="btn btn-primary btn-sm">
                                        <i class="fas fa-shopping-basket me-2"></i> Order Now
                                    </a>
                                @else
                                    <a href="{{ route('auth.login') }}?redirect={{ urlencode(route('order.form', $menu->id) . '?source=home') }}" 
                                       class="btn btn-primary btn-sm">
                                        <i class="fas fa-shopping-basket me-2"></i> Order Now
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div class="alert alert-info bg-pink-100 border-pink-200 text-pink-600">
                            Our menu is getting a sweet update! Check back soon! 🧁
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-20 bg-gradient-to-br from-pink-50 to-purple-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate__animated animate__fadeInDown">
                <span class="inline-block px-4 py-2 text-xs font-semibold tracking-wider text-pink-600 bg-white rounded-full mb-4 shadow-sm border border-pink-100 uppercase">Testimonials</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-purple-600">Loved</span> by You!
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Hear the sweet words from our happy customers! 💕</p>
            </div>

            @if ($entries->isEmpty())
                <div class="text-center py-16 bg-white rounded-2xl shadow-lg border border-pink-100 max-w-3xl mx-auto transform transition-all hover:scale-[1.01] animate__animated animate__bounceIn">
                    <div class="mx-auto h-24 w-24 flex items-center justify-center bg-gradient-to-br from-pink-100 to-purple-100 rounded-full text-pink-500 mb-6 shadow-inner">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 animate__animated animate__pulse animate__infinite" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Share Your Sweet Story!</h3>
                    <p class="text-gray-600 max-w-md mx-auto mb-8">Be the first to sprinkle some love with your review! 🌸</p>
                    <a href="#" class="inline-flex items-center px-8 py-3.5 border border-transparent text-base font-medium rounded-full shadow-lg text-white bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Write a Review
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($entries as $entry)
                        <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border border-pink-100 transform hover:-translate-y-2 relative overflow-hidden animate__animated animate__bounceIn" data-wow-delay="{{ 0.1 * $loop->index }}s">
                            <!-- Decorative elements -->
                            <div class="absolute top-0 right-0 w-16 h-16 bg-pink-100 rounded-bl-full opacity-20"></div>
                            <div class="absolute bottom-0 left-0 w-16 h-16 bg-purple-100 rounded-tr-full opacity-20"></div>
                            
                            <div class="flex items-center mb-6 relative z-10">
                                <div class="flex-shrink-0">
                                    <div class="h-14 w-14 rounded-full bg-gradient-to-r from-pink-400 to-purple-500 flex items-center justify-center text-white font-bold text-xl shadow-md">
                                        {{ substr($entry['nama'] ?? 'A', 0, 1) }}
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-bold text-gray-900">{{ $entry['nama'] ?? 'Anonymous' }}</h3>
                                    <p class="text-sm text-gray-500">
                                        @if(isset($entry['date']) && !empty($entry['date']))
                                            {{ \Carbon\Carbon::parse($entry['date'])->format('d M Y') }}
                                        @else
                                            Pelanggan Setia
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="relative mb-8 z-10">
                                <div class="absolute top-0 left-0 text-6xl text-pink-100 font-serif -mt-2 -ml-1">"</div>
                                <p class="text-gray-700 relative z-10 pl-8 text-lg leading-relaxed">
                                    {{ $entry['pesan'] ?? 'No message provided.' }}
                                </p>
                            </div>
                            <div class="flex items-center justify-between relative z-10">
                                <div class="flex items-center">
                                    @php
                                        $rating = isset($entry['rating']) && is_numeric($entry['rating']) ? (float) $entry['rating'] : 0;
                                        $fullStars = floor($rating);
                                        $hasHalfStar = ($rating - $fullStars) >= 0.5;
                                    @endphp
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $fullStars)
                                            <svg class="w-6 h-6 text-pink-400 animate__animated animate__pulse" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3 .921-.755 1.688-1.54 1.118l-2.8-2.034a1 0 00-1.175 0l-2.8 2.034c-.784 .57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81 .588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        @elseif ($i == $fullStars + 1 && $hasHalfStar)
                                            <svg class="w-6 h-6 text-pink-400 animate__animated animate__pulse" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 1l2.39 6.63h6.22l-5 4.24 1.84 6.23L10 14.88l-5.45 4.22 1.84-6.23-5-4.24h6.22L10 1z"/>
                                            </svg>
                                        @else
                                            <svg class="w-6 h-6 text-gray-200" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3 .921-.755 1.688-1.54 1.118l-2.8-2.034a1 0 00-1.175 0l-2.8 2.034c-.784 .57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81 .588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        @endif
                                    @endfor
                                    <span class="ml-2 text-sm font-semibold text-gray-500">
                                        {{ $rating > 0 ? number_format($rating, 1) : 'N/A' }}/5
                                    </span>
                                </div>
                                <div class="text-pink-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 animate__animated animate__pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
<<<<<<< HEAD
                
                <div class="text-center mt-12 animate__animated animate__bounceIn">
                    <a href="#" class="inline-flex items-center px-8 py-3.5 border border-transparent text-base font-medium rounded-full shadow-lg text-white bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Share Your Sweet Story!
                    </a>
                </div>
=======
>>>>>>> fd6a9bb5 (commit)
            @endif
        </div>
    </section>

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
            scroll-behavior: smooth;
            line-height: 1.6;
            background-color: var(--cream);
        }
        
        h1, h2, h3, h4, .section-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            color: var(--primary-pink);
        }
        
        .hero-section {
            background: linear-gradient(135deg, var(--primary-pink) 0%, var(--pastel-purple) 100%);
            position: relative;
            overflow: hidden;
            padding: 6rem 0;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd' opacity='0.1'%3E%3Cg fill='%23ffffff' fill-opacity='0.5'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        
        .hero-content {
            position: relative;
            z-index: 10;
        }
        
        .menu-card {
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            background: var(--cream);
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        
        .menu-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 10px 25px rgba(255, 97, 123, 0.2);
        }
        
        .menu-img-container {
            overflow: hidden;
            height: 240px;
            position: relative;
        }
        
        .menu-img {
            transition: all 0.6s ease;
            height: 100%;
            width: 100%;
            object-fit: cover;
            border-radius: 20px 20px 0 0;
        }
        
        .menu-card:hover .menu-img {
            transform: scale(1.1);
        }
        
        .menu-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--accent);
            color: white;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-pink) 0%, var(--pastel-purple) 100%);
            border: none;
            transition: all 0.3s ease;
            padding: 12px 28px;
            font-weight: 500;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            font-size: 0.9rem;
            border-radius: 25px;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 97, 123, 0.3);
            background: linear-gradient(135deg, var(--pastel-purple) 0%, var(--primary-pink) 100%);
        }
        
        .btn-outline {
            border: 2px solid var(--primary-pink);
            color: var(--primary-pink);
            background: transparent;
            transition: all 0.3s ease;
            border-radius: 25px;
        }
        
        .btn-outline:hover {
            background: var(--primary-pink);
            color: white;
        }
        
        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 2rem;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: -12px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-pink) 0%, var(--pastel-purple) 100%);
        }
        
        .about-img-container {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(255, 97, 123, 0.2);
        }
        
        .about-img-container:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(255, 193, 204, 0.3), rgba(230, 184, 255, 0.3));
            mix-blend-mode: multiply;
        }
        
        .feature-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary-pink) 0%, var(--pastel-purple) 100%);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 10px rgba(255, 97, 123, 0.3);
        }
        
        .price {
            color: var(--secondary-pink);
            font-weight: 700;
            font-size: 1.2rem;
        }
        
        .rounded-3xl {
            border-radius: 1.5rem;
        }
    </style>
@endsection