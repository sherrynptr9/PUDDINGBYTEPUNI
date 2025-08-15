<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') - Puding by Tepuni</title>
    <meta name="description" content="Delicious artisanal puddings crafted with love by Tepuni">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'pudding-primary': '#f472b6',
                        'pudding-secondary': '#db2777',
                        'pudding-light': '#fce7f3',
                        'pudding-dark': '#831843',
                        'pudding-cream': '#fff1f2',
<<<<<<< HEAD
=======
                        'pudding-sauce': '#f43f5e',
                        'pudding-topping': '#f9a8d4',
>>>>>>> fd6a9bb5 (commit)
                    },
                    fontFamily: {
                        'sans': ['"Nunito Sans"', 'sans-serif'],
                        'display': ['"Pacifico"', 'cursive'],
<<<<<<< HEAD
=======
                        'handwriting': ['"Dancing Script"', 'cursive'],
>>>>>>> fd6a9bb5 (commit)
                    },
                    animation: {
                        'pudding-bounce': 'puddingBounce 3s infinite',
                        'wiggle': 'wiggle 1s ease-in-out infinite',
<<<<<<< HEAD
=======
                        'drip': 'drip 2s ease-in-out infinite',
>>>>>>> fd6a9bb5 (commit)
                    },
                    keyframes: {
                        puddingBounce: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-15px)' },
                        },
                        wiggle: {
                            '0%, 100%': { transform: 'rotate(-3deg)' },
                            '50%': { transform: 'rotate(3deg)' },
<<<<<<< HEAD
=======
                        },
                        drip: {
                            '0%, 100%': { transform: 'translateY(0) scaleY(1)' },
                            '50%': { transform: 'translateY(5px) scaleY(0.95)' },
>>>>>>> fd6a9bb5 (commit)
                        }
                    }
                }
            }
        }
    </script>

<<<<<<< HEAD
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&family=Pacifico&display=swap" rel="stylesheet">

=======
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&family=Pacifico&family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
>>>>>>> fd6a9bb5 (commit)
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
        .pudding-shadow {
<<<<<<< HEAD
            box-shadow: 0 10px 25px -5px rgba(244, 114, 182, 0.2);
=======
            box-shadow: 0 10px 25px -5px rgba(244, 114, 182, 0.3);
>>>>>>> fd6a9bb5 (commit)
        }
        .pudding-text-gradient {
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            background-image: linear-gradient(to right, #f472b6, #db2777);
        }
        .pudding-bg-pattern {
            background-image: radial-gradient(#fce7f3 1px, transparent 1px);
            background-size: 20px 20px;
        }
        .pudding-drip {
            position: relative;
<<<<<<< HEAD
=======
            overflow: hidden;
>>>>>>> fd6a9bb5 (commit)
        }
        .pudding-drip:after {
            content: "";
            position: absolute;
<<<<<<< HEAD
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 120%;
            height: 20px;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 20' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 0 C 50 0, 70 20, 100 20 S 150 0, 200 0' fill='%23fce7f3'/%3E%3C/svg%3E");
            background-size: 100% 100%;
            background-repeat: no-repeat;
=======
            bottom: -15px;
            left: 0;
            right: 0;
            height: 30px;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 1200 120' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z' fill='%23ffffff'/%3E%3C/svg%3E");
            background-size: cover;
            background-repeat: no-repeat;
            animation: drip 3s ease-in-out infinite;
        }
        .pudding-sprinkles {
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='3' cy='3' r='1' fill='%23f472b6'/%3E%3Ccircle cx='15' cy='15' r='0.8' fill='%23db2777'/%3E%3Ccircle cx='10' cy='5' r='0.6' fill='%23f9a8d4'/%3E%3Ccircle cx='18' cy='8' r='0.7' fill='%23f472b6'/%3E%3Ccircle cx='5' cy='17' r='0.9' fill='%23f43f5e'/%3E%3C/svg%3E");
            opacity: 0.3;
            pointer-events: none;
        }
        .pudding-card {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .pudding-card:hover {
            transform: translateY(-5px);
        }
        .pudding-card:before {
            content: "";
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            background: linear-gradient(45deg, #fce7f3, #f9a8d4, #f472b6);
            z-index: -1;
            filter: blur(20px);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .pudding-card:hover:before {
            opacity: 0.3;
>>>>>>> fd6a9bb5 (commit)
        }
    </style>
</head>
<body class="bg-pudding-cream font-sans antialiased overflow-x-hidden pudding-bg-pattern">

<<<<<<< HEAD
    {{-- Navbar --}}
    <nav class="bg-white shadow-md sticky top-0 z-50 pudding-drip">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-24 items-center">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <div class="relative h-10 w-10 rounded-full bg-gradient-to-br from-pudding-primary to-pudding-secondary flex items-center justify-center text-white mr-3 pudding-shadow">
                            <i class="fas fa-ice-cream text-xl"></i>
                            <div class="absolute -bottom-1 -right-1 h-5 w-5 bg-white rounded-full flex items-center justify-center shadow-inner">
                                <div class="h-3 w-3 rounded-full bg-pudding-primary animate-pulse"></div>
                            </div>
                        </div>
                        <span class="text-2xl font-display text-pudding-dark">Puding by Tepuni</span>
                    </div>
                </div>

                <div class="hidden md:block">
                    <div class="ml-10 flex items-center space-x-4">
                        <a href="{{ route('home') }}" class="text-pudding-dark hover:bg-pudding-light px-4 py-2 rounded-lg text-sm font-semibold transition-colors duration-300 flex items-center">
                            <i class="fas fa-home mr-2"></i> Home
                        </a>
                        <a href="{{ route('menus.index') }}" class="text-pudding-dark hover:bg-pudding-light px-4 py-2 rounded-lg text-sm font-semibold transition-colors duration-300 flex items-center">
                            <i class="fas fa-utensils mr-2"></i> Our Puddings
                        </a>
                        <a href="{{ route('testimoni.index') }}" class="text-pudding-dark hover:bg-pudding-light px-4 py-2 rounded-lg text-sm font-semibold transition-colors duration-300 flex items-center">
                            <i class="fas fa-comment-dots mr-2"></i> Testimonials
                        </a>
                        @auth
                            <a href="{{ route('user.account') }}" class="text-pudding-dark hover:bg-pudding-light px-4 py-2 rounded-lg text-sm font-semibold transition-colors duration-300 flex items-center">
=======
    {{-- Navbar with improved styling --}}
<nav class="bg-cream/95 backdrop-blur-sm sticky top-0 z-50 border-b border-pudding-light/30 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
            <!-- Logo/Brand Section -->
            <div class="flex items-center min-w-0"> <!-- Added min-w-0 to prevent overflow -->
                <div class="flex-shrink-0 flex items-center pudding-logo-container relative group">
                    <!-- Pudding Logo with Interactive Elements -->
                    <img src="{{ asset('storage/images/Pudding.png') }}" alt="Puding by Tepuni" 
                        class="h-14 transform group-hover:rotate-6 transition-all duration-300 ease-[cubic-bezier(0.34,1.56,0.64,1)]">
                    
                    <!-- Animated "Cherry" Dot -->
                    <div class="absolute -bottom-1 -right-1 h-5 w-5 bg-white rounded-full flex items-center justify-center shadow-inner">
                        <div class="h-3 w-3 rounded-full bg-pudding-primary animate-[pulse_2s_infinite]"></div>
                    </div>
                    
                    <!-- Subtle Drip Effect (Optional) -->
                    <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 w-8 h-2 bg-gradient-to-b from-pudding-primary/20 to-transparent"></div>
                </div>
                
                <!-- Brand Text with Delicious Typography -->
                <span class="text-2xl font-display font-medium text-pudding-dark bg-clip-text text-transparent bg-gradient-to-r from-pudding-primary to-pudding-secondary tracking-tight whitespace-nowrap ml-3 truncate">
                    Puding by Tepuni
                </span>
            </div>

                <div class="hidden md:block">
                    <div class="ml-10 flex items-center space-x-2">
                        <a href="{{ route('home') }}" class="text-pudding-dark hover:bg-pudding-light px-4 py-2 rounded-full text-sm font-semibold transition-all duration-300 flex items-center hover:text-pudding-primary">
                            <i class="fas fa-home mr-2"></i> Home
                        </a>
                        <a href="{{ route('menus.index') }}" class="text-pudding-dark hover:bg-pudding-light px-4 py-2 rounded-full text-sm font-semibold transition-all duration-300 flex items-center hover:text-pudding-primary">
                            <i class="fas fa-utensils mr-2"></i> Our Puddings
                        </a>
                        <a href="{{ route('testimoni.index') }}" class="text-pudding-dark hover:bg-pudding-light px-4 py-2 rounded-full text-sm font-semibold transition-all duration-300 flex items-center hover:text-pudding-primary">
                            <i class="fas fa-comment-dots mr-2"></i> Testimonials
                        </a>
                        @auth
                            <a href="{{ route('user.account') }}" class="text-pudding-dark hover:bg-pudding-light px-4 py-2 rounded-full text-sm font-semibold transition-all duration-300 flex items-center hover:text-pudding-primary">
>>>>>>> fd6a9bb5 (commit)
                                <i class="fas fa-user-circle mr-2"></i> Account
                            </a>
                            <form method="POST" action="{{ route('auth.logout') }}">
                                @csrf
<<<<<<< HEAD
                                <button type="submit" class="text-pudding-dark hover:bg-pudding-light px-4 py-2 rounded-lg text-sm font-semibold transition-colors duration-300 flex items-center">
=======
                                <button type="submit" class="text-pudding-dark hover:bg-pudding-light px-4 py-2 rounded-full text-sm font-semibold transition-all duration-300 flex items-center hover:text-pudding-primary">
>>>>>>> fd6a9bb5 (commit)
                                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                </button>
                            </form>
                        @else
<<<<<<< HEAD
                            <a href="{{ route('auth.login') }}" class="text-pudding-dark hover:bg-pudding-light px-4 py-2 rounded-lg text-sm font-semibold transition-colors duration-300 flex items-center">
=======
                            <a href="{{ route('auth.login') }}" class="text-pudding-dark hover:bg-pudding-light px-4 py-2 rounded-full text-sm font-semibold transition-all duration-300 flex items-center hover:text-pudding-primary">
>>>>>>> fd6a9bb5 (commit)
                                <i class="fas fa-sign-in-alt mr-2"></i> Login
                            </a>
                        @endauth

<<<<<<< HEAD
                        <a href="{{ route('cart.index') }}#cart" class="bg-gradient-to-r from-pudding-primary to-pudding-secondary text-white px-5 py-2.5 rounded-full text-sm font-semibold hover:shadow-lg transition-all duration-300 flex items-center pudding-shadow">
                            <i class="fas fa-shopping-cart mr-2"></i> Cart 
                            <span class="ml-1 bg-white text-pudding-primary rounded-full h-5 w-5 flex items-center justify-center text-xs">{{ $cartCount }}</span>
=======
                        <a href="{{ route('cart.index') }}#cart" class="bg-gradient-to-r from-pudding-primary to-pudding-secondary text-white px-5 py-2.5 rounded-full text-sm font-semibold hover:shadow-xl transition-all duration-300 flex items-center pudding-shadow hover:scale-105">
                            <i class="fas fa-shopping-cart mr-2"></i> Cart 
                            <span class="ml-1 bg-white text-pudding-primary rounded-full h-5 w-5 flex items-center justify-center text-xs font-bold">{{ $cartCount }}</span>
>>>>>>> fd6a9bb5 (commit)
                        </a>
                    </div>
                </div>

                <div class="md:hidden">
<<<<<<< HEAD
                    <button id="mobile-menu-button" class="text-pudding-dark hover:text-pudding-primary focus:outline-none p-2 rounded-full hover:bg-pudding-light transition-colors duration-300">
=======
                    <button id="mobile-menu-button" class="text-pudding-dark hover:text-pudding-primary focus:outline-none p-3 rounded-full hover:bg-pudding-light transition-all duration-300">
>>>>>>> fd6a9bb5 (commit)
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile Menu --}}
<<<<<<< HEAD
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-pudding-light shadow-inner">
            <div class="px-2 pt-2 pb-4 space-y-2 sm:px-3">
                <a href="{{ route('home') }}" class="text-pudding-dark hover:bg-pudding-light block px-4 py-3 rounded-lg text-base font-semibold transition-colors duration-300 flex items-center">
                    <i class="fas fa-home mr-3"></i> Home
                </a>
                <a href="{{ route('menus.index') }}" class="text-pudding-dark hover:bg-pudding-light block px-4 py-3 rounded-lg text-base font-semibold transition-colors duration-300 flex items-center">
                    <i class="fas fa-utensils mr-3"></i> Our Puddings
                </a>
                <a href="{{ route('testimoni.index') }}" class="text-pudding-dark hover:bg-pudding-light block px-4 py-3 rounded-lg text-base font-semibold transition-colors duration-300 flex items-center">
                    <i class="fas fa-comment-dots mr-3"></i> Testimonials
                </a>
                @auth
                    <a href="{{ route('user.account') }}" class="text-pudding-dark hover:bg-pudding-light block px-4 py-3 rounded-lg text-base font-semibold transition-colors duration-300 flex items-center">
=======
        <div id="mobile-menu" class="hidden md:hidden bg-white/95 backdrop-blur-sm border-t border-pudding-light shadow-lg">
            <div class="px-2 pt-2 pb-4 space-y-2 sm:px-3">
                <a href="{{ route('home') }}" class="text-pudding-dark hover:bg-pudding-light block px-4 py-3 rounded-lg text-base font-semibold transition-all duration-300 flex items-center hover:text-pudding-primary">
                    <i class="fas fa-home mr-3"></i> Home
                </a>
                <a href="{{ route('menus.index') }}" class="text-pudding-dark hover:bg-pudding-light block px-4 py-3 rounded-lg text-base font-semibold transition-all duration-300 flex items-center hover:text-pudding-primary">
                    <i class="fas fa-utensils mr-3"></i> Our Puddings
                </a>
                <a href="{{ route('testimoni.index') }}" class="text-pudding-dark hover:bg-pudding-light block px-4 py-3 rounded-lg text-base font-semibold transition-all duration-300 flex items-center hover:text-pudding-primary">
                    <i class="fas fa-comment-dots mr-3"></i> Testimonials
                </a>
                @auth
                    <a href="{{ route('user.account') }}" class="text-pudding-dark hover:bg-pudding-light block px-4 py-3 rounded-lg text-base font-semibold transition-all duration-300 flex items-center hover:text-pudding-primary">
>>>>>>> fd6a9bb5 (commit)
                        <i class="fas fa-user-circle mr-3"></i> Account
                    </a>
                    <form method="POST" action="{{ route('auth.logout') }}">
                        @csrf
<<<<<<< HEAD
                        <button type="submit" class="w-full text-left text-pudding-dark hover:bg-pudding-light px-4 py-3 rounded-lg text-base font-semibold transition-colors duration-300 flex items-center">
=======
                        <button type="submit" class="w-full text-left text-pudding-dark hover:bg-pudding-light px-4 py-3 rounded-lg text-base font-semibold transition-all duration-300 flex items-center hover:text-pudding-primary">
>>>>>>> fd6a9bb5 (commit)
                            <i class="fas fa-sign-out-alt mr-3"></i> Logout
                        </button>
                    </form>
                @else
<<<<<<< HEAD
                    <a href="{{ route('auth.login') }}" class="text-pudding-dark hover:bg-pudding-light block px-4 py-3 rounded-lg text-base font-semibold transition-colors duration-300 flex items-center">
=======
                    <a href="{{ route('auth.login') }}" class="text-pudding-dark hover:bg-pudding-light block px-4 py-3 rounded-lg text-base font-semibold transition-all duration-300 flex items-center hover:text-pudding-primary">
>>>>>>> fd6a9bb5 (commit)
                        <i class="fas fa-sign-in-alt mr-3"></i> Login
                    </a>
                @endauth

<<<<<<< HEAD
                <a href="{{ route('cart.index') }}#cart" class="block bg-gradient-to-r from-pudding-primary to-pudding-secondary text-white px-5 py-3 rounded-full text-base font-semibold hover:shadow-lg transition-all duration-300 flex items-center justify-center pudding-shadow">
                    <i class="fas fa-shopping-cart mr-2"></i> Cart
                    <span class="ml-2 bg-white text-pudding-primary rounded-full h-6 w-6 flex items-center justify-center text-sm">{{ $cartCount }}</span>
=======
                <a href="{{ route('cart.index') }}#cart" class="block bg-gradient-to-r from-pudding-primary to-pudding-secondary text-white px-5 py-3 rounded-full text-base font-semibold hover:shadow-xl transition-all duration-300 flex items-center justify-center pudding-shadow">
                    <i class="fas fa-shopping-cart mr-2"></i> Cart
                    <span class="ml-2 bg-white text-pudding-primary rounded-full h-6 w-6 flex items-center justify-center text-sm font-bold">{{ $cartCount }}</span>
>>>>>>> fd6a9bb5 (commit)
                </a>
            </div>
        </div>
    </nav>

    {{-- Toggle Script --}}
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function () {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
<<<<<<< HEAD
            menu.classList.toggle('animate__fadeInDown');
=======
            menu.classList.add('animate__fadeInDown');
>>>>>>> fd6a9bb5 (commit)
        });
    </script>

    {{-- Main Content --}}
<<<<<<< HEAD
    <main class="min-h-screen">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-white pt-12 pb-6 mt-12 pudding-drip">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div class="md:col-span-2">
                    <div class="flex items-center mb-4">
                        <div class="h-10 w-10 rounded-full bg-gradient-to-br from-pudding-primary to-pudding-secondary flex items-center justify-center text-white mr-3 shadow-md">
                            <i class="fas fa-ice-cream text-xl"></i>
                            <div class="absolute -bottom-1 -right-1 h-5 w-5 bg-white rounded-full flex items-center justify-center shadow-inner">
                                <div class="h-3 w-3 rounded-full bg-pudding-primary animate-pulse"></div>
                            </div>
                        </div>
                        <span class="text-2xl font-display text-pudding-dark">Puding by Tepuni</span>
                    </div>
                    <p class="text-pudding-dark text-sm mb-4">Delicious artisanal puddings crafted with love using the finest ingredients.</p>
                    <div class="flex space-x-4">
                        <a href="https://instagram.com/tepuni_id" class="h-10 w-10 rounded-full bg-pudding-light flex items-center justify-center text-pudding-primary hover:bg-pudding-primary hover:text-white transition-colors duration-300" target="_blank">
                            <i class="fab fa-instagram text-lg"></i>
                        </a>
                        <a href="https://wa.me/6281234567890" class="h-10 w-10 rounded-full bg-pudding-light flex items-center justify-center text-pudding-primary hover:bg-pudding-primary hover:text-white transition-colors duration-300" target="_blank">
                            <i class="fab fa-whatsapp text-lg"></i>
                        </a>
                        <a href="mailto:tepuni@example.com" class="h-10 w-10 rounded-full bg-pudding-light flex items-center justify-center text-pudding-primary hover:bg-pudding-primary hover:text-white transition-colors duration-300">
                            <i class="fas fa-envelope text-lg"></i>
=======
    <main class="min-h-screen relative">
        <div class="pudding-sprinkles"></div>
        @yield('content')
    </main>

    {{-- Enhanced Footer --}}
    <footer class="bg-white/90 backdrop-blur-md pt-16 pb-8 mt-16 pudding-drip relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div class="md:col-span-2">
                    <div class="flex items-center mb-6">
                       <div class="flex items-center min-w-0"> <!-- Added min-w-0 to prevent overflow -->
                <div class="flex-shrink-0 flex items-center pudding-logo-container relative group">
                    <!-- Pudding Logo with Interactive Elements -->
                    <img src="{{ asset('storage/images/Pudding.png') }}" alt="Puding by Tepuni" 
                        class="h-14 transform group-hover:rotate-6 transition-all duration-300 ease-[cubic-bezier(0.34,1.56,0.64,1)]">
                    
                    <!-- Animated "Cherry" Dot -->
                    <div class="absolute -bottom-1 -right-1 h-5 w-5 bg-white rounded-full flex items-center justify-center shadow-inner">
                        <div class="h-3 w-3 rounded-full bg-pudding-primary animate-[pulse_2s_infinite]"></div>
                    </div>
                    
                    <!-- Subtle Drip Effect (Optional) -->
                    <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 w-8 h-2 bg-gradient-to-b from-pudding-primary/20 to-transparent"></div>
                </div>
                        </div>
                        <span class="text-3xl font-display pudding-text-gradient">Puding by Tepuni</span>
                    </div>
                    <p class="text-pudding-dark text-sm mb-6 italic font-handwriting text-lg">"Delicious artisanal puddings crafted with love using the finest ingredients."</p>
                    <div class="flex space-x-4">
                        <a href="https://www.instagram.com/puddingbytepuni?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="h-12 w-12 rounded-full bg-pudding-light flex items-center justify-center text-pudding-primary hover:bg-pudding-primary hover:text-white transition-all duration-300 transform hover:-translate-y-1 shadow-md" target="_blank">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="https://wa.me/6285693798794 " class="h-12 w-12 rounded-full bg-pudding-light flex items-center justify-center text-pudding-primary hover:bg-pudding-primary hover:text-white transition-all duration-300 transform hover:-translate-y-1 shadow-md" target="_blank">
                            <i class="fab fa-whatsapp text-xl"></i>
>>>>>>> fd6a9bb5 (commit)
                        </a>
                    </div>
                </div>
                <div>
<<<<<<< HEAD
                    <h3 class="text-lg font-semibold text-pudding-dark mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-pudding-dark hover:text-pudding-primary text-sm transition-colors duration-300">Home</a></li>
                        <li><a href="{{ route('menus.index') }}" class="text-pudding-dark hover:text-pudding-primary text-sm transition-colors duration-300">Our Menu</a></li>
                        <li><a href="{{ route('testimoni.index') }}" class="text-pudding-dark hover:text-pudding-primary text-sm transition-colors duration-300">Testimonials</a></li>
                        <li><a href="#" class="text-pudding-dark hover:text-pudding-primary text-sm transition-colors duration-300">About Us</a></li>
                        <li><a href="#" class="text-pudding-dark hover:text-pudding-primary text-sm transition-colors duration-300">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-pudding-dark mb-4">Contact Us</h3>
                    <ul class="space-y-2">
                        <li class="flex items-start text-sm text-pudding-dark">
                            <i class="fas fa-map-marker-alt mt-1 mr-2 text-pudding-primary"></i>
                            <span>123 Pudding Street, Sweet City</span>
                        </li>
                        <li class="flex items-center text-sm text-pudding-dark">
                            <i class="fas fa-phone-alt mr-2 text-pudding-primary"></i>
                            <span>+62 812 3456 7890</span>
                        </li>
                        <li class="flex items-center text-sm text-pudding-dark">
                            <i class="fas fa-envelope mr-2 text-pudding-primary"></i>
                            <span>hello@tepuni.com</span>
=======
                    <h3 class="text-lg font-semibold text-pudding-dark mb-4 flex items-center">
                        <i class="fas fa-link mr-2 text-pudding-primary"></i> Quick Links
                    </h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('home') }}" class="text-pudding-dark hover:text-pudding-primary text-sm transition-all duration-300 flex items-center"><i class="fas fa-chevron-right text-xs mr-2 text-pudding-topping"></i> Home</a></li>
                        <li><a href="{{ route('menus.index') }}" class="text-pudding-dark hover:text-pudding-primary text-sm transition-all duration-300 flex items-center"><i class="fas fa-chevron-right text-xs mr-2 text-pudding-topping"></i> Our Menu</a></li>
                        <li><a href="{{ route('testimoni.index') }}" class="text-pudding-dark hover:text-pudding-primary text-sm transition-all duration-300 flex items-center"><i class="fas fa-chevron-right text-xs mr-2 text-pudding-topping"></i> Testimonials</a></li>
                        <li><a href="#" class="text-pudding-dark hover:text-pudding-primary text-sm transition-all duration-300 flex items-center"><i class="fas fa-chevron-right text-xs mr-2 text-pudding-topping"></i> About Us</a></li>
                        <li><a href="#" class="text-pudding-dark hover:text-pudding-primary text-sm transition-all duration-300 flex items-center"><i class="fas fa-chevron-right text-xs mr-2 text-pudding-topping"></i> Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-pudding-dark mb-4 flex items-center">
                        <i class="fas fa-map-marker-alt mr-2 text-pudding-primary"></i> Find Us
                    </h3>
                    <ul class="space-y-3">
                        <li class="flex items-start text-sm text-pudding-dark">
                            <i class="fas fa-map-marker-alt mt-1 mr-2 text-pudding-topping"></i>
                            <span>Tebet, Jakrta Selatan</span>
                        </li>
                        <li class="flex items-center text-sm text-pudding-dark">
                            <i class="fas fa-phone-alt mr-2 text-pudding-topping"></i>
                            <span>+62 856-9379-8794</span>
                        </li>
                        <li class="flex items-center text-sm text-pudding-dark">
                            <i class="fas fa-clock mr-2 text-pudding-topping"></i>
                            <span>Open Daily: 10.00 - 16.00</span>
>>>>>>> fd6a9bb5 (commit)
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-pudding-light pt-6 text-center">
<<<<<<< HEAD
                <p class="text-xs text-pudding-dark">&copy; {{ date('Y') }} Puding by Tepuni. All rights reserved.</p>
=======
                <p class="text-xs text-pudding-dark">&copy; {{ date('Y') }} Puding by Tepuni. All rights reserved. <span class="text-pudding-topping">Made with ♥ and lots of sugar!</span></p>
>>>>>>> fd6a9bb5 (commit)
            </div>
        </div>
    </footer>

</body>
</html>