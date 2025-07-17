<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Cart;

class OrderController extends Controller
{
    /**
     * Menampilkan form pemesanan
     */
    public function form(Menu $menu, Request $request)
    {
        // Jika datang dari cart
        $jumlah = $request->input('jumlah', 1);

        return view('order.form', compact('menu', 'jumlah'));
    }

    /**
     * Submit pesanan
     */
    public function submit(Request $request, Menu $menu)
    {
        $request->validate([
            'nama'       => 'required|string|max:100',
            'telepon'    => 'required|string|max:20',
            'alamat'     => 'required|string',
            'jumlah'     => 'required|integer|min:1',
            'pengiriman' => 'required|in:pickup,delivery',
            'catatan'    => 'nullable|string|max:1000',
        ]);

        // Simpan data pemesanan
        $order = Order::create([
            'nama_pemesan'   => $request->nama,
            'no_wa'          => $request->telepon,
            'alamat'         => $request->alamat,
            'jumlah'         => $request->jumlah,
            'pengiriman'     => $request->pengiriman,
            'catatan'        => $request->catatan,
            'menu_id'        => $menu->id,
            'status'         => 'pending',
            'tanggal_pesan'  => now(),
            'user_id'        => auth()->id(), // bisa null kalau guest
        ]);

        // Redirect ke halaman invoice
        return redirect()->route('order.invoice', $order->id)->with('success', 'Pesanan berhasil dibuat!');
    }

    /**
     * Halaman invoice
     */
    public function success(Order $order)
    {
        // Cegah user lain akses invoice orang
        if ($order->user_id && $order->user_id !== auth()->id()) {
            abort(403);
        }

        return view('order.invoice', compact('order'));
    }
}
