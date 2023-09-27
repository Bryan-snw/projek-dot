@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Admin</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @elseif (session()->has('failed'))
        <div class="alert alert-danger col-lg-8" role="alert">
            {{ session('failed') }}
        </div>
    @endif

    <div class="table-responsive col-lg-9">
        <a class="btn btn-primary mb-3" href="/dashboard/admin/create">Tambah Data Admin</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $dt)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dt->name }}</td>
                        <td>{{ $dt->email }}</td>

                        <td>

                            {{-- Hrefnya merupakaan autran default menambahkan '/edit' di akhiir --}}
                            <a href="/dashboard/admin/{{ $dt->id }}/edit" class="text-white badge bg-warning">
                                Edit
                            </a>
                            <form action="/dashboard/admin/{{ $dt->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="text-white badge bg-danger border-0"
                                    onclick="return confirm('Are you sure?');"><span
                                        data-feather="x-circle"></span>Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
