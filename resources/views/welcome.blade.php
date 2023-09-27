@extends('layouts.main')

@section('container')
    <h1>Selamat Datang</h1>

    <p>Jumlah data mahasiswa yang tercatat saat ini, berjumlah {{ $mahasiswa->count() }} mahasiswa</p>
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
