@extends('dashboard.layouts.main')

@section('container')

<div class="container-fluid bg-light" style="border-radius: 10px">

        <form class="col-md-8 mt-4 p-2" action="/dashboard/pesan" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="mb-3">
            <label for="name" class="form-label @error('name') is-invalid @enderror">Nama</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Nama Distributor.." required value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="vendor" class="form-label @error('vendor') is-invalid @enderror">Nama Perusahaan</label>
            <input type="text" name="vendor" id="vendor" class="form-control" placeholder="Nama perusahaan.." required value="{{ old('vendor') }}">
            @error('vendor')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label @error('email') is-invalid @enderror">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Email@example.com" required value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>  

        


        <div class="mb-3">
            <label for="no_telp" class="form-label @error('no_telp') is-invalid @enderror">No Telp</label>
            <input type="text" name="no_telp" id="no_telp" class="form-control d-flex" placeholder="No Telp.." required value=" (+62) {{ old('no_telp') }}">
            @error('no_telp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <button class="btn btn-primary mb-3" type="submit" onclick="return confirm('Are you sure?')">Tambah Data</button> <a href="/dashboard/pesan" class="btn btn-success mb-3">Kembali</a>
    
    </form>
</div>
@endsection