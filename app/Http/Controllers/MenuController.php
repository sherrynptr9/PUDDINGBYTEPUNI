<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        // Ambil semua menu dari database
<<<<<<< HEAD
        $menus = Menu::latest()->paginate(9); // paginate opsional

=======
        $menus = Menu::latest()->paginate(9);
>>>>>>> fd6a9bb5 (commit)
        return view('menus.index', compact('menus'));
    }
}
