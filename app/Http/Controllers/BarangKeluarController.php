<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\JenisBarang;
use Illuminate\Http\Request;
use DB;
use Throwable;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('karyawan');
        $items = DB::table('data_barang')
            ->select('data_barang.id', 'jenis_barang.kode_barang', 'jenis_barang.nama_barang', 'data_barang.qty', 'data_barang.tgl_keluar', 'users.nama')
            ->join('jenis_barang', 'jenis_barang.id', 'data_barang.jenisBarang_id')
            ->join('users', 'users.id', 'data_barang.user_id')
            ->where('data_barang.tgl_keluar', '!=', 'NULL')
            ->orderBy('data_barang.id', 'Desc')
            ->paginate(7)->withQueryString();
        $username = auth()->user()->username;
        $active = 'Barang Keluar';
        $search = $request->get('search');

        if ($search) {
            $items = DB::table('data_barang')
                ->select('data_barang.id', 'jenis_barang.kode_barang', 'jenis_barang.nama_barang', 'data_barang.qty', 'data_barang.tgl_keluar', 'users.nama')
                ->join('jenis_barang', 'jenis_barang.id', 'data_barang.jenisBarang_id')
                ->join('users', 'users.id', 'data_barang.user_id')
                ->where('data_barang.tgl_keluar', '!=', 'NULL')
                ->where("jenis_barang.nama_barang", "LIKE", "%$search%")
                ->paginate(7)->withQueryString();
        }

        return view('dashboard.karyawan.InputBarang.BarangKeluar.index', compact('items', 'username', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('karyawan');
        $items = JenisBarang::all();
        $active = 'Form Barang Keluar';
        $username = auth()->user()->username;

        return view('dashboard.karyawan.InputBarang.BarangKeluar.create', compact('items', 'username', 'active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'jenisBarang_id' => 'required',
            'qty' => 'required|min:1'
        ]);

        $qty = $request->qty;
        $jenisBarang_id = $request->input('jenisBarang_id');
        $cekQty = JenisBarang::find($jenisBarang_id);

        if ($cekQty) {
            if ($qty <  (string) $cekQty->stok) {
                // untuk mengurangi jumlah stok pada table "jenis_barang"
                DB::update("UPDATE jenis_barang SET stok = stok - '$qty' WHERE id = '$jenisBarang_id'");

                $model = new BarangKeluar;
                $model->jenisBarang_id = $request->get('jenisBarang_id');
                $model->user_id = auth()->user()->id;
                $model->qty = $request->qty;
                $model->tgl_keluar = now()->format('Y-m-d');
                $model->save();


                return redirect('/dashboard/InputBarang/BarangKeluar')->with('success', 'Data Berhasil Ditambah');
            } else {
                return redirect('/dashboard/InputBarang/BarangKeluar/create')->with('qty_failed', 'Jumlah pengeluaran lebih besar dari stok');
            }
        } else {
            return redirect('/dashboard/InputBarang/BarangKeluar/create')->with('failed', 'Data Input Tidak Valid');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function show(BarangKeluar $barangKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $this->authorize('karyawan');
        // $id_target = BarangKeluar::find($id);
        // $items = JenisBarang::all();
        // $active = 'Form Barang Keluar';
        // $username = auth()->user()->username;

        // return view('dashboard.karyawan.InputBarang.BarangKeluar.edit', compact('items', 'username', 'active', 'id_target'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // try {

        //     $this->validate($request, [
        //         'jenisBarang_id' => 'required',
        //         'qty' => 'required|min:1'
        //     ]);

        //     // $qty = $request->qty;
        //     // $jenisBarang_id = $request->input('jenisBarang_id');
        //     // DB::update("UPDATE jenis_barang SET stok = stok - '$qty' WHERE id = '$jenisBarang_id'");

        //     $model = new BarangKeluar;
        //     $model->jenisBarang_id = $request->get('jenisBarang_id');
        //     $model->user_id = auth()->user()->id;
        //     $model->qty = $request->qty;
        //     $model->save();


        //     return redirect('/dashboard/InputBarang/BarangKeluar')->with('success', 'Data Berhasil Diupdate');
        // } catch (Throwable $e) {
        //     return redirect('/dashboard/InputBarang/BarangKeluar/edit')->with('failed', 'Data Input Tidak Valid');
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = BarangKeluar::find($id);
        $qty = $model->qty;
        $jenisBarang_id = $model->jenisBarang_id;
        DB::update("UPDATE jenis_barang SET stok = stok + '$qty' WHERE id = '$jenisBarang_id'");
        $model->delete();
        return redirect('/dashboard/InputBarang/BarangKeluar')->with('success', 'Data Berhasil Dihapus!');
    }
}
