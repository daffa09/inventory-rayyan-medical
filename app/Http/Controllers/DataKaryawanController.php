<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use DB;

class DataKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('admin');
        $users = DB::table('users')
            ->select('id', 'nama', 'image', 'email', 'alamat', 'no_telp', 'is_karyawan', 'is_admin', 'status')
            ->orderBy('id', 'Desc')
            ->paginate(5)->withQueryString();
        $search = $request->get('search');
        $username = auth()->user()->username;
        $active = 'Data Karyawan';

        if ($search) {
            $users = User::where("nama", "LIKE", "%$search%")->paginate(5)->withQueryString();
        }
        return view('dashboard.admin.DataKaryawan.index', compact('users', 'username', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $username = auth()->user()->username;
        $active = 'Tambah Data Karyawan';

        return view('dashboard.admin.DataKaryawan.create', compact('username', 'active'));
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
            'nama' => 'required|max:255',
            'username' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'email' => 'required|unique:users',
            'no_telp' => 'required|unique:users|max:20|min:4',
            'alamat' => 'required|max:255',
            'password' => 'required|min:5|max:255'
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('foto-user');
        }

        $validateData['is_karyawan'] = true;
        $validateData['is_admin'] = false;
        $validateData['status'] = true;
        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        return redirect('/dashboard/DataKaryawan')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataKaryawan  $dataKaryawan
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataKaryawan  $dataKaryawan
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataKaryawan  $dataKaryawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = User::find($id);

        $model->update(['status' => true]);
        return redirect('/dashboard/DataKaryawan')->with('success', 'User Berhasil di aktifkan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataKaryawan  $dataKaryawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = User::find($id);

        // if ($model->image) {
        //     Storage::delete($model->image);
        // }
        // $model->delete();
        // change status into 0
        $model->update(['status' => false]);
        return redirect('/dashboard/DataKaryawan')->with('success', 'User berhasil di non-aktifkan!');
    }
}
