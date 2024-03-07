<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $item_sales = Cart::all()->sum('qty');
        $orders = Order::all()->count();
        $revenue = Transaksi::all()->sum('total_harga');
        $page = new PageController();
        $items = Produk::all()->sum('stok');
        $data = [
            'item_sales' => $item_sales,
            'orders' => $orders,
            'revenue' => $revenue,
            'items' => $items,
        ];

        return $page->loadPage('side-menu', 'index', $data);
    }
}
