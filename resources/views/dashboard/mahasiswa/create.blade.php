@extends('dashboard.layouts.main')
@section('container')
    <form method="POST" action="/dashboard/mahasiswa">
        @csrf

        <div class="form-group">
            <input hidden value="{{ old('last_update_by', auth()->user()->id) }}" required type="text"
                class="form-control @error('last_update_by') is-invalid @enderror" id="last_update_by" name="last_update_by">
            @error('last_update_by')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <div class="form-group">
            <label for="nama">Nama Mahasiswa</label>
            <input value="{{ old('nama') }}" required autofocus type="text"
                class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama">
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="NIM">NIM</label>
            <input value="{{ old('NIM') }}" required type="text"
                class="form-control @error('NIM') is-invalid @enderror" id="NIM" name="NIM">
            @error('NIM')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="angkatan">Angkatan</label>
            <input value="{{ old('angkatan') }}" required type="text"
                class="form-control @error('angkatan') is-invalid @enderror" id="angkatan" name="angkatan">
            @error('angkatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="jurusan">jurusan</label>
            <select class="form-control" id="jurusan" name="jurusan">
                <option value="IPA">IPA</option>
                <option value="IPS">IPS</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
@endsection
