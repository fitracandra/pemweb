<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\Pelanggan;
use Illuminate\Support\Str;

use App\Models\Product;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        $pelanggans = Pelanggan::all();
        if ($pelanggans->isEmpty()) {
            $pelanggans = Pelanggan::factory()->create();
        }

        $products = Product::all();
        if ($products->isEmpty()) {
            $products = Product::factory()->create();
        }

        // foreach ($pelanggans as $pelanggan) {
        //     Transaction::factory()->count(5)->create([
        //         'pelanggan_id' => $pelanggan->id,
        //         'product_id' => $products->random()->id, // Pilih produk secara acak
        //     ]);
        // }
    }
}