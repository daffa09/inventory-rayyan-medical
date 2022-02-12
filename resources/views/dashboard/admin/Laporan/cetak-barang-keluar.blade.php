<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Barang</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
</style>

<body>
    <h2 class="mt-3 mb-4">{{ $active }}</h2>

    <p>Nama    : {{ auth()->user()->nama }}</p>
    <p>Tanggal : {{ now()->format('Y-m-d') }}</p>
    <br>

        <div class="table-responsive fs-6">
        <table class="table table-bordered" style="text-align:center">
        <thead>
        <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Barang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Qty Barang</th>
                <th scope="col">Nama Karyawan</th>
                <th scope="col">Tanggal Keluar</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($items as $item)
                
        <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->jenisBarang->kode_barang }}</td>
                <td>{{ $item->jenisBarang->nama_barang }}</td>
                <td>{{ $item->qty }}</td>
                <td>{{ $item->user->nama }}</td>
                <td>{{ $item->tgl_keluar }}</td>
        @endforeach
        </tr>
        </tbody>
        </table>
    </div>
</body>
</html>