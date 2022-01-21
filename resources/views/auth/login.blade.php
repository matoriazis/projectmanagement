@extends('layouts.app')

@section('content')
    <div class="card2 card border-0 px-4 py-5">
        <div style="align-self: center">
            <img style="width: 200px" src="https://i.ibb.co/GT90Bq1/undraw-Metrics-re-6g90.png" alt="">
        </div>
        <h2>PROJECT MANAGEMENT</h2>
        <p style="text-align: center;">Silahkan Masuk</p>
        <h2 style="margin-bottom: 20px;"></h2>
        <form method="POST" action="{{ route('login') }}"> @csrf
            <div class="row px-3">
                <label>Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row px-3">
                <label for="Kata Sandi">Kata Sandi</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button style="width: 100%; border-radius: 25px;" type="submit" class="btn btn-primary mt-2">
                {{ __('Login') }}
            </button>
        </form>
    </div>
@endsection
