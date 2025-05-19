<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'pelanggan_id', 'kode_transaksi', 'jenis', 'jumlah', 'keterangan', 'tanggal'
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
