<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserOrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->latest()->get();
        return view('user.orders', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'no_wa' => 'required|string|max:20',
            'tanggal_pesan' => 'required|date',
            'menu_id' => 'required|exists:menus,id',
            'jumlah' => 'required|numeric|min:1',
        ]);

        Order::create([
            'user_id' => Auth::id(),
            'nama_pemesan' => $request->nama_pemesan,
            'no_wa' => $request->no_wa,
            'tanggal_pesan' => $request->tanggal_pesan,
            'menu_id' => $request->menu_id,
            'jumlah' => $request->jumlah,
            'status' => 'pending',
        ]);

        return redirect('/')->with('success', 'Pesanan berhasil dikirim!');
    }
}
