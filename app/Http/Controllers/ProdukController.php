<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Produk::all();

        $page = new PageController();
        return $page->loadPage('side-menu', 'stok-index', $data);
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
        //
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
    public function update(Request $request, $id)
    {
        // Validasi data yang dikirimkan dari form edit
        $request->validate([
            'stok' => 'required', // Validasi field 'stok' daripada 'id'
        ]);

        $produk = Produk::find($id);
        if (!$produk) {
            return redirect()->route('stok')->with('error', 'Produk tidak ditemukan.');
        }

        $produk->update([
            'stok' => $request->input('stok'),
        ]);

        return redirect()->route('stok')->with('success', 'Stok produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
