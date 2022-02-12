<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Laporan;

class CetakLaporanController extends Controller
{
    public function pdf_barangKeluar()
    {
        $item = DB::select('SELECT * FROM data_barang WHERE tgl_keluar IS NOT NULL ORDER BY id DESC');
        $items = Laporan::hydrate($item);
        $active = 'Laporan barang keluar';

        $pdf = \PDF::loadview('dashboard.admin.Laporan.cetak-barang-keluar', compact('items', 'active'));
        return $pdf->download('laporan-barang-keluar.pdf');
    }

    public function pdf_barangMasuk()
    {
        $item = DB::select('SELECT * FROM data_barang WHERE tgl_masuk IS NOT NULL ORDER BY id DESC');
        $items = Laporan::hydrate($item);
        $active = 'Laporan barang masuk';

        $pdf = \PDF::loadview('dashboard.admin.Laporan.cetak-barang-masuk', compact('items', 'active'));
        return $pdf->download('laporan-barang-masuk.pdf');
    }
}
