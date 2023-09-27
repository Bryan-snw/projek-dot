@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Post</h1>
    </div>
    <div class="col-lg-8">

        <form method="POST" action="/dashboard/admin/{{ $user[0]->id }}">
            @method('put')
            @csrf

            <div class="form-group">
                <input hidden value="{{ old('id', $user[0]->id) }}" required type="text"
                    class="form-control @error('id') is-invalid @enderror" id="id" name="id">
                @error('id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">Nama</label>
                <input value="{{ old('name', $user[0]->name) }}" required autofocus type="text"
                    class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    placeholder="Name">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input value="{{ old('email', $user[0]->email) }}" required autofocus type="email"
                    class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    placeholder="Email">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_lama">Password lama</label>
                <input value="{{ old('password_lama') }}" required autofocus type="password"
                    class="form-control @error('password_lama') is-invalid @enderror" id="password_lama"
                    name="password_lama" placeholder="Password Lama">
                @error('password_lama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password Baru</label>
                <input value="{{ old('password') }}" required autofocus type="password"
                    class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                    placeholder="Password Baru">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>



            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
@endsection
