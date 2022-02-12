@extends('dashboard.layouts.main')

@section('container')



<div class="container rounded bg-white mt-5">
    
    @if (session()->has('success'))
    <div class="alert alert-success col-md-5" id="pesan" role="alert">
    {{ session('success') }}
    </div>
    @endif
    
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="{{ asset('storage/' . $users[0]->image) }}"><span class="font-weight-bold">{{ $users[0]->nama }}</span><span class="text-black-50">{{ $users[0]->email }}</span><span> </span></div>
        </div>
        
        
        

        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile User</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Nama</label><input type="text" class="form-control" placeholder="Name.." value="{{ $users[0]->nama }}" disabled></div>
                    <div class="col-md-6"><label class="labels">Username</label><input type="text" class="form-control" value="{{ $users[0]->username }}" placeholder="Username.." disabled></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12 mb-3"><label class="labels">Email</label><input type="email" class="form-control" placeholder="Email..." value="{{ $users[0]->email }}" disabled></div>
                    <div class="col-md-12 mb-3"><label class="labels">Alamat</label><input type="text" class="form-control" placeholder="Alamat..." value="{{ $users[0]->alamat }}" disabled></div>
                    <div class="col-md-12 mb-3"><label class="labels">No Telp</label><input type="text" class="form-control" placeholder="No Telp..." value="{{ $users[0]->no_telp }}" disabled></div>
                </div>

                <div class="mt-3 text-center"><a class="btn btn-primary profile-button" href="{{ url('/dashboard/profile/'.$users[0]->id.'/edit')  }}" type="submit">Edit Profile</a></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection