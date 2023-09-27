@extends('dashboard.layouts.main')
@section('container')
    <form method="POST" action="/dashboard/admin">
        @csrf

        <div class="form-group">
            <label for="name">Nama</label>
            <input value="{{ old('name') }}" required autofocus type="text"
                class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input value="{{ old('email') }}" required autofocus type="email"
                class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input value="{{ old('password') }}" required autofocus type="password"
                class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                placeholder="Password">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>



        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
@endsection
