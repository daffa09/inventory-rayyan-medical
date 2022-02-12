<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use DB;
use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanBarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('admin');
        $items = DB::table('data_barang')
            ->select('data_barang.id', 'jenis_barang.kode_barang', 'jenis_barang.nama_barang', 'data_barang.qty', 'data_barang.tgl_keluar', 'users.nama')
            ->join('jenis_barang', 'jenis_barang.id', 'data_barang.jenisBarang_id')
            ->join('users', 'users.id', 'data_barang.user_id')
            ->where('data_barang.tgl_keluar', '!=', 'NULL')
            ->orderBy('data_barang.id', 'Desc')
            ->paginate(7)->withQueryString();
        $username = auth()->user()->username;
        $active = 'Laporan Barang Keluar';


        return view('dashboard.admin.Laporan.BarangKeluar.index', compact('items', 'username', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        //
    }
}
