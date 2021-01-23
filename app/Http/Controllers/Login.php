<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

    public function Masuk(Request $request)
    {
        $user = DB::table('tbl_user')->where('email', $request->email)->first();
        if ($user->password == $request->password) {
            Session::put('id_user', $user->id);
            echo 'Data disimpan dengan sesion id = ' . $request->session()->get('id');
            return redirect('/');
        } else {
            echo "Anda gagal login";
        }
    }

    public function Keluar()
    {
        Session::forget('id_user');
        return redirect('/');
    }
}
