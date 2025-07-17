@extends('layouts.app')

@section('title', 'Akun Saya')

@section('content')
<div class="flex items-center justify-center min-h-screen px-4 bg-gradient-to-br from-pink-100 via-rose-50 to-yellow-50">
    <div class="max-w-md mx-auto">
        <!-- Profile Card -->
        <div class="card-gradient backdrop-blur-lg rounded-3xl overflow-hidden shadow-2xl border border-white/50 relative">
            <!-- Decorative top wave -->
            <div class="h-3 bg-gradient-to-r from-pink-400 via-rose-400 to-amber-300"></div>

            <!-- Profile header -->
            <div class="p-8 text-center relative">
                <div class="absolute -top-14 left-1/2 transform -translate-x-1/2">
                    <div class="w-28 h-28 rounded-full border-4 border-white bg-gradient-to-br from-pink-300 to-rose-400 shadow-lg flex items-center justify-center">
                        <span class="text-4xl">👩‍🍳</span>
                    </div>
                </div>

                <h1 class="text-3xl font-bold text-rose-600 mt-8">Akun Saya</h1>
                <p class="text-sm text-gray-500 mb-1">Selamat datang kembali di</p>
                <div class="flex items-center justify-center gap-2">
                    <span class="text-xl">🍮</span>
                    <span class="font-bold text-rose-500">Puding by Tepuni</span>
                </div>
            </div>

            <!-- User info -->
            <div class="px-8 pb-8 space-y-5">
                <div class="flex items-center p-3 bg-white/50 rounded-xl shadow-sm">
                    <div class="w-10 h-10 rounded-full bg-pink-100 flex items-center justify-center text-pink-500 mr-3">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Nama</p>
                        <p class="font-medium">{{ $user->name }}</p>
                    </div>
                </div>

                <div class="flex items-center p-3 bg-white/50 rounded-xl shadow-sm">
                    <div class="w-10 h-10 rounded-full bg-rose-100 flex items-center justify-center text-rose-500 mr-3">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Email</p>
                        <p class="font-medium">{{ $user->email }}</p>
                    </div>
                </div>

                <div class="flex items-center p-3 bg-white/50 rounded-xl shadow-sm">
                    <div class="w-10 h-10 rounded-full bg-amber-100 flex items-center justify-center text-amber-500 mr-3">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">No. Telepon</p>
                        <p class="font-medium">{{ $user->telepon ?? '-' }}</p>
                    </div>
                </div>

                <div class="flex items-start p-3 bg-white/50 rounded-xl shadow-sm">
                    <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center text-purple-500 mr-3">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Alamat</p>
                        <p class="font-medium">{{ $user->alamat ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <!-- Action buttons -->
            <div class="px-8 pb-8 flex flex-col sm:flex-row gap-3">
                <a href="{{ route('user.edit') }}" class="flex-1 bg-gradient-to-r from-pink-400 to-rose-500 hover:from-pink-500 hover:to-rose-600 text-white font-semibold py-3 px-6 rounded-full transition-all shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                    <i class="fas fa-edit"></i>
                    <span>Edit Profil</span>
                </a>
                <form method="POST" action="{{ route('auth.logout') }}" class="flex-1">
                    @csrf
                    <button type="submit" class="w-full bg-white border border-rose-200 hover:bg-rose-50 text-rose-500 font-semibold py-3 px-6 rounded-full transition-all shadow hover:shadow-md flex items-center justify-center gap-2">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>

            <!-- Decorative bottom
            <div class="absolute bottom-0 left-0 w-full overflow-hidden">
                <svg viewBox="0 0 500 50" preserveAspectRatio="none" class="w-full h-10">
                    <path d="M0,0 C150,30 350,10 500,20 L500,0 L0,0 Z" fill="rgba(251, 207, 232, 0.5)"></path>
                </svg>
            </div> -->
        </div>
    </div>
</div>
@endsection
