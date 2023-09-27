@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Post</h1>
    </div>
    <div class="col-lg-8">
        <form action="/dashboard/mahasiswa/{{ $mahasiswa->id }}" method="POST" class="mb-5">
            @method('put')
            @csrf

            <div class="form-group">
                <input hidden value="{{ old('last_update_by', auth()->user()->id) }}" required type="text"
                    class="form-control @error('last_update_by') is-invalid @enderror" id="last_update_by"
                    name="last_update_by">
                @error('last_update_by')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nama">Nama mahasiswa</label>
                <input value="{{ old('nama', $mahasiswa->nama) }}" required autofocus type="text"
                    class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="NIM">NIM</label>
                <input value="{{ old('NIM', $mahasiswa->NIM) }}" required type="text"
                    class="form-control @error('NIM') is-invalid @enderror" id="NIM" name="NIM">
                @error('NIM')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="angkatan">Angkatan</label>
                <input value="{{ old('angkatan', $mahasiswa->angkatan) }}" required type="text"
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
                    <option selected value={{ $mahasiswa->jurusan }}>{{ $mahasiswa->jurusan }}</option>
                    @if ($mahasiswa->jurusan === 'IPA')
                        <option value="IPS">IPS</option>
                    @else
                        <option value="IPA">IPA</option>
                    @endif
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
    </div>
@endsection
