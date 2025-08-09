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
        $this->middleware('auth')->except(['form', 'submitSingle', 'success']);
    }

    /**
     * Form pemesanan
     */
    public function form(Request $request, Menu $menu = null)
    {
        $source = $request->route()->getName() === 'order.cart' ? 'cart' : 'menu';
        $carts = collect();

        if ($source === 'cart' && Auth::check()) {
            $carts = Cart::where('user_id', Auth::id())->with('menu')->get();
            if ($carts->isEmpty()) {
                return redirect()->route('cart.index')->with('error', 'Keranjang kosong.');
            }
        }

        return view('order.form', compact('source', 'menu', 'carts'));
    }

    /**
     * Submit pesanan single menu
     */
    public function submitSingle(Request $request, Menu $menu)
    {
        $validatedData = $request->validate([
            'nama_pemesan' => 'required|string|max:100',
            'telepon'      => 'required|string|regex:/^\+?\d{10,20}$/',
            'alamat'       => 'required|string|max:500',
            'jumlah'       => 'required|integer|min:1|max:100',
            'pengiriman'   => 'required|in:pickup,delivery',
            'catatan'      => 'nullable|string|max:1000',
        ]);

        DB::beginTransaction();

        try {
            $order = Order::create([
                'user_id'        => Auth::id(),
                'nama_pemesan'   => $validatedData['nama_pemesan'],
                'no_wa'          => $validatedData['telepon'],
                'alamat'         => $validatedData['alamat'],
                'jumlah'         => $validatedData['jumlah'],
                'pengiriman'     => $validatedData['pengiriman'],
                'catatan'        => $validatedData['catatan'],
                'status'         => 'pending',
                'tanggal_pesan'  => Carbon::now(),
                'menu_id'        => $menu->id,
                'total_harga'    => $menu->harga * $validatedData['jumlah'],
            ]);

            DB::commit();
            return redirect()->route('order.invoice', $order->id)->with('success', 'Pesanan berhasil dibuat!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal membuat pesanan: '.$e->getMessage());
        }
    }

    /**
     * Submit pesanan dari cart
     */
    public function submitCart(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'telepon'      => 'required|string|regex:/^\+?\d{10,20}$/',
            'alamat'       => 'required|string|max:500',
            'pengiriman'   => 'required|in:pickup,delivery',
            'catatan'      => 'nullable|string|max:1000',
            'items'        => 'required|array|min:1',
            'items.*.jumlah' => 'required|integer|min:1|max:100',
            'items.*.menu_id' => 'required|exists:menus,id',
        ]);

        DB::beginTransaction();

        try {
            $firstOrderId = null;

            foreach ($validatedData['items'] as $item) {
                $menu = Menu::findOrFail($item['menu_id']);

                $order = Order::create([
                    'user_id'        => Auth::id(),
                    'nama_pemesan'   => $validatedData['nama_pemesan'],
                    'no_wa'          => $validatedData['telepon'],
                    'alamat'         => $validatedData['alamat'],
                    'jumlah'         => $item['jumlah'],
                    'pengiriman'     => $validatedData['pengiriman'],
                    'catatan'        => $validatedData['catatan'],
                    'status'         => 'pending',
                    'tanggal_pesan'  => Carbon::now(),
                    'menu_id'        => $menu->id,
                    'total_harga'    => $menu->harga * $item['jumlah'],
                ]);

                if (!$firstOrderId) {
                    $firstOrderId = $order->id;
                }
            }

            Cart::where('user_id', Auth::id())->delete();

            DB::commit();
            return redirect()->route('order.invoice', $firstOrderId)->with('success', 'Pesanan berhasil dibuat!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal membuat pesanan: '.$e->getMessage());
        }
    }

    /**
     * Halaman invoice
     */
    public function success(Order $order)
    {
        if ($order->user_id && Auth::id() !== $order->user_id) {
            abort(403);
        }

        return view('order.invoice', compact('order'));
    }
}
