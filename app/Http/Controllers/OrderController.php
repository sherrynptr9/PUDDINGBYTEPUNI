<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['form', 'submit', 'success', 'formFromCart']);
    }

    /**
     * Menampilkan form pemesanan
     */
    public function form(Request $request, Menu $menu = null)
    {
        $source = $request->route()->getName() === 'order.cart' ? 'cart' : ($menu ? 'menu' : $request->query('source', 'cart'));
        $carts = $source === 'cart' && Auth::check()
            ? Cart::where('user_id', Auth::id())->with('menu')->get()
            : collect();

        if ($source === 'cart' && $carts->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang Anda kosong. Tambahkan item terlebih dahulu.');
        }

        return view('order.form', compact('source', 'menu', 'carts'));
    }

    /**
     * Submit pesanan satu menu
     */
    public function submit(Request $request, Menu $menu)
    {
        if (!$menu) {
            abort(404, 'Menu tidak ditemukan.');
        }

        if (!$menu->is_available) {
            return redirect()->route('cart.index')->with('error', 'Menu tidak tersedia untuk dipesan.');
        }

        $request->validate([
            'nama_pemesan' => 'required|string|max:100',
            'no_wa'        => 'required|string|regex:/^\d{10,20}$/',
            'alamat'       => 'required|string|max:500',
            'jumlah'       => 'required|integer|min:1|max:100',
            'pengiriman'   => 'required|in:pickup,delivery',
            'catatan'      => 'nullable|string|max:1000',
            'source'       => 'nullable|string|in:direct,cart',
        ]);

        try {
            DB::beginTransaction();

            $order = Order::create([
                'user_id'        => Auth::id(),
                'nama_pemesan'   => $request->nama_pemesan,
                'no_wa'          => $request->no_wa,
                'alamat'         => $request->alamat,
                'jumlah'         => $request->jumlah,
                'pengiriman'     => $request->pengiriman,
                'catatan'        => $request->catatan,
                'status'         => 'pending',
                'tanggal_pesan'  => Carbon::now(),
                'menu_id'        => $menu->id,
                'total_harga'    => $menu->harga * $request->jumlah,
            ]);

            // Jika dari keranjang, hapus item dari cart
            if ($request->source === 'cart' && Auth::check()) {
                Cart::where('user_id', Auth::id())->where('menu_id', $menu->id)->delete();
            }

            DB::commit();

            return redirect()->route('order.invoice', $order->id)->with('success', 'Pesanan berhasil dibuat!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('cart.index')->with('error', 'Gagal membuat pesanan: ' . $e->getMessage());
        }
    }

    /**
     * Submit pesanan dari banyak item di keranjang
     */
    public function submitCart(Request $request)
    {
        $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'no_wa'        => 'required|string|regex:/^\d{10,20}$/',
            'alamat'       => 'required|string',
            'pengiriman'   => 'required|in:pickup,delivery',
            'catatan'      => 'nullable|string',
            'items'        => 'required|array|min:1',
            'items.*.jumlah' => 'required|integer|min:1|max:100',
            'items.*.menu_id' => 'required|exists:menus,id',
        ]);

        try {
            DB::beginTransaction();

            $orders = [];
            foreach ($request->items as $item) {
                $menu = Menu::findOrFail($item['menu_id']);
                if (!$menu->is_available) {
                    throw new \Exception("Menu {$menu->nama} tidak tersedia.");
                }

                $orders[] = Order::create([
                    'user_id'        => Auth::id(),
                    'nama_pemesan'   => $request->nama_pemesan,
                    'no_wa'          => $request->no_wa,
                    'alamat'         => $request->alamat,
                    'jumlah'         => $item['jumlah'],
                    'pengiriman'     => $request->pengiriman,
                    'catatan'        => $request->catatan,
                    'status'         => 'pending',
                    'tanggal_pesan'  => Carbon::now(),
                    'menu_id'        => $menu->id,
                    'total_harga'    => $menu->harga * $item['jumlah'],
                ]);
            }

            Cart::where('user_id', Auth::id())->delete();

            DB::commit();

            return redirect()->route('order.invoice', $orders[0]->id)->with('success', 'Pesanan berhasil dibuat!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('cart.index')->with('error', 'Gagal membuat pesanan: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan halaman invoice
     */
    public function success(Order $order)
    {
        if ($order->user_id && Auth::check() && $order->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke pesanan ini.');
        }

        return view('order.invoice', compact('order'));
    }

    /**
     * Menampilkan form pemesanan dari keranjang (1 item)
     */
    public function formFromCart(Cart $cart)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login untuk mengakses form pemesanan.');
        }

        if (!$cart || $cart->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke keranjang ini.');
        }

        $menu = $cart->menu;
        if (!$menu) {
            abort(404, 'Menu tidak ditemukan untuk keranjang ini.');
        }

        $jumlah = $cart->jumlah;
        $source = 'cart';

        return view('order.form', compact('menu', 'jumlah', 'source'));
    }
}
