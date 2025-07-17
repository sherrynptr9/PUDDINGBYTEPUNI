@extends('layouts.app')

@section('title', 'Tulis Testimoni')

@section('content')
<div class="max-w-3xl mx-auto py-12 px-6 text-center">
    <h2 class="text-2xl font-bold text-pink-600 mb-4">💬 Kirimkan Testimoni Anda</h2>
    <p class="text-gray-600 mb-6">Silakan isi form di bawah ini. Kami sangat menghargai feedback Anda!</p>

    <div class="aspect-w-16 aspect-h-9">
        <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScu18SXEEiowI33xxZLaUHujKRtfn-kwAdeX8U503u4nWhwbw/viewform?usp=dialog" width="100%" height="700" frameborder="0" marginheight="0" marginwidth="0">
            Memuat…
        </iframe>
    </div>
</div>
@endsection
