<?php

namespace Database\Seeders;

use App\Filament\Admin\Widgets\Product;
use App\Models\Pelanggan;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(Pelanggan::count()==0){
            Pelanggan::insert([
                [
                    'nama' => 'Eka Jiparolim',
                    'email' => 'jiparolim@gmail.com',
                    'no_hp' => '08123456789',
                    'alamat' => 'Jl. Merdeka No. 10',
                    'tanggal_daftar' => Carbon::now()->format('Y-m-d'),
                    'status' => 'aktif',
                ],
                [
                    'nama' => 'Fandi Fajar Maulana',
                    'email' => 'fajar@gmail.com',
                    'no_hp' => '08123453465',
                    'alamat' => 'Jl. Sudirman No. 21',
                    'tanggal_daftar' => Carbon::now()->subDays(40)->format('Y-m-d'),
                    'status' => 'tidak_aktif',
                ],
            ]);
        }
    }
}
