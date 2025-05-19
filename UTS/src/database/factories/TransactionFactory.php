<?php

namespace Database\Factories;


use App\Models\Pelanggan;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TransactionFactory extends Factory
{
    public function definition()
    {
        return [
            'pelanggan_id' => Pelanggan::factory(),
            'product_id' => Product::factory(),
            'kode_transaksi' => strtoupper(Str::random(10)),
            'jenis' => $this->faker->randomElement(['debit', 'kredit']),
            'jumlah' => $this->faker->randomFloat(2, 10000, 1000000),
            'harga' => $this->faker->randomFloat(2, 10000, 1000000), 
            'keterangan' => $this->faker->sentence(),
            'tanggal' => $this->faker->date(),
        ];
    }
}
