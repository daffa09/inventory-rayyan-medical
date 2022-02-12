@extends('dashboard.layouts.main')

@section('container')

<div class="container rounded bg-white mt-5">

        <h1 class="title">Form Barang Keluar</h1>

        @if (session()->has('success'))
        <div class="alert alert-success col-lg-5" id="pesan" role="alert">
        {{ session('success') }}
        </div>
        @endif

        <div class="row justify-content-end mb-2 me-5">
            <div class="col-md-5">
                <form action="/dashboard/InputBarang/BarangKeluar">
                    <div class="input-group mb-1">
                        <input type="text" class="form-control" placeholder="Search by name.." name="search" value="{{ request('search') }}">
                        <button class="btn btn-danger" type="submit">Search</button>
                    </div>    
                </form>
            </div>
        </div>

        <a href="/dashboard/InputBarang/BarangKeluar/create" class="btn btn-primary bg-blue mb-3"><span data-feather="plus"></span> Tambah</a>
    
    @if ($items->count())

    <div class="table-responsive fs-6">
        <table class="table table-striped table-sm table-bordered" style="text-align:center">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Barang</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Stok Barang</th>
            <th scope="col">Nama Karyawan</th>
            <th scope="col">Tgl_Keluar</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                
            <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->kode_barang }}</td>
            <td>{{ $item->nama_barang }}</td>
            <td>{{ $item->qty }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->tgl_keluar }}</td>
            <td>
            
            <form action="{{ url('/dashboard/InputBarang/BarangKeluar/'.$item->id)  }}"
                method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-square"></button>
            </form>
            </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <div class="d-flex justify-content-end mb-3">
            {{  $items->links() }}
        </div>
    </div>

    @else
        <p class="text-center fs-4 mt-5 pb-5">Data Tidak Ditemukan</p>
    @endif
</div>
@endsection