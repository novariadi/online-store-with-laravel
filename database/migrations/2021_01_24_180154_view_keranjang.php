<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ViewKeranjang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::statement("CREATE
        /*[ALGORITHM = {UNDEFINED | MERGE | TEMPTABLE}]
        [DEFINER = { user | CURRENT_USER }]
        [SQL SECURITY { DEFINER | INVOKER }]*/
        VIEW `onlinestore`.`keranjang`
        AS
        (SELECT
        `tbl_keranjang`.`id_keranjang` AS `id_keranjang`,
        `tbl_user`.`nama_user`             AS `nama_user`,
        `tbl_barang`.`nama_produk`         AS `nama_produk`,
        `tbl_barang`.`harga`               AS `harga`,
        `tbl_barang`.`gambar`              AS `gambar`,
        `tbl_keranjang`.`jumlah`           AS `jumlah`
        FROM ((`tbl_keranjang`
                JOIN `tbl_barang`
                ON ((`tbl_keranjang`.`id_barang` = `tbl_barang`.`id`)))
        JOIN `tbl_user`
                ON ((`tbl_keranjang`.`id_user` = `tbl_user`.`id`))))");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
