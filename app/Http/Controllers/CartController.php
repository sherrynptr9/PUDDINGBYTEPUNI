<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display all cart items for the authenticated user.
     */
    public function index()
    {
        $carts = Cart::with('menu')
            ->where('user_id', auth()->id())
            ->whereHas('menu', fn($query) => $query->where('is_available', true))
            ->get();

        return view('cart.index', compact('carts'));
    }

    /**
     * Add a menu item to the cart.
     */
    public function add(Request $request, Menu $menu)
    {
        if (!$menu->is_available) {
            return redirect()->route('cart.index')
                ->with('error', 'Menu tidak tersedia untuk dipesan.');
        }

        $request->validate([
            'jumlah' => 'nullable|integer|min:1|max:100',
        ]);

        $jumlah = $request->input('jumlah', 1);

        try {
            DB::beginTransaction();

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

            DB::commit();

            return redirect()->route('cart.index')
                ->with('success', 'Menu berhasil ditambahkan ke keranjang!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to add item to cart: ' . $e->getMessage());
            return redirect()->route('cart.index')
                ->with('error', 'Gagal menambahkan menu ke keranjang. Silakan coba lagi.');
        }
    }

    /**
     * Remove a cart item.
     */
    public function remove($id)
    {
        try {
            $cart = Cart::where('id', $id)
                ->where('user_id', auth()->id())
                ->firstOrFail();

            $cart->delete();

            return redirect()->route('cart.index')
                ->with('success', 'Item berhasil dihapus dari keranjang.');
        } catch (\Exception $e) {
            Log::error('Failed to remove cart item: ' . $e->getMessage());
            return redirect()->route('cart.index')
                ->with('error', 'Gagal menghapus item dari keranjang. Silakan coba lagi.');
        }
    }

    /**
     * Update the quantity of a cart item.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'action' => 'required|in:increase,decrease',
        ]);

        try {
            $cart = Cart::where('id', $id)
                ->where('user_id', auth()->id())
                ->firstOrFail();

            if ($request->action === 'increase') {
                if ($cart->jumlah >= 100) {
                    return redirect()->route('cart.index')
                        ->with('error', 'Jumlah maksimum sudah tercapai.');
                }
                $cart->jumlah += 1;
            } elseif ($request->action === 'decrease' && $cart->jumlah > 1) {
                $cart->jumlah -= 1;
            }

            $cart->save();

            return redirect()->route('cart.index')
                ->with('success', 'Jumlah berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Failed to update cart item: ' . $e->getMessage());
            return redirect()->route('cart.index')
                ->with('error', 'Gagal memperbarui jumlah. Silakan coba lagi.');
        }
    }
}
