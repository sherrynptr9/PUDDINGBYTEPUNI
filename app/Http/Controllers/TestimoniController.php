<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

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

            // Convert rating to float or null if not numeric
            $rating = isset($data['rating']) && is_numeric($data['rating']) ? (float) $data['rating'] : null;

            return [
                'nama'   => $data['nama'] ?? 'Anonim',
                'pesan'  => $data['pesan'] ?? '',
                'rating' => $rating, // Use null instead of 'N/A' for non-numeric ratings
                'date'   => $data['date'] ?? null, // Include date if available in CSV
            ];
        })->filter();

        return view('testimoni.index', compact('entries'));
    }
}