@extends('dashboard.layouts.main')

@section('container')

<div class="container rounded bg-white mt-5">

        <h2 class="title">Data Barang</h2>
        
        @if (session()->has('success'))
        <div class="alert alert-success col-lg-5" id="pesan" role="alert">
        {{ session('success') }}
        </div>
        @endif

    <div class="row justify-content-end mb-2 me-5">
        <div class="col-md-5">
            <form action="/dashboard/DataBarang">
                <div class="input-group mb-1">
                    <input type="text" class="form-control" placeholder="Search by name.." name="search" value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit">Search</button>
                </div>    
            </form> </div>
    </div>
    
    <a href="/dashboard/DataBarang/create" class="btn btn-primary mb-3"><span data-feather="plus"></span> Tambah</a>

    @if ($packages->count())


    <div class="table-responsive fs-6">
            <table class="table table-striped table-sm table-bordered" style="text-align:center">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Barang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Foto Barang</th>
                <th scope="col">Stok Barang</th>
                <th scope="col">Harga Barang</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($packages as $barang)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $barang->kode_barang }}</td>
                <td>{{ $barang->nama_barang }}</td>
                <td><img src="{{ asset('storage/' . $barang->image) }}" class="img-fluid" width="60px" height="60px"></td>
                <td>{{ $barang->stok }}</td>
                <td> @currency($barang->harga) / satuan </td>
                <td>
                    <a href="{{ url('/dashboard/DataBarang/'.$barang->id.'/edit')  }}" class="btn btn-warning text-decoration-none text-white"><span data-feather="edit"></span> Edit</a>
                    <form action="{{ url('/dashboard/DataBarang/'.$barang->id)  }}"
                    method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
                    </form>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
            <div class="d-flex justify-content-end mb-5">
                {{  $packages->links() }}
            </div>
        </div>
    </div>

    @else
        <p class="text-center fs-4 mt-5 pb-5">Barang Tidak Ditemukan</p>
    @endif


</div>
@endsection