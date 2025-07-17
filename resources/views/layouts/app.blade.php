<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') - Puding by Tepuni</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome & Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .floating {
            animation: float 5s ease-in-out infinite;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans antialiased overflow-x-hidden">

    {{-- Navbar --}}
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <i class="fas fa-ice-cream text-3xl text-pink-500 mr-2"></i>
                        <span class="text-2xl text-pink-600 font-bold">Puding by Tepuni</span>
                    </div>
                </div>

                <div class="hidden md:block">
                    <div class="ml-10 flex items-center space-x-4">
                        <a href="{{ route('home') }}" class="text-pink-600 hover:bg-pink-100 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        <a href="{{ route('menus.index') }}" class="text-gray-700 hover:bg-pink-100 px-3 py-2 rounded-md text-sm font-medium">Our Puddings</a>
                        <a href="{{ route('testimoni.index') }}" class="text-gray-700 hover:bg-pink-100 px-3 py-2 rounded-md text-sm font-medium">Testimonials</a>
                        @auth
                            <a href="{{ route('user.account') }}" class="text-gray-700 px-3 py-2 rounded-md text-sm font-medium">Account</a>
                            <form method="POST" action="{{ route('auth.logout') }}">
                                @csrf
                                <button type="submit" class="text-gray-700 px-3 py-2 rounded-md text-sm font-medium hover:bg-pink-100">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('auth.login') }}" class="text-gray-700 px-3 py-2 rounded-md text-sm font-medium">Login / Sign Up</a>
                        @endauth

                        <a href="{{ route('cart.index') }}#cart" class="bg-pink-500 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-pink-600 transition duration-300">
                            <i class="fas fa-shopping-cart mr-1"></i> Add To Cart
                        </a>
                    </div>
                </div>

                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-700 hover:text-pink-600 focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="{{ route('home') }}" class="text-pink-600 block px-3 py-2 rounded-md text-base font-medium">Home</a>
                <a href="{{ route('menus.index') }}" class="text-gray-700 block px-3 py-2 rounded-md text-base font-medium">Our Puddings</a>
                <a href="{{ route('testimoni.index') }}" class="text-gray-700 block px-3 py-2 rounded-md text-base font-medium">Testimonials</a>
                @auth
                    <a href="{{ route('user.account') }}" class="text-gray-700 block px-3 py-2 rounded-md text-base font-medium">Account</a>
                    <form method="POST" action="{{ route('auth.logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left text-gray-700 px-3 py-2 rounded-md text-base font-medium hover:bg-pink-100">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('auth.login') }}" class="text-gray-700 block px-3 py-2 rounded-md text-base font-medium">Login / Sign Up</a>
                @endauth

                <a href="{{ route('cart.index') }}#cart" class="block bg-pink-500 text-white px-4 py-2 rounded-full text-base font-medium hover:bg-pink-600 transition duration-300 text-center">
                    <i class="fas fa-shopping-cart mr-1"></i> Add To Cart
                </a>
            </div>
        </div>
    </nav>

    {{-- Toggle Script --}}
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>

    {{-- Main Content --}}
    <main class="min-h-screen">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-pink-100 text-pink-800 py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-sm mb-2">&copy; {{ date('Y') }} Puding by Tepuni. All rights reserved.</p>
            <div class="flex justify-center space-x-4 text-lg">
                <a href="https://instagram.com/tepuni_id" class="hover:text-pink-600" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://wa.me/6281234567890" class="hover:text-pink-600" target="_blank"><i class="fab fa-whatsapp"></i></a>
                <a href="mailto:tepuni@example.com" class="hover:text-pink-600"><i class="fas fa-envelope"></i></a>
            </div>
        </div>
    </footer>

</body>
</html>
