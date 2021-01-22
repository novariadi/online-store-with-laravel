<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Login extends Controller
{
    public function index()
    {
        return view('Login');
    }

    public function register(Request $request)
    {
        // insert data ke tbl_user database
        DB::table('tbl_user')->insert([
            'nama_user' => $request->nama,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return redirect('/Login');
    }
}
