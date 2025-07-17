<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        // Ambil semua menu dari database
        $menus = Menu::latest()->paginate(9); // paginate opsional

        return view('menus.index', compact('menus'));
    }
}
