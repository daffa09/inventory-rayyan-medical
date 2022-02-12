<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\JenisBarang;
use App\Models\PesanBarang;
use Illuminate\Http\Request;
use DB;
use Throwable;

class BarangMasukController extends Controller
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
            ->select('data_barang.id', 'jenis_barang.kode_barang', 'jenis_barang.nama_barang', 'data_barang.qty', 'distributor.name', 'data_barang.tgl_masuk', 'users.nama')
            ->join('jenis_barang', 'jenis_barang.id', 'data_barang.jenisBarang_id')
            ->join('distributor', 'distributor.id', 'data_barang.distributor_id')
            ->join('users', 'users.id', 'data_barang.user_id')
            ->where('data_barang.tgl_masuk', '!=', 'NULL')
            ->orderBy('data_barang.id', 'Desc')
            ->paginate(7)->withQueryString();
        $username = auth()->user()->username;
        $active = 'Barang Masuk';
        $search = $request->get('search');


        if ($search) {
            $items = DB::table('data_barang')
                ->select('data_barang.id', 'jenis_barang.kode_barang', 'jenis_barang.nama_barang', 'data_barang.qty', 'distributor.name', 'data_barang.tgl_masuk', 'users.nama')
                ->join('jenis_barang', 'jenis_barang.id', 'data_barang.jenisBarang_id')
                ->join('distributor', 'distributor.id', 'data_barang.distributor_id')
                ->join('users', 'users.id', 'data_barang.user_id')
                ->where('data_barang.tgl_masuk', '!=', 'NULL')
                ->where("jenis_barang.nama_barang", "LIKE", "%$search%")
                ->paginate(7)->withQueryString();
        }

        return view('dashboard.karyawan.InputBarang.BarangMasuk.index', compact('items', 'username', 'active'));
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
        $distributors = PesanBarang::all();
        $active = 'Form Barang Masuk';
        $username = auth()->user()->username;

        return view('dashboard.karyawan.InputBarang.BarangMasuk.create', compact('items', 'distributors', 'username', 'active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $this->validate($request, [
                'jenisBarang_id' => 'required',
                'distributor_id' => 'required',
                'qty' => 'required|min:1'
            ]);

            $qty = $request->qty;
            $jenisBarang_id = $request->input('jenisBarang_id');
            DB::update("UPDATE jenis_barang SET stok = stok + '$qty' WHERE id = '$jenisBarang_id'");

            $model = new BarangMasuk;
            $model->jenisBarang_id = $request->get('jenisBarang_id');
            $model->user_id = auth()->user()->id;
            $model->distributor_id = $request->get('distributor_id');
            $model->qty = $request->qty;
            $model->tgl_masuk = now()->format('Y-m-d');
            $model->save();


            return redirect('/dashboard/InputBarang/BarangMasuk')->with('success', 'Data Berhasil Ditambah');
        } catch (Throwable $e) {
            return redirect('/dashboard/InputBarang/BarangMasuk/create')->with('failed', 'Data Input Tidak Valid');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function show(BarangMasuk $barangMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $this->authorize('karyawan');
        // $id_target = BarangMasuk::find($id);
        // $items = JenisBarang::all();
        // $distributors = PesanBarang::all();
        // $active = 'Form Barang Masuk';
        // $username = auth()->user()->username;

        // return view('dashboard.karyawan.InputBarang.BarangMasuk.edit', compact('items', 'distributors', 'username', 'active', 'id_target'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = BarangMasuk::find($id);
        $qty = $model->qty;
        $jenisBarang_id = $model->jenisBarang_id;
        DB::update("UPDATE jenis_barang SET stok = stok - '$qty' WHERE id = '$jenisBarang_id'");
        $model->delete();

        return redirect('/dashboard/InputBarang/BarangMasuk')->with('success', 'Data Berhasil Dihapus!');
    }
}
