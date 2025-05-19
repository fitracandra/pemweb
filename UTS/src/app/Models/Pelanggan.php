<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggans';

    protected $fillable = [
        'nama', 'email', 'no_hp', 'alamat', 'tanggal_daftar', 'status'
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'pelanggan_id');
    }
}
