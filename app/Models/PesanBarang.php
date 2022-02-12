<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesanBarang extends Model
{
    use HasFactory;

    protected $table = 'distributor';
    protected $guarded = ['id'];
    // protected $fillable = ['name', 'vendor', 'email', 'no_telp'];

    public function laporan()
    {
        return $this->hasMany(Laporan::class);
    }

    // public function barang_masuk()
    // {
    //     return $this->hasMany(BarangMasuk::class);
    // }
}
