<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Produk;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Order::with('transaksi')->get();
        $page = new PageController();
        return $page->loadPage('side-menu', 'order-index', $data);
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
    public function store(Request $request)
    {

        $code = 'ORD - ' . mt_rand(0000, 9999);

        Order::create([
            'nama_customer' => $request->nama_customer,
            'code' => $code,
            'status' => 'UNPAID',
        ]);

        $order_id = Order::latest()->first()->id;

        return redirect()->route('make-order', $order_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $total = Cart::with('produk')->where('id_order', $id)->get()->sum('sub_total');
        $data = [
            'produk' => Produk::all(),
            'order' => Order::findOrFail($id),
            'cart' => Cart::with('produk')->where('id_order', $id)->get(),
            'total' => $total,
        ];

        $page = new PageController();
        return $page->loadPage('side-menu', 'make-order', $data);
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
