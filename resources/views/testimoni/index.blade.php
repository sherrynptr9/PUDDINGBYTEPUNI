@extends('layouts.app')

@section('title', 'Testimoni')

@section('content')
<body class="bg-pink-50 min-h-screen">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-pink-600 mb-4">
                <i class="fas fa-comment-dots mr-2"></i> Testimoni Pelanggan
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Apa kata mereka yang sudah mencicipi puding kami? 🌟
            </p>
        </div>

        <!-- Testimonials -->
        @if ($entries->isEmpty())
            <div class="text-center py-16">
                <div class="mx-auto h-24 w-24 text-gray-400 mb-4">
                    <i class="fas fa-comment-slash text-6xl"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada testimoni</h3>
                <p class="text-gray-500 max-w-md mx-auto">Jadilah yang pertama memberikan ulasan tentang puding kami!</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($entries as $entry)
                    <div class="bg-white p-6 rounded-xl shadow border border-pink-100">
                        <h3 class="text-lg font-semibold text-pink-600">{{ $entry['nama'] ?? 'Anonim' }}</h3>
                        <p class="text-sm text-gray-700 italic mt-2 mb-4">
                            "{{ $entry['pesan'] ?? 'Tidak ada pesan.' }}"
                        </p>
                        <div class="text-yellow-400 font-semibold">
                            ⭐ {{ $entry['rating'] ?? 'N/A' }}/5
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</body>
@endsection
