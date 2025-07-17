<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman beranda untuk user yang login.
     */
    public function index()
    {
        $user = Auth::user(); // Ambil data user yang sedang login
        $favoritMenus = Menu::where('is_favorit', true)->latest()->take(5)->get();

        // Fetch testimonials from Google Sheets CSV
        $csvUrl = 'https://docs.google.com/spreadsheets/d/e/2PACX-1vRRX3PZqyIFFbzFj1toSLR6IviilO-ZM9wR5C7IGBf03whWHPD4NGQgEMP1ttxMHTfxNUddZpeySqer/pub?gid=2134367192&single=true&output=csv';

        $response = Http::get($csvUrl);

        if ($response->failed()) {
            $entries = collect(); // Return empty collection if request fails
        } else {
            $lines = explode("\n", trim($response->body()));
            $rows = array_map("str_getcsv", $lines);

            if (empty($rows)) {
                $entries = collect();
            } else {
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
            }
        }

        return view('home', compact('user', 'favoritMenus', 'entries'));
    }
}