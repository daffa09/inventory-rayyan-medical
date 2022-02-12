<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    protected $table = 'data_barang';
    protected $guarded = ['id'];

    use HasFactory;

    public function jenisbarang()
    {
        return $this->belongsTo(JenisBarang::class, 'jenisBarang_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function distributor()
    {
        return $this->belongsTo(PesanBarang::class, 'distributor_id');
    }
}
