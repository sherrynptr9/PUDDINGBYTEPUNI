<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman beranda untuk user yang login.
     */
    public function index()
    {
        $user = Auth::user(); // Ambil data user yang sedang login
        $favoritMenus = Menu::where('is_favorit', true)->latest()->take(5)->get();

        // URL Google Sheets CSV yang telah di-publish
        $csvUrl = 'https://docs.google.com/spreadsheets/d/e/2PACX-1vRRX3PZqyIFFbzFj1toSLR6IviilO-ZM9wR5C7IGBf03whWHPD4NGQgEMP1ttxMHTfxNUddZpeySqer/pub?gid=2134367192&single=true&output=csv';

        $entries = collect(); // Default: koleksi kosong

        try {
            $response = Http::timeout(10)->get($csvUrl);

            if ($response->ok()) {
                $lines = explode("\n", trim($response->body()));
                $rows = array_map('str_getcsv', $lines);

                if (!empty($rows)) {
                    // Ambil header dari baris pertama
                    $headers = array_map(fn($h) => strtolower(trim($h)), array_shift($rows));

                    // Gabungkan header dan data
                    $entries = collect($rows)->map(function ($row) use ($headers) {
                        if (count($row) !== count($headers)) {
                            return null; // Lewati baris yang tidak cocok jumlah kolomnya
                        }

                        $data = array_combine($headers, $row);

                        return [
                            'nama'   => $data['nama'] ?? 'Anonim',
                            'pesan'  => $data['pesan'] ?? '',
                            'rating' => $data['rating'] ?? 'N/A',
                        ];
                    })->filter();
                }
            } else {
                Log::warning('Gagal mengakses CSV dari Google Sheets: ' . $response->status());
            }
        } catch (\Exception $e) {
            Log::error('Exception saat fetch Google Sheets: ' . $e->getMessage());
        }

        return view('home', compact('user', 'favoritMenus', 'entries'));
    }
}
