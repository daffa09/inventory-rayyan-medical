<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;
use DB;

class StokBarangController extends Controller
{

    public function indexStok(Request $request)
    {

        $this->authorize('karyawan');
        $packages = DB::table('jenis_barang')
            ->select('id', 'kode_barang', 'nama_barang', 'image', 'stok', 'harga')
            ->orderBy('id', 'Desc')
            ->paginate(7)->withQueryString();
        $search = $request->get('search');
        $username = auth()->user()->username;
        $active = 'Data Barang';

        if ($search) {
            $packages = JenisBarang::where("nama_barang", "LIKE", "%$search%")->paginate(5)->withQueryString();
        }

        return view('dashboard.karyawan.stokBarang.index', compact('packages', 'username', 'active'));
    }
}
