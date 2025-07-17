@extends('layouts.app')

@section('title', 'Register - Puding by Tepuni')

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
            <div class="text-5xl">🍰✨</div>
            <h2 class="text-3xl font-extrabold text-pink-700 mt-4">Daftar Sekarang</h2>
            <p class="text-pink-500 text-sm mt-1">Buat akun dan nikmati puding spesial kami~</p>
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
        <form method="POST" action="{{ route('auth.register') }}" class="space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">👤 Nama Lengkap</label>
                <input type="text" name="name" id="name" required
                    class="w-full px-4 py-3 rounded-xl border border-pink-200 bg-white shadow-inner 
                    focus:ring-2 focus:ring-pink-400 focus:outline-none" 
                    placeholder="Tepuni Wijaya">
                @error('name')
                    <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">📧 Email</label>
                <input type="email" name="email" id="email" required
                    class="w-full px-4 py-3 rounded-xl border border-pink-200 bg-white shadow-inner 
                    focus:ring-2 focus:ring-pink-400 focus:outline-none" 
                    placeholder="you@example.com">
                @error('email')
                    <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Telepon -->
            <div>
                <label for="telepon" class="block text-sm font-semibold text-gray-700 mb-2">📞 No. Telepon</label>
                <input type="text" name="telepon" id="telepon"
                    class="w-full px-4 py-3 rounded-xl border border-pink-200 bg-white shadow-inner 
                    focus:ring-2 focus:ring-pink-400 focus:outline-none"
                    placeholder="+62 812 3456 7890">
                @error('telepon')
                    <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Alamat -->
            <div>
                <label for="alamat" class="block text-sm font-semibold text-gray-700 mb-2">📍 Alamat</label>
                <textarea name="alamat" id="alamat" rows="3"
                    class="w-full px-4 py-3 rounded-xl border border-pink-200 bg-white shadow-inner 
                    focus:ring-2 focus:ring-pink-400 focus:outline-none"
                    placeholder="Jl. Puding Manis No. 123, Jakarta"></textarea>
                @error('alamat')
                    <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">🔒 Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-4 py-3 rounded-xl border border-purple-200 bg-white shadow-inner 
                    focus:ring-2 focus:ring-purple-400 focus:outline-none" 
                    placeholder="••••••••">
                @error('password')
                    <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password Confirmation -->
            <div>
                <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">🔒 Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="w-full px-4 py-3 rounded-xl border border-purple-200 bg-white shadow-inner 
                    focus:ring-2 focus:ring-purple-400 focus:outline-none" 
                    placeholder="••••••••">
            </div>

            <!-- Submit -->
            <button type="submit"
                class="w-full py-3 px-4 rounded-xl text-white text-lg font-semibold shadow-lg 
                bg-gradient-to-r from-pink-400 via-fuchsia-400 to-purple-400 hover:brightness-110 transition">
                Daftar Sekarang
            </button>
        </form>
    </div>
</div>
@endsection
