<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman beranda untuk user yang login.
     */
    public function index()
    {
        $user = Auth::user(); // Ambil data user yang sedang login

        $favoritMenus = Menu::where('is_favorit', true)->latest()->take(5)->get();

        return view('home', compact('user', 'favoritMenus'));
    }
}
