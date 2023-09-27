@extends('layouts.main')

@section('container')
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" value="{{ request('search') }}" placeholder="Search..."
                        name="search">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="table-responsive col-lg-8">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Angkatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $dt)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dt->nama }}</td>
                        <td>{{ $dt->jurusan }}</td>
                        <td>{{ $dt->angkatan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
