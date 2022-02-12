<?php

namespace App\Http\Controllers;

use DB;
use App\Models\PesanBarang;
use Illuminate\Http\Request;

class AdminPesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('admin');
        $distributors = DB::table('distributor')
            ->select('id', 'name', 'vendor', 'email', 'no_telp')
            ->orderBy('id', 'Desc')
            ->paginate(7)->withQueryString();
        $search = $request->get('search');
        $username = auth()->user()->username;
        $active = 'Pesan Barang';

        if ($search) {
            $distributors = PesanBarang::where("name", "LIKE", "%$search%")->paginate(5)->withQueryString();
        }

        return view('dashboard.admin.PesanBarang.index', compact('distributors', 'username', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $username = auth()->user()->username;
        $active = 'Tambah Data Distributor';

        return view('dashboard.admin.PesanBarang.create', compact('username', 'active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'name' => 'required|max:255',
            'vendor' => 'required|max:255',
            'email' => 'required|unique:distributor',
            'no_telp' => 'required|max:20|min:4|unique:distributor'
        ]);

        PesanBarang::create($validateData);

        return redirect('/dashboard/pesan')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PesanBarang  $pesanBarang
     * @return \Illuminate\Http\Response
     */
    public function show(PesanBarang $pesanBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PesanBarang  $pesanBarang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $this->authorize('admin');
        $model = PesanBarang::find($id);
        $username = auth()->user()->username;
        $active = 'Edit Data Distributor';

        return view('dashboard.admin.PesanBarang.edit', compact('model', 'username', 'active'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PesanBarang  $pesanBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required|max:255',
            'vendor' => 'required|max:255',
            'email' => 'required|email',
            'no_telp' => 'required|max:20|min:4'
        ]);

        $model = PesanBarang::find($id);
        $model->name =  htmlspecialchars($request->name);
        $model->vendor = htmlspecialchars($request->vendor);
        $model->email = htmlspecialchars($request->email);
        $model->no_telp = htmlspecialchars($request->no_telp);
        $model->save();

        return redirect('/dashboard/pesan')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PesanBarang  $pesanBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = PesanBarang::find($id);
        $model->delete();
        return redirect('/dashboard/pesan')->with('success', 'Data Berhasil Dihapus!');
    }
}
