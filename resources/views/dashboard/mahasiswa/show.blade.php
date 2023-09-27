@extends('dashboard.layouts.main')
@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h2>Data Mahasiswa</h2>


                <div class="card text-white bg-info my-2 p-2 rounded">
                    <div class="card-header">
                        <h3>{{ $mahasiswa->nama }}</h3>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-3">NIM: {{ $mahasiswa->NIM }}</h6>
                        <h6 class="mb-3">Angkatan: {{ $mahasiswa->angkatan }}</h6>
                        <h6 class="mb-3">Jurusan: {{ $mahasiswa->jurusan }}</h6>
                        <h6 class="mb-3">Input Oleh: {{ $mahasiswa->lastUpdateBy->name }}</h6>
                    </div>
                </div>

                <a href="/dashboard/mahasiswa" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali</a>
                <a href="/dashboard/mahasiswa/{{ $mahasiswa->id }}/edit" class="btn btn-warning"><span
                        data-feather="edit"></span>
                    Edit</a>

                <form action="/dashboard/mahasiswa/{{ $mahasiswa->id }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="text-white btn btn-danger" onclick="return confirm('Are you sure?');"><span
                            data-feather="x-circle"></span> Delete</button>
                </form>

            </div>
        </div>
    </div>
@endsection
