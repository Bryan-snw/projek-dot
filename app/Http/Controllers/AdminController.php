<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.index', [
            'title' => 'Admin',
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.create', [
            'title' => 'Tambah Admin',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/dashboard/admin')->with('success', 'New User Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, $id)
    {
        $user = User::where('id', $id)->get();



        return view('dashboard.admin.edit', [
            'title' => 'Edit Admin',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        try {
            $user = User::where('id', $request->id)->get();
            $passwordLama = $request->password_lama;

            if (Hash::check($passwordLama, $user[0]->password)) {

                $rules = [
                    'name' => 'required|max:255',
                    'password' => 'required|min:8|max:255'
                ];

                if ($request->email != $user[0]->email) {
                    $rules['email'] = 'required|email:dns|unique:users';
                }

                $validatedData = $request->validate($rules);

                $validatedData['password'] = Hash::make($validatedData['password']);

                User::where('id', $request->id)->update($validatedData);

                return redirect('/dashboard/admin')->with('success', 'New User Created!');
            }

            return redirect('/dashboard/admin')->with('failed', 'Credential Wrong!');
        } catch (\Throwable $th) {
            return redirect('/dashboard/admin')->with('failed', 'Terdapat Error!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
    {
        try {
            //code...
            User::destroy($id);
            return redirect('/dashboard/admin')->with('success', "Data admin telah dihapus!");
        } catch (\Throwable $th) {
            //throw $th;
            return redirect('/dashboard/admin')->with('failed', "Terdapat Error!");
        }
    }
}
