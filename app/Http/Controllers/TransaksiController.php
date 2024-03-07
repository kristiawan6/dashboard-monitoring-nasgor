<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TransaksiController extends Controller
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
        Transaksi::create([
            'id_order' => $id,
            'total_harga' => $request->total,
            'tanggal' => Carbon::today(),
        ]);

        Order::where('id', $id)->update([
            'status' => 'PAID',
        ]);

        $items = Cart::with('produk')->where('id_order', $id)->get(); // Mengubah 'id' menjadi 'id_order'

        foreach ($items as $item) {
            $id_produk = $item->produk->id;
            $produk = Produk::find($id_produk); // Menggunakan metode 'find' untuk mencari produk berdasarkan ID
            if ($produk) {
                $sisa_stok = $produk->stok - $item->qty;
                if ($sisa_stok >= 0) { // Pastikan stok yang tersedia cukup
                    $produk->update([
                        'stok' => $sisa_stok,
                    ]);
                } else {
                }
            }
        }


        return redirect()->route('order');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
