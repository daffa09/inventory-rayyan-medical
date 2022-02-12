@extends('dashboard.layouts.main')

@section('container')

<div class="container-fluid bg-light" style="border-radius: 10px">

    <form class="col-md-8 mt-4 p-2" action="/dashboard/DataBarang" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
            <label for="nama_barang" class="form-label @error('nama_barang') is-invalid @enderror">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Nama barang.." required value="{{ old('nama_barang') }}">
            @error('nama_barang')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kode_barang" class="form-label @error('kode_barang') is-invalid @enderror">kode Barang</label>
            <input type="text" name="kode_barang" id="kode_barang" class="form-control" disabled placeholder="kode barang.." required value="{{ $nomor }}">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label ">Gambar Barang</label>
            <img class="img-preview img-fluid mb-3 col-sm-3">
            <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label @error('stok') is-invalid @enderror">Stok Barang</label>
            <input type="text" name="stok" id="stok" class="form-control" placeholder="Stok barang.." required value="{{ old('stok') }}">
            @error('stok')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label @error('harga') is-invalid @enderror">Harga Barang</label>
            <input type="text" name="harga" id="harga" class="form-control" placeholder="Harga barang.." required value="{{ old('harga') }}">
            @error('harga')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button class="btn btn-primary mb-3" type="submit" onclick="return confirm('Are you sure?')">Tambah Data</button> 
        <a href="/dashboard/DataBarang" class="btn btn-success mb-3">Kembali</a>
    
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