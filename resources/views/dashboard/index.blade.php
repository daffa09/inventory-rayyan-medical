@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex flex-wrap align-items-center mb-3 mt-3 justify-content-center bg-light" style="border-radius: 10px !important">
    
    @can('admin')
      
    <a href="/dashboard/pesan" class="text-decoration-none text-white">
    <div class="card text-white bg-danger mt-3" style="max-width: 18rem; width: 1000px">
        <div class="card-header fs-5 text-bold">Pesan Barang</div>
        <div class="card-body d-flex flex-wrap" style="background-color: rgba(155, 12, 12, .8)">
            <span data-feather="shopping-cart" class="card-text fs-1 m-auto text-bold" style="width: 50px; height: 50px;"></span>
    </div>
    </a>
    <a href="/dashboard/pesan" class="card-footer text-center text-white" style="background-color: #4f0000; text-decoration: none;">More Info <i class="ms-2"><span data-feather="arrow-right-circle"></span></i></a>
</div>

<a href="/dashboard/DataBarang" class="text-decoration-none text-white">
<div class="card text-white bg-primary mt-3 ms-5" style="max-width: 18rem; width: 1000px">
        <div class="card-header fs-5 text-bold">Data Barang</div>
        <div class="card-body d-flex flex-wrap" style="background-color: rgba(7, 70, 165, 0.8)">
            <span data-feather="layers" class="card-text fs-1 m-auto text-bold" style="width: 50px; height: 50px;"></span>
    </div>
</a>
    <a href="/dashboard/DataBarang" class="card-footer text-center text-white" style="background-color: #000d53; text-decoration: none;">More Info <i class="ms-2"><span data-feather="arrow-right-circle"></span></i></a>
</div>

<a href="/dashboard/DataKaryawan" class="text-decoration-none text-white">
<div class="card text-white bg-success mt-3 ms-5" style="max-width: 18rem; width: 1000px">
        <div class="card-header fs-5 text-bold">Data Karyawan</div>
        <div class="card-body d-flex flex-wrap" style="background-color: rgba(4, 107, 30, .8)">
            <span data-feather="users" class="card-text fs-1 m-auto text-bold" style="width: 50px; height: 50px;"></span>
    </div>
</a>
    <a href="/dashboard/DataKaryawan" class="card-footer text-center text-white" style="background-color: #043610; text-decoration: none;">More Info <i class="ms-2"><span data-feather="arrow-right-circle"></span></i></a>
</div>

<div style="padding-bottom: 100px">
    <div class="dashboard">
        <h2 style="font-weight: bold">Dashboard Rayyan Medical Inventory</h2>
        <p class="mt-1 fs-5">Sangat dibutuhkan untuk pasien yang harus Bed Rest, sehingga membutuhkan ruang perawatan khusus. Di mana Dokter di Rumah sakit juga menyarankan untuk dirawat di rumah dengan suasana yang sama seperti di rumah sakit. Sebagai solusi akan masalah tersebut, maka kami menawarkan program Home Care (Penyewaan & Penjualan alat-alat kesehatan untuk pasien rawat rumah).</p>
    </div>
</div>

@endcan

@can('karyawan')

    <a href="/dashboard/stokBarang" class="text-decoration-none text-white">
    <div class="card text-white bg-danger mt-3" style="max-width: 18rem; width: 1000px">
        <div class="card-header fs-5 text-bold">Stok Barang</div>
        <div class="card-body d-flex flex-wrap" style="background-color: rgba(155, 12, 12, .8)">
            <span data-feather="grid" class="card-text fs-1 m-auto text-bold" style="width: 50px; height: 50px;"></span>
    </div>
    </a>
    <a href="/dashboard/stokBarang" class="card-footer text-center text-white" style="background-color: #4f0000; text-decoration: none;">More Info <i class="ms-2"><span data-feather="arrow-right-circle"></span></i></a>
</div>

<a href="/dashboard/InputBarang/BarangMasuk" class="text-decoration-none text-white">
<div class="card text-white bg-primary mt-3 ms-5" style="max-width: 18rem; width: 1000px">
        <div class="card-header fs-5 text-bold">Barang Masuk</div>
        <div class="card-body d-flex flex-wrap" style="background-color: rgba(7, 70, 165, 0.8)">
            <span data-feather="inbox" class="card-text fs-1 m-auto text-bold" style="width: 50px; height: 50px;"></span>
    </div>
</a>
    <a href="/dashboard/InputBarang/BarangMasuk" class="card-footer text-center text-white" style="background-color: #000d53; text-decoration: none;">More Info <i class="ms-2"><span data-feather="arrow-right-circle"></span></i></a>
</div>

<a href="/dashboard/InputBarang/BarangKeluar" class="text-decoration-none text-white">
<div class="card text-white bg-success mt-3 ms-5" style="max-width: 18rem; width: 1000px">
        <div class="card-header fs-5 text-bold">Barang Keluar</div>
        <div class="card-body d-flex flex-wrap" style="background-color: rgba(4, 107, 30, .8)">
            <span data-feather="package" class="card-text fs-1 m-auto text-bold" style="width: 50px; height: 50px;"></span>
    </div>
</a>
    <a href="/dashboard/InputBarang/BarangKeluar" class="card-footer text-center text-white" style="background-color: #043610; text-decoration: none;">More Info <i class="ms-2"><span data-feather="arrow-right-circle"></span></i></a>
</div>

<div style="padding-bottom: 100px">
    <div class="dashboard">
        <h2 style="font-weight: bold">Dashboard Rayyan Medical Inventory</h2>
        <p class="mt-1 fs-5">Sangat dibutuhkan untuk pasien yang harus Bed Rest, sehingga membutuhkan ruang perawatan khusus. Di mana Dokter di Rumah sakit juga menyarankan untuk dirawat di rumah dengan suasana yang sama seperti di rumah sakit. Sebagai solusi akan masalah tersebut, maka kami menawarkan program Home Care (Penyewaan & Penjualan alat-alat kesehatan untuk pasien rawat rumah).</p>
    </div>
</div>
@endcan
@endsection