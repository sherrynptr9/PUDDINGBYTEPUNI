<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Menu;

class CartController extends Controller
{
    // Tampilkan semua isi keranjang user
    public function index()
    {
        $carts = Cart::with('menu')
                     ->where('user_id', auth()->id())
                     ->get();

        return view('cart.index', compact('carts'));
    }

    // Tambahkan item ke keranjang
    public function add(Request $request, Menu $menu)
    {
        $request->validate([
            'jumlah' => 'nullable|integer|min:1',
        ]);

        $jumlah = $request->input('jumlah', 1);

        $cart = Cart::where('user_id', auth()->id())
                    ->where('menu_id', $menu->id)
                    ->first();

        if ($cart) {
            $cart->jumlah += $jumlah;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => auth()->id(),
                'menu_id' => $menu->id,
                'jumlah'  => $jumlah,
            ]);
        }

        return redirect()->route('cart.index')
                         ->with('success', 'Menu berhasil ditambahkan ke keranjang!');
    }

    // Hapus item dari keranjang
    public function remove($id)
    {
        $cart = Cart::where('id', $id)
                    ->where('user_id', auth()->id())
                    ->firstOrFail();

        $cart->delete();

        return redirect()->route('cart.index')
                         ->with('success', 'Item berhasil dihapus dari keranjang.');
    }

    // Update jumlah item di keranjang (tambah/kurang)
    public function update(Request $request, $id)
    {
        $cart = Cart::where('id', $id)
                    ->where('user_id', auth()->id())
                    ->firstOrFail();

        if ($request->action === 'increase') {
            $cart->jumlah += 1;
        } elseif ($request->action === 'decrease' && $cart->jumlah > 1) {
            $cart->jumlah -= 1;
        }

        $cart->save();

        return back()->with('success', 'Jumlah berhasil diperbarui');
    }
}
