<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $users = User::where('id', auth()->user()->id)->get();
        $username = auth()->user()->username;
        $active = 'Profile';

        return view('profile.index', compact('users', 'username', 'active'));
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = User::find($id);
        $username = auth()->user()->username;
        $active = 'Edit Profile';

        return view('profile.edit', compact('model', 'username', 'active'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|max:255',
            'username' => 'required|max:255',
            'alamat' => 'required| max:255',
            'email' => 'required|email',
            'no_telp' => 'required|max:20|min:4|'
        ]);

        $model = User::find($id);
        $model->nama = htmlspecialchars($request->nama);
        $model->username = htmlspecialchars($request->username);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $model->image = $request->file('image')->store('foto-user');
        }
        $model->email = htmlspecialchars($request->email);
        $model->no_telp = htmlspecialchars($request->no_telp);
        $model->alamat = htmlspecialchars($request->alamat);
        $model->updated_at = now();
        $model->save();

        return redirect('/dashboard/profile')->with('success', 'Data Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
