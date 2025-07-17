@extends('layouts.app')

@section('title', 'Konfirmasi Pesanan')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-pink-50 px-4 py-8">
    <div class="max-w-2xl w-full">
        <!-- Confetti elements -->
        <div id="confetti-container"></div>

        <!-- Main card -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl">
            <!-- Header -->
            <div class="relative bg-gradient-to-r from-pink-400 to-pink-600 p-8 text-center">
                <div class="absolute top-4 right-4 text-white text-4xl floating">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="absolute top-4 left-4 text-white text-4xl floating" style="animation-delay: 0.5s;">
                    <i class="fas fa-birthday-cake"></i>
                </div>

                <h1 class="text-4xl font-bold text-white mb-2">Pesanan Berhasil!</h1>
                <p class="text-pink-100">Terima kasih telah memesan dari kami</p>

                <div class="mt-6 mx-auto w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-lg pulse">
                    <i class="fas fa-check text-4xl text-pink-500"></i>
                </div>
            </div>

            <!-- Order Details -->
            <div class="p-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-receipt mr-2 text-pink-500"></i> Detail Pesanan
                </h2>

                <div class="space-y-4 text-sm">
                    <div class="flex items-start">
                        <div class="w-8 h-8 rounded-full bg-pink-100 flex items-center justify-center mr-3 mt-1">
                            <i class="fas fa-utensils text-pink-500 text-sm"></i>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Menu:</span>
                            <span class="ml-2 text-gray-600">{{ $order->menu->nama ?? '-' }}</span>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="w-8 h-8 rounded-full bg-pink-100 flex items-center justify-center mr-3 mt-1">
                            <i class="fas fa-box-open text-pink-500 text-sm"></i>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Jumlah:</span>
                            <span class="ml-2 text-gray-600">{{ $order->jumlah ?? '-' }}</span>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="w-8 h-8 rounded-full bg-pink-100 flex items-center justify-center mr-3 mt-1">
                            <i class="fas fa-user text-pink-500 text-sm"></i>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Nama:</span>
                            <span class="ml-2 text-gray-600">{{ $order->nama_pemesan ?? '-' }}</span>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="w-8 h-8 rounded-full bg-pink-100 flex items-center justify-center mr-3 mt-1">
                            <i class="fas fa-phone text-pink-500 text-sm"></i>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Telepon:</span>
                            <span class="ml-2 text-gray-600">{{ $order->no_wa ?? '-' }}</span>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="w-8 h-8 rounded-full bg-pink-100 flex items-center justify-center mr-3 mt-1">
                            <i class="fas fa-map-marker-alt text-pink-500 text-sm"></i>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Alamat:</span>
                            <span class="ml-2 text-gray-600">{{ $order->alamat ?? '-' }}</span>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="w-8 h-8 rounded-full bg-pink-100 flex items-center justify-center mr-3 mt-1">
                            <i class="fas fa-truck text-pink-500 text-sm"></i>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Pengiriman:</span>
                            <span class="ml-2 text-gray-600">{{ ucfirst($order->pengiriman ?? '-') }}</span>
                        </div>
                    </div>

                    @if (!empty($order->catatan))
                    <div class="flex items-start">
                        <div class="w-8 h-8 rounded-full bg-pink-100 flex items-center justify-center mr-3 mt-1">
                            <i class="fas fa-sticky-note text-pink-500 text-sm"></i>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Catatan:</span>
                            <span class="ml-2 text-gray-600">{{ $order->catatan }}</span>
                        </div>
                    </div>
                    @endif

                    <div class="flex items-start">
                        <div class="w-8 h-8 rounded-full bg-pink-100 flex items-center justify-center mr-3 mt-1">
                            <i class="fas fa-calendar-day text-pink-500 text-sm"></i>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Tanggal:</span>
                            <span class="ml-2 text-gray-600">{{ \Carbon\Carbon::parse($order->tanggal_pesan)->translatedFormat('d F Y') }}</span>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="w-8 h-8 rounded-full bg-pink-100 flex items-center justify-center mr-3 mt-1">
                            <i class="fas fa-info-circle text-pink-500 text-sm"></i>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Status:</span>
                            <span class="ml-2 px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-medium">{{ $order->status ?? '-' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="mt-8 space-y-4">
                    @php
                        $pesan = urlencode(
                            "Halo Admin, saya ingin memesan:\n\n" .
                            "🍮 *{$order->menu->nama}*\n" .
                            "📦 Jumlah: {$order->jumlah}\n" .
                            "👤 Nama: {$order->nama_pemesan}\n" .
                            "📞 Telepon: {$order->no_wa}\n" .
                            "📍 Alamat: {$order->alamat}\n" .
                            "🚚 Pengiriman: {$order->pengiriman}\n" .
                            ($order->catatan ? "📝 Catatan: {$order->catatan}\n" : "") .
                            "\nMohon konfirmasinya ya 🙏"
                        );
                        $whatsappUrl = "https://wa.me/628129181364?text=$pesan";
                    @endphp

                    <a href="{{ $whatsappUrl }}" target="_blank"
                       class="block w-full bg-green-500 hover:bg-green-600 text-white py-3 px-4 rounded-xl font-semibold shadow-md transition-all duration-200 text-center flex items-center justify-center">
                        <i class="fab fa-whatsapp mr-2 text-xl"></i> Kirim ke WhatsApp Admin
                    </a>

                    <a href="{{ route('home') }}" class="block text-center text-pink-500 hover:text-pink-600 font-medium text-sm mt-4">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- JS optional: Floating animation --}}
<script>
    const floatingEls = document.querySelectorAll('.floating');
    floatingEls.forEach((el, index) => {
        el.style.animation = `float 3s ease-in-out infinite`;
        el.style.animationDelay = `${index * 0.3}s`;
    });
</script>

<style>
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-8px); }
        100% { transform: translateY(0px); }
    }
    .pulse {
        animation: pulse 2s infinite;
    }
    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }
</style>
@endsection
