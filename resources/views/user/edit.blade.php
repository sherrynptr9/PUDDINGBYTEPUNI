@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<div class="max-w-xl mx-auto mt-16 p-8 bg-white shadow-lg rounded-xl">
    <h2 class="text-2xl font-bold text-rose-600 mb-6">Edit Profil</h2>

    @if (session('success'))
        <div class="text-green-600 mb-4">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('user.update') }}" class="space-y-5">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                class="w-full px-4 py-2 rounded border border-pink-200 focus:ring-2 focus:ring-pink-400" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">No. Telepon</label>
            <input type="text" name="telepon" value="{{ old('telepon', $user->telepon) }}"
                class="w-full px-4 py-2 rounded border border-pink-200 focus:ring-2 focus:ring-pink-400" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Alamat</label>
            <textarea name="alamat" rows="3"
                class="w-full px-4 py-2 rounded border border-pink-200 focus:ring-2 focus:ring-pink-400">{{ old('alamat', $user->alamat) }}</textarea>
        </div>

        <div class="text-right">
            <button type="submit"
                class="bg-pink-500 text-white font-semibold py-2 px-6 rounded hover:bg-pink-600 transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
