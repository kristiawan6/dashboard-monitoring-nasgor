<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'nama' => 'Nasi Goreng Biasa',
                'stok' => '2000',
                'harga' => '14000'
            ],
            [
                'nama' => 'Nasi Goreng Hijau',
                'stok' => '2000',
                'harga' => '15000'
            ],
            [
                'nama' => 'Nasi Goreng Mauwut',
                'stok' => '2000',
                'harga' => '15000'
            ],
            [
                'nama' => 'Nasi Goreng Kambing',
                'stok' => '2000',
                'harga' => '25000'
            ],
            [
                'nama' => 'Nasi Goreng Seafood',
                'stok' => '2000',
                'harga' => '25000'
            ],
            [
                'nama' => 'Nasi Goreng Ayam',
                'stok' => '2000',
                'harga' => '20000'
            ],
            [
                'nama' => 'Nasi Goreng Ati Ampela',
                'stok' => '2000',
                'harga' => '20000'
            ],
            [
                'nama' => 'Nasi Goreng Teri Medan',
                'stok' => '2000',
                'harga' => '20000'
            ],
            [
                'nama' => 'Nasi Goreng Gila',
                'stok' => '2000',
                'harga' => '20000'
            ],
            [
                'nama' => 'Nasi Goreng Telor Dadar',
                'stok' => '2000',
                'harga' => '20000'
            ],
            [
                'nama' => 'Nasi Goreng Bakso/sosis',
                'stok' => '2000',
                'harga' => '20000'
            ],
            [
                'nama' => 'Nasi Goreng Pete',
                'stok' => '2000',
                'harga' => '20000'
            ],
            [
                'nama' => 'Mie/Bihun/Kwetiau Goreng/Rebus',
                'stok' => '2000',
                'harga' => '15000'
            ],
        ];


        foreach ($users as $key => $value) {
            Produk::create($value);
        }
    }
}
