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
                'nama' => 'Popchick Sambal Ijo',
                'stok' => '2000',
                'harga' => '17000'
            ],
            [
                'nama' => 'Popchick Sambal Matah',
                'stok' => '2000',
                'harga' => '17000'
            ],
            [
                'nama' => 'Popchick Sambal Bawang',
                'stok' => '2000',
                'harga' => '17000'
            ],
            [
                'nama' => 'Pisang Nugget Cokelat',
                'stok' => '2000',
                'harga' => '8000'
            ],
            [
                'nama' => 'Pisang Nugget Matcha',
                'stok' => '2000',
                'harga' => '8000'
            ],
            [
                'nama' => 'Pisang Nugget Cokelat Keju',
                'stok' => '2000',
                'harga' => '8000'
            ],

        ];
        foreach ($users as $key => $value) {
            Produk::create($value);
        }
    }
}
