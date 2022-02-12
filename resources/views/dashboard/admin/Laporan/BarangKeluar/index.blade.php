@extends('dashboard.layouts.main')

@section('container') 

<div class="container rounded bg-white mt-5">

        <h2 class="title">Cetak Laporan Barang keluar</h2>

        <a href="/dashboard/Laporan/barangKeluar/cetak" class="btn btn-danger mb-3 mt-3" onclick="return confirm('Are you sure?')"><span data-feather="printer" target="_blank"></span> Cetak Laporan</a>
        
@if ($items->count())

        <div class="table-responsive fs-6">
                <table class="table table-striped table-sm table-bordered" style="text-align:center">
                <thead>
                <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Qty Barang</th>
                        <th scope="col">Nama Karyawan</th>
                        <th scope="col">Tgl_Keluar</th>
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
                </tr>
                @endforeach
                </tbody>
                </table>
                <div class="d-flex justify-content-end mb-5">
                        {{  $items->links() }}
                </div>
        </div>
</div>

@else
        <p class="text-center fs-4 mt-5 mb-5 pb-5">Data Tidak Ditemukan</p>
@endif

@endsection