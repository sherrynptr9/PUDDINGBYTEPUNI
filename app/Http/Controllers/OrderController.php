<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Menampilkan form pemesanan
     */
    public function form(Menu $menu, Request $request)
    {
        // Ensure menu exists
        if (!$menu) {
            abort(404, 'Menu tidak ditemukan.');
        }

        // Get jumlah from request or default to 1
        $jumlah = $request->input('jumlah', 1);
        $source = $request->input('source', 'direct');

        return view('order.form', compact('menu', 'jumlah', 'source'));
    }

    /**
     * Submit pesanan
     */
    public function submit(Request $request, Menu $menu)
    {
        // Ensure menu exists
        if (!$menu) {
            abort(404, 'Menu tidak ditemukan.');
        }

        $request->validate([
            'nama_pemesan' => 'required|string|max:100',
            'no_wa'        => 'required|string|regex:/^\d{10,20}$/',
            'alamat'       => 'required|string|max:500',
            'jumlah'       => 'required|integer|min:1',
            'pengiriman'   => 'required|in:pickup,delivery',
            'catatan'      => 'nullable|string|max:1000',
            'source'       => 'nullable|string|in:direct,cart',
        ]);

        // Simpan data pemesanan
        $order = Order::create([
            'nama_pemesan'   => $request->nama_pemesan,
            'no_wa'          => $request->no_wa,
            'alamat'         => $request->alamat,
            'jumlah'         => $request->jumlah,
            'pengiriman'     => $request->pengiriman,
            'catatan'        => $request->catatan,
            'menu_id'        => $menu->id,
            'total_harga'    => $menu->harga * $request->jumlah,
            'status'         => 'pending',
            'tanggal_pesan'  => now(),
            'user_id'        => Auth::id(), // Bisa null kalau guest
        ]);

        // If from cart, remove the cart item
        if ($request->source === 'cart' && Auth::check()) {
            Cart::where('user_id', Auth::id())->where('menu_id', $menu->id)->delete();
        }

        // Redirect ke halaman invoice
        return redirect()->route('order.invoice', $order->id)->with('success', 'Pesanan berhasil dibuat!');
    }

    /**
     * Halaman invoice
     */
    public function success(Order $order)
    {
        // Cegah user lain akses invoice orang
        if ($order->user_id && Auth::id() && $order->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke pesanan ini.');
        }

        return view('order.invoice', compact('order'));
    }

    /**
     * Menampilkan form pemesanan dari keranjang
     */
    public function formFromCart(Cart $cart)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login untuk mengakses form pemesanan.');
        }

        // Verify cart exists and belongs to the authenticated user
        if (!$cart || $cart->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke keranjang ini.');
        }

        // Verify menu exists
        $menu = $cart->menu;
        if (!$menu) {
            abort(404, 'Menu tidak ditemukan untuk keranjang ini.');
        }

        $jumlah = $cart->jumlah;
        $source = 'cart';

        return view('order.form', compact('menu', 'jumlah', 'source'));
    }
}