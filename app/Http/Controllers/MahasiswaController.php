<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.mahasiswa.index', [
            'title' => 'Mahasiswa',
            'mahasiswa' => Mahasiswa::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.mahasiswa.create', [
            'title' => 'Tambah Mahasiswa',

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMahasiswaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama' => 'required',
                'jurusan' => 'required',
                'angkatan' => 'required|Integer',
                'NIM' => 'required',
                'last_update_by' => 'required',
            ]);

            Mahasiswa::create($validatedData);

            return redirect('/dashboard/mahasiswa')->with('success', "Data mahasiswa telah ditambah!");
        } catch (\Throwable $th) {
            //throw $th;
            return redirect('/dashboard/mahasiswa')->with('failed', 'Terdapat Error!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('dashboard.mahasiswa.show', [
            'title' => "Detail",
            'mahasiswa' => $mahasiswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('dashboard.mahasiswa.edit', [
            'title' => 'Tambah Mahasiswa',
            'mahasiswa' => $mahasiswa

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMahasiswaRequest  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        try {

            $validatedData = $request->validate([
                'nama' => 'required',
                'jurusan' => 'required',
                'angkatan' => 'required|Integer',
                'NIM' => 'required',
                'last_update_by' => 'required',
            ]);

            Mahasiswa::where('id', $mahasiswa->id)
                ->update($validatedData);

            return redirect('/dashboard/mahasiswa')->with('success', "Data mahasiswa telah diupdate!");
        } catch (\Throwable $th) {
            //throw $th;
            return redirect('/dashboard/mahasiswa')->with('failed', 'Terdapat Error!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        try {

            Mahasiswa::destroy($mahasiswa->id);

            return redirect('/dashboard/mahasiswa')->with('success', "Data mahasiswa telah dihapus!");
        } catch (\Throwable $th) {
            //throw $th;
            return redirect('/dashboard/mahasiswa')->with('failed', 'Terdapat Error!');
        }
    }
}
