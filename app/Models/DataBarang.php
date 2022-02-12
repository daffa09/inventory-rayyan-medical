<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    protected $table = 'Data_barang';
    // protected $with = ['JenisBarang'];
    use HasFactory;

    public function jenisbarang()
    {
        return $this->belongsTo(JenisBarang::class, 'jenisBarang_id');
    }
}
