<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Produk;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {

        $id_produk = $request->id_produk;
        $qty = $request->qty;
        $produk = Produk::where('id', $id_produk)->first();
        $sub_total = $produk->harga * $qty;
        $sisa_stok = $produk->stok - $qty;

        Cart::create([
            'id_order' => $id,
            'id_produk' => $id_produk,
            'qty' => $qty,
            'sub_total' => $sub_total,
        ]);

        // $produk->update([
        //     'stok' => $sisa_stok,
        // ]);

        return redirect()->route('make-order', $id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi request
        $request->validate([
            'id_produk' => 'required|exists:produk,id',
            'qty' => 'required|integer|min:1',
        ]);

        // Dapatkan pesanan berdasarkan $orderId
        $order = Order::findOrFail($id);

        // Dapatkan item keranjang yang akan diupdate
        $itemId = $request->input('id_produk');
        $cartItem = Cart::where('id_order', $id)
            ->where('id_produk', $itemId)
            ->first();

        if (!$cartItem) {
            // Item tidak ditemukan, berikan respons atau lakukan sesuatu sesuai kebutuhan aplikasi Anda
            return response()->json(['message' => 'Item not found'], 404);
        }

        // Update kuantitas item
        $cartItem->qty = $request->input('qty');
        $produk = Produk::where('id', $itemId)->first();
        $cartItem->sub_total = $produk->harga * $request->input('qty');
        $cartItem->save();

        // Berikan respons sukses
        return redirect()->back()->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cart::where('id_order', $id)->delete();

        return redirect()->route('make-order', $id);
    }
}
