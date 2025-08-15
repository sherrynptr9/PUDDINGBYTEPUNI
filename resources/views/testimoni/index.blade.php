@extends('layouts.app')

@section('title', 'Testimoni - Puding by Tepuni')

@section('content')
<div class="bg-gradient-to-b from-pink-50 to-white min-h-screen">
    <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">

        <!-- Header Section -->
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 text-sm font-medium text-pink-600 bg-pink-100 rounded-full mb-4 shadow-sm">
                <i class="fas fa-heart mr-2"></i>Ulasan Pelanggan
            </span>
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Kata Mereka Tentang Puding Kami
            </h1>
            <div class="w-24 h-1 bg-gradient-to-r from-pink-400 to-purple-500 mx-auto mb-6 rounded-full"></div>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Setiap puding yang kami buat mengandung cinta dan dedikasi. Inilah yang dirasakan oleh pelanggan kami.
            </p>
        </div>

        <!-- Testimonials Grid -->
        @if ($entries->isEmpty())
            <!-- Empty State -->
            <div class="text-center bg-white p-12 rounded-2xl shadow-lg border border-pink-100 max-w-3xl mx-auto">
                <div class="mx-auto h-32 w-32 flex items-center justify-center bg-pink-50 rounded-full text-pink-400 mb-8">
                    <i class="fas fa-comment-alt text-5xl"></i>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-3">Belum Ada Testimoni</h3>
                <p class="text-gray-600 max-w-md mx-auto mb-8">
                    Jadilah yang pertama berbagi pengalamanmu menikmati puding spesial dari Tepuni!
                </p>
                <a href="#" class="inline-flex items-center px-8 py-3 border border-transparent text-base font-medium rounded-full shadow-sm text-white bg-pink-600 hover:bg-pink-700 transition-all duration-200">
                    <i class="fas fa-pen-fancy mr-2"></i> Tulis Testimoni
                </a>
            </div>
        @else
            <!-- Testimonials Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($entries as $entry)
                    <div class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-pink-50 transform hover:-translate-y-2">
                        <!-- Customer Avatar -->
                        <div class="flex items-center mb-6">
                            <div class="flex-shrink-0 h-14 w-14 rounded-full bg-gradient-to-br from-pink-300 to-pink-500 flex items-center justify-center text-white text-xl font-bold shadow-md">
                                {{ substr($entry['nama'] ?? 'A', 0, 1) }}
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-900">{{ $entry['nama'] ?? 'Pelanggan Tepuni' }}</h3>
                                <p class="text-sm text-pink-500">
                                    @if(isset($entry['date']) && !empty($entry['date']))
                                        {{ \Carbon\Carbon::parse($entry['date'])->format('d M Y') }}
                                    @else
                                        Pelanggan Setia
                                    @endif
                                </p>
                            </div>
                        </div>
                        
                        <!-- Testimonial Content -->
                        <div class="relative mb-6">
                            <div class="absolute top-0 left-0 text-6xl text-pink-100 font-serif -mt-4 -ml-2">"</div>
                            <p class="text-gray-700 relative z-10 pl-8 italic">
                                {{ $entry['pesan'] ?? 'Pudingnya enak banget! Sangat recommended.' }}
                            </p>
                        </div>
                        
                        <!-- Rating -->
                        <div class="flex items-center justify-between border-t border-pink-50 pt-4">
                            <div class="flex items-center">
                                @php
                                    $rating = isset($entry['rating']) && is_numeric($entry['rating']) ? (float) $entry['rating'] : 0;
                                    $fullStars = floor($rating);
                                    $hasHalfStar = ($rating - $fullStars) >= 0.5;
                                @endphp
                                
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $fullStars)
                                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    @elseif($i == $fullStars + 1 && $hasHalfStar)
                                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 1l2.39 6.63h6.22l-5 4.24 1.84 6.23L10 14.88l-5.45 4.22 1.84-6.23-5-4.24h6.22L10 1z"/>
                                        </svg>
                                    @else
                                        <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3 .921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    @endif
                                @endfor
                                <span class="ml-2 text-sm font-medium text-gray-500">
                                    {{ $rating > 0 ? number_format($rating, 1) : 'N/A' }}/5
                                </span>
                            </div>
                            <div class="text-pink-300">
                                <i class="fas fa-quote-right text-xl"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
<<<<<<< HEAD
            
            <!-- CTA Section -->
            <div class="text-center mt-16">
                <div class="bg-white p-8 rounded-2xl shadow-inner border border-pink-100 inline-block">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Bagaimana pengalaman Anda?</h3>
                    <p class="text-gray-600 mb-6 max-w-lg mx-auto">
                        Bantu kami menjadi lebih baik dengan berbagi pengalaman Anda menikmati puding Tepuni
                    </p>
                    <a href="#" class="inline-flex items-center px-8 py-3 border border-pink-600 text-base font-medium rounded-full shadow-sm text-pink-600 bg-white hover:bg-pink-50 transition-colors duration-200">
                        <i class="fas fa-edit mr-2"></i> Beri Testimoni
                    </a>
                </div>
            </div>
=======
>>>>>>> fd6a9bb5 (commit)
        @endif
    </div>
</div>
@endsection