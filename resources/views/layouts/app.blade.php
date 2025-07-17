<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') - Puding by Tepuni</title>
    <meta name="description" content="Delicious artisanal puddings crafted with love by Tepuni">

    <!-- Tailwind CSS with custom colors -->
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
                    },
                    fontFamily: {
                        'sans': ['"Nunito Sans"', 'sans-serif'],
                        'display': ['"Pacifico"', 'cursive'],
                    },
                    animation: {
                        'pudding-bounce': 'puddingBounce 3s infinite',
                        'wiggle': 'wiggle 1s ease-in-out infinite',
                    },
                    keyframes: {
                        puddingBounce: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-15px)' },
                        },
                        wiggle: {
                            '0%, 100%': { transform: 'rotate(-3deg)' },
                            '50%': { transform: 'rotate(3deg)' },
                        }
                    }
                }
            }
        }
    </script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Font Awesome & Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
        .pudding-shadow {
            box-shadow: 0 10px 25px -5px rgba(244, 114, 182, 0.2);
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
        }
        .pudding-drip:after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 120%;
            height: 20px;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 20' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 0 C 50 0, 70 20, 100 20 S 150 0, 200 0' fill='%23fce7f3'/%3E%3C/svg%3E");
            background-size: 100% 100%;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body class="bg-pudding-cream font-sans antialiased overflow-x-hidden pudding-bg-pattern">

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
                                <i class="fas fa-user-circle mr-2"></i> Account
                            </a>
                            <form method="POST" action="{{ route('auth.logout') }}">
                                @csrf
                                <button type="submit" class="text-pudding-dark hover:bg-pudding-light px-4 py-2 rounded-lg text-sm font-semibold transition-colors duration-300 flex items-center">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                </button>
                            </form>
                        @else
                            <a href="{{ route('auth.login') }}" class="text-pudding-dark hover:bg-pudding-light px-4 py-2 rounded-lg text-sm font-semibold transition-colors duration-300 flex items-center">
                                <i class="fas fa-sign-in-alt mr-2"></i> Login
                            </a>
                        @endauth

                        <a href="{{ route('cart.index') }}#cart" class="bg-gradient-to-r from-pudding-primary to-pudding-secondary text-white px-5 py-2.5 rounded-full text-sm font-semibold hover:shadow-lg transition-all duration-300 flex items-center pudding-shadow">
                            <i class="fas fa-shopping-cart mr-2"></i> Cart 
                            <span class="ml-1 bg-white text-pudding-primary rounded-full h-5 w-5 flex items-center justify-center text-xs">0</span>
                        </a>
                    </div>
                </div>

                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-pudding-dark hover:text-pudding-primary focus:outline-none p-2 rounded-full hover:bg-pudding-light transition-colors duration-300">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile Menu --}}
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
                        <i class="fas fa-user-circle mr-3"></i> Account
                    </a>
                    <form method="POST" action="{{ route('auth.logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left text-pudding-dark hover:bg-pudding-light px-4 py-3 rounded-lg text-base font-semibold transition-colors duration-300 flex items-center">
                            <i class="fas fa-sign-out-alt mr-3"></i> Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('auth.login') }}" class="text-pudding-dark hover:bg-pudding-light block px-4 py-3 rounded-lg text-base font-semibold transition-colors duration-300 flex items-center">
                        <i class="fas fa-sign-in-alt mr-3"></i> Login
                    </a>
                @endauth

                <a href="{{ route('cart.index') }}#cart" class="block bg-gradient-to-r from-pudding-primary to-pudding-secondary text-white px-5 py-3 rounded-full text-base font-semibold hover:shadow-lg transition-all duration-300 flex items-center justify-center pudding-shadow">
                    <i class="fas fa-shopping-cart mr-2"></i> Cart
                    <span class="ml-2 bg-white text-pudding-primary rounded-full h-6 w-6 flex items-center justify-center text-sm">0</span>
                </a>
            </div>
        </div>
    </nav>

    {{-- Toggle Script --}}
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function () {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
            menu.classList.toggle('animate__fadeInDown');
        });
    </script>

    {{-- Main Content --}}
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
                        </a>
                    </div>
                </div>
                <div>
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
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-pudding-light pt-6 text-center">
                <p class="text-xs text-pudding-dark">&copy; {{ date('Y') }} Puding by Tepuni. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>