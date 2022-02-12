@extends('layouts.main')

@section('container')
    
  <section>
		<div class="box">
			<div class="boxContainer ">
				<div class="form">
                
                
                @if (session()->has('success'))                
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session()->has('loginError'))                
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <h2>Please Login!</h2>
                <form action="/login" method="POST">
                    @csrf
                    <div class="inputBox">
                        <label for="email">Email address</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required autofocus value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class=" inputBox">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                    </div>
                    <div class=" inputBox">
                        <button type="submit">Login</button>
                    </div>
                </form>
            </div>
	    </div>
    </div>
</section>




@endsection