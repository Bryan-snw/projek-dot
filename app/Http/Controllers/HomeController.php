<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'title' => 'Home',
            'active' => 'home',
            'mahasiswa' => Mahasiswa::filter(request('search'))->get()
        ]);
    }
}
