@extends('dashboard.layouts.main')

@section('container')

        <h1 class="h2 mt-4 mb-5">Form Edit Data Distributor</h1>

        <form class="col-md-8" action="/dashboard/DataKaryawan/{{ $model->id }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
        <div class="mb-3">
            <label for="name" class="form-label @error('name') is-invalid @enderror">Nama</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Nama Karyawan.." required autofocus value="{{ old('name', $model->name) }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label ">Post Image</label>
            <input type="hidden" name="oldImage" value="{{ $model->image }}">
            @if ($model->image)
            <img src="{{ asset('storage/' . $model->image) }}" class="img-preview img-fluid mb-3 col-sm-3 d-block">
            @else
            <img class="img-preview img-fluid mb-3 col-sm-3">
            @endif
            <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label @error('email') is-invalid @enderror">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email.." required value="{{ old('email', $model->email) }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="no_telp" class="form-label @error('no_telp') is-invalid @enderror">No Telp</label>
            <input type="text" name="no_telp" id="no_telp" class="form-control" placeholder="No Telp.." required value="{{ old('no_telp', $model->no_telp) }}">
            @error('no_telp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="alamat" class="form-label @error('alamat') is-invalid @enderror">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="alamat" placeholder="alamat.." required value="{{ old('alamat', $model->alamat) }}">
            @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <button class="btn btn-primary mb-3" type="submit" onclick="return confirm('Are you sure?')">Update Data</button> <a href="/dashboard/DataKaryawan" class="btn btn-success mb-3">Kembali</a>
    
    </form>
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