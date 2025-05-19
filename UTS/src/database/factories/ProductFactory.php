<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->word(),
            'harga' => $this->faker->randomFloat(2, 1000, 100000),
            'deskripsi' => $this->faker->sentence(),
            // sesuaikan dengan kolom di tabel products
        ];
    }
}
