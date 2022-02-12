<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    protected $table = 'jenis_barang';
    protected $guarded = ['id'];
    // protected $with = ['barang'];

    use HasFactory;

    public static function cek_kode_barang()
    {
        $kode_barang = JenisBarang::count();
        if ($kode_barang == 0) {
            $urut = 101;
            $nomor = $urut;
        } else {
            $ambil = JenisBarang::all()->last();
            $urut = (int)substr($ambil->kode_barang, -3) + 1;
            $nomor = $urut;
        }

        return $nomor;
    }

    public function barang()
    {
        return $this->hasMany(DataBarang::class);
    }

    public function laporan()
    {
        return $this->hasMany(Laporan::class);
    }
}
