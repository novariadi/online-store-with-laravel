<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class Order extends Controller
{
    public function Order(Request $request)
    {
        DB::table('tbl_keranjang')->insert([
            'id_user' => Session::get('id_user'),
            'id_barang' => $request->id_barang,
            'jumlah' => $request->jumlah
        ]);
        return redirect('/');
    }

    public function Keranjang()
    {
        $Keranjang = DB::table('keranjang')->get();
        return view('Keranjang', ['keranjang' => $Keranjang]);
    }
}
