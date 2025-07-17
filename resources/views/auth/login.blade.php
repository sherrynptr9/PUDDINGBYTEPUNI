@extends('layouts.app')

@section('title', 'Login - Puding by Tepuni')

@push('head')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
@endpush

@section('content')
<div class="flex items-center justify-center min-h-screen px-4 bg-gradient-to-tr from-pink-100 via-pink-50 to-pink-200">
    <div class="w-full max-w-md bg-white/80 backdrop-blur-xl shadow-xl rounded-3xl px-10 py-12 border border-pink-200">

        <!-- Header -->
        <div class="text-center mb-10">
            <div class="text-5xl">🍮✨</div>
            <h2 class="text-3xl font-extrabold text-pink-700 mt-4">Selamat Datang!</h2>
            <p class="text-pink-500 text-sm mt-1">Masuk dan pesan puding favoritmu sekarang~</p>
        </div>

        <!-- Flash Message -->
        @if (session('message'))
            <div class="mb-4 text-green-600 text-center font-medium">
                {{ session('message') }}
            </div>
        @endif
        @if (session('error'))
            <div class="mb-4 text-red-600 text-center font-medium">
                {{ session('error') }}
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('auth.login') }}" class="space-y-6">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">📧 Email</label>
                <div class="relative">
                    <input type="email" name="email" id="email" required
                        class="w-full pl-11 pr-4 py-3 rounded-xl border border-pink-200 
                        bg-white shadow-inner focus:ring-2 focus:ring-pink-400 focus:outline-none" 
                        placeholder="you@example.com">
                    <div class="absolute inset-y-0 left-3 flex items-center text-pink-400 pointer-events-none">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
                @error('email')
                    <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">🔒 Password</label>
                <div class="relative">
                    <input type="password" name="password" id="password" required
                        class="w-full pr-12 pl-4 py-3 rounded-xl border border-purple-200 
                        bg-white shadow-inner focus:ring-2 focus:ring-purple-400 focus:outline-none" 
                        placeholder="••••••••">
                    <button type="button" onclick="togglePassword('password', this)"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-purple-600 hover:text-purple-800 text-xl"
                        aria-label="Toggle Password Visibility">
                        👁️
                    </button>
                </div>
                @error('password')
                    <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit -->
            <button type="submit"
    class="w-full py-3 px-4 rounded-xl text-white text-lg font-semibold shadow-lg 
    bg-gradient-to-r from-pink-400 via-fuchsia-400 to-purple-400 hover:brightness-110 transition">
    Sign In
</button>

<!-- Tambahkan link register -->
        <div class="text-center mt-6 text-sm text-gray-600">
            Belum punya akun?
            <a href="{{ route('auth.register') }}" class="text-pink-600 font-semibold hover:underline">
                Daftar di sini
            </a>
        </div>
        </form>
    </div>

    <!-- Password toggle -->
    <script>
        function togglePassword(inputId, btn) {
            const input = document.getElementById(inputId);
            if (input.type === "password") {
                input.type = "text";
                btn.textContent = "🙈";
            } else {
                input.type = "password";
                btn.textContent = "👁️";
            }
        }
    </script>
</div>
@endsection
