<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the menus.
     */
    public function index()
    {
        // Fetch all menus from the database, sorted by the latest, with pagination.
        $menus = Menu::latest()->paginate(9);

        // Return the 'menus.index' view with the paginated menu data.
        return view('menus.index', compact('menus'));
    }
}
