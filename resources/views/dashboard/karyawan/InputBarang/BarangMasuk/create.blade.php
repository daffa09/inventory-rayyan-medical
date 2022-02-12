@extends('dashboard.layouts.main')

@section('container')

<div class="container-fluid bg-light" style="border-radius: 10px">

        @if (session()->has('failed'))
        <div class="alert alert-danger col-lg-5" id="pesan" role="alert">
        {{ session('failed') }}
        </div>
        @endif

        <form class="col-md-8 mt-4 p-2" action="/dashboard/InputBarang/BarangMasuk" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="mb-3">
            <label for="jenisBarang_id" class="form-label @error('jenisBarang_id') is-invalid @enderror">Nama Barang</label>
            <select class="form-control" name="jenisBarang_id"> 
                <option selected>Nama Barang...</option>
            @foreach($items as $item)
                <option value="{{ old('jenisBarang_id'),$item->id }} {{ ( $item->id == $item->id) ? $item->id : '' }}">{{ $item->nama_barang }}</option>
            @endforeach
            </select>
            @error('jenisBarang_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="distributor_id" class="form-label @error('distributor_id') is-invalid @enderror">Nama Distributor</label>
            <select class="form-control input-sm" name="distributor_id" id="distributor_id"> 
                <option selected>Nama Distributor...</option>
            @foreach($distributors as $distributor)
                <option value="{{ old('distributor_id'),$distributor->id }} {{ ( $distributor->id == $distributor->id) ? $distributor->id : '' }}">{{ $distributor->name }}</option>
            @endforeach
            </select>
            @error('distributor_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="qty" class="form-label @error('qty') is-invalid @enderror">Qty</label>
            <input type="text" name="qty" class="form-control" id="qty" placeholder="Qty Barang.." value="{{ old('qty') }}">
            @error('qty')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <button class="btn btn-primary mb-3" type="submit" onclick="return confirm('Are you sure?')">Input Data Barang</button>
        <a href="/dashboard/InputBarang/BarangMasuk" class="btn btn-success mb-3">Kembali</a>
    
    </form>
</div>
@endsection