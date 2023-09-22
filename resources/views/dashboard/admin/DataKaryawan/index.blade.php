@extends('dashboard.layouts.main')

@section('container')
<div class="container rounded bg-white mt-5">

        <h2 class="title">Data Karyawan</h2>

        @if (session()->has('success'))
        <div class="alert alert-success col-lg-5" id="pesan" role="alert">
        {{ session('success') }}
        </div>
        @endif

    <div class="row justify-content-end mb-2 me-5">
        <div class="col-md-5">
            <form action="/dashboard/DataKaryawan">
                <div class="input-group mb-1">
                    <input type="text" class="form-control" placeholder="Search by name.." name="search" value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    <a href="/dashboard/DataKaryawan/create" class="btn btn-primary mb-3"><span data-feather="plus"></span> Tambah</a>

    @if ($users->count())


    <div class="table-responsive fs-6">
            <table class="table table-striped table-sm table-bordered" style="text-align:center">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Email</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No. Telp</th>
                    <th scope="col">Role</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->nama }}</td>
                    <td><img src="{{ asset('storage/' . $user->image) }}" class="img-fluid" width="60px" height="60px"></td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->alamat }}</td>
                    <td>{{ $user->no_telp }}</td>
                    @if ($user->is_karyawan)
                    <td>Karyawan</td>
                    @else
                    <td>Admin</td>
                    @endif
                    @if ($user->status == 1 )
                        <td style="font-weight: bold; color:green">Aktif</td>
                    @if ($user->is_karyawan == 1)
                    <td>
                        <form action="{{ url('/dashboard/DataKaryawan/'.$user->id)  }}"
                        method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="user-x"></span> Deactive</button>
                        </form>
                    </td>
                    @endif
                    @else
                        <td style="font-weight: bold; color:red">Tidak Aktif</td>
                        @if ($user->is_karyawan == 1)
                        <td>
                            <form action="{{ url('/dashboard/DataKaryawan/'.$user->id)  }}"
                            method="POST" class="d-inline">
                            @method('put')
                            @csrf
                            <button class="btn btn-success border-0" onclick="return confirm('Are you sure?')"><span data-feather="user-x"></span> Active</button>
                            </form>
                        </td>
                        @endif
                    @endif
                </tr>
                @endforeach
            </tbody>
            </table>
            <div class="d-flex justify-content-end mb-5">
                {{  $users->links() }}
            </div>
        </div>
    </div>

    @else
        <p class="text-center fs-4 mt-5 pb-5">Karyawan Tidak Ditemukan</p>
    @endif

</div>
@endsection
