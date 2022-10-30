@extends('dashboard.layouts.main')

@section('container')

<div class="container-fluid bg-light" style="border-radius: 10px">

        <form class="col-md-8 mt-4 p-2" action="/dashboard/DataKaryawan" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="mb-3">
            <label for="nama" class="form-label @error('nama') is-invalid @enderror">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Karyawan.." required value="{{ old('nama') }}">
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="username" class="form-label @error('username') is-invalid @enderror">Username</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Username.." required value="{{ old('username') }}">
            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label ">Foto Karyawan</label>
            <img class="img-preview img-fluid mb-3 col-sm-3">
            <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label @error('email') is-invalid @enderror">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email.." required value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="no_telp" class="form-label @error('no_telp') is-invalid @enderror">No Telp</label>
            <input type="text" name="no_telp" id="no_telp" class="form-control" placeholder="No Telp.." required value="+62 {{ old('no_telp') }}">
            @error('no_telp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="alamat" class="form-label @error('alamat') is-invalid @enderror">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="alamat" placeholder="alamat.." required value="{{ old('alamat') }}">
            @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
            @error('password')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
            @enderror
        </div>

        <button class="btn btn-primary mb-3" type="submit" onclick="return confirm('Are you sure?')">Tambah Data</button> <a href="/dashboard/DataKaryawan" class="btn btn-success mb-3">Kembali</a>
    
    </form>
</div>

    <script>

    function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(OFREvent) {
    imgPreview.src = OFREvent.target.result;
    }
}
    </script>
@endsection