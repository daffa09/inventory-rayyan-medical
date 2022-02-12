@extends('dashboard.layouts.main')

@section('container')

<div class="container rounded bg-white mt-5">

        <h2 class="title">Data Distributor</h2>

        @if (session()->has('success'))
        <div class="alert alert-success col-lg-5" id="pesan" role="alert">
        {{ session('success') }}
        </div>
        @endif
        
  <div class="row justify-content-end mb-2 me-5">
    <div class="col-md-5">
        <form action="/dashboard/pesan">
            <div class="input-group mb-1">
                <input type="text" class="form-control" placeholder="Search by name.." name="search" value="{{ request('search') }}">
                <button class="btn btn-danger" type="submit">Search</button>
            </div>    
        </form>
    </div>
  </div>

  @if ($distributors->count())
        
        <a href="/dashboard/pesan/create" class="btn btn-primary mb-3"><span data-feather="plus"></span> Tambah</a>

      <div class="table-responsive fs-6">
        <table class="table table-striped table-sm table-bordered" style="text-align:center">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Vendor</th>
              <th scope="col">No Telp</th>
              <th scope="col">Aksi</th>
              <th scope="col">Pesan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($distributors as $distributor)
                
            <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $distributor->name }}</td>
            <td>{{ $distributor->vendor }}</td>
            <td>{{ $distributor->no_telp }}</td>
            <td>
              <a href="{{ url('/dashboard/pesan/'.$distributor->id.'/edit')  }}" class="btn btn-warning text-decoration-none text-white"><span data-feather="edit"></span></a>
              <form action="{{ url('/dashboard/pesan/'.$distributor->id)  }}"
                method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-octagon"></button>
              </form>
            </td>
            <td>
                <a href="https://api.whatsapp.com/send?phone={{ $distributor->no_telp }}&text=Halo%20mau%20order%20gan" class="btn btn-success" target="_blank">Mulai Chat<span data-feather="arrow-right"></span></a>
            </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="d-flex justify-content-end mb-5">
          {{  $distributors->links() }}
        </div>
      </div>
    </div>

  @else
    <p class="text-center fs-4 mt-5 pb-5">Distributor Tidak Ditemukan</p>
  @endif


</div>

@endsection