<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\Cart;

class TestimoniController extends Controller
{
    public function showTestimoni()
    {
        $csvUrl = 'https://docs.google.com/spreadsheets/d/e/2PACX-1vRRX3PZqyIFFbzFj1toSLR6IviilO-ZM9wR5C7IGBf03whWHPD4NGQgEMP1ttxMHTfxNUddZpeySqer/pub?gid=2134367192&single=true&output=csv';

        $response = Http::get($csvUrl);

        if ($response->failed()) {
            return view('testimoni.index', ['entries' => collect()]);
        }

        $lines = explode("\n", trim($response->body()));
        $rows = array_map("str_getcsv", $lines);

        if (empty($rows)) {
            return view('testimoni.index', ['entries' => collect()]);
        }

        // Ambil header dan normalisasi
        $headers = array_map(fn($h) => strtolower(trim($h)), array_shift($rows));

        // Gabungkan dengan data
        $entries = collect($rows)->map(function ($row) use ($headers) {
            if (count($row) !== count($headers)) {
                return null;
            }

            $data = array_combine($headers, $row);

            return [
                'nama'   => $data['nama'] ?? 'Anonim',
                'pesan'  => $data['pesan'] ?? '',
                'rating' => $data['rating'] ?? 'N/A',
            ];
        })->filter();

        return view('testimoni.index', compact('entries'));
    }

    // Tambahan agar bisa akses form pemesanan dari keranjang
    public function formFromCart(Cart $cart)
    {
        if ($cart->user_id !== auth()->id()) {
            abort(403);
        }

        $menu = $cart->menu;
        $jumlah = $cart->jumlah;

        return view('order.form', compact('menu', 'jumlah'));
    }
}
