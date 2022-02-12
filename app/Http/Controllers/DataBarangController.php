<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\JenisBarang;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $this->authorize('admin');
        $packages = DB::table('jenis_barang')
            ->select('id', 'kode_barang', 'nama_barang', 'image', 'stok', 'harga')
            ->orderBy('id', 'Desc')
            ->paginate(7)->withQueryString();
        $search = $request->get('search');
        $kode_barang = JenisBarang::count();
        $username = auth()->user()->username;
        $active = 'Data Barang';

        if ($search) {
            $packages = JenisBarang::where("nama_barang", "LIKE", "%$search%")->paginate(5)->withQueryString();
        }

        return view('dashboard.admin.DataBarang.index', compact('packages', 'username', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nomor = JenisBarang::cek_kode_barang();
        $username = auth()->user()->username;
        $active = 'Tambah Data Barang';

        return view('dashboard.admin.DataBarang.create', compact('nomor', 'username', 'active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nomor = JenisBarang::cek_kode_barang();

        $validateData = $request->validate([
            'nama_barang' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'stok' => 'required|min:1',
            'harga' => 'required|min:1'
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('foto-barang');
        }

        $validateData['kode_barang'] = $nomor;

        JenisBarang::create($validateData);


        return redirect('/dashboard/DataBarang')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataBarang  $dataBarang
     * @return \Illuminate\Http\Response
     */
    public function show(DataBarang $dataBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataBarang  $dataBarang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('admin');
        $model = JenisBarang::find($id);
        $username = auth()->user()->username;
        $active = 'Edit Data Barang';

        return view('dashboard.admin.DataBarang.edit', compact('model', 'username', 'active'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataBarang  $dataBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $model = JenisBarang::find($id);
        $model->nama_barang = htmlspecialchars($request->nama_barang);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $model->image = $request->file('image')->store('foto-barang');
        }
        $model->stok = htmlspecialchars($request->stok);
        $model->harga = htmlspecialchars($request->harga);
        $model->updated_at = now();
        $model->save();

        return redirect('/dashboard/DataBarang')->with('success', 'Data Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataBarang  $dataBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisBarang $jenisBarang, $id)
    {
        $model = JenisBarang::find($id);
        if ($model->image) {
            Storage::delete($model->image);
        }
        $model->delete();
        return redirect('/dashboard/DataBarang')->with('success', 'Data Berhasil Dihapus!');
    }
}
