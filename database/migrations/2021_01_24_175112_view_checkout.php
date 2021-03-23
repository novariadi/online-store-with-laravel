<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ViewCheckout extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::statement(
            "CREATE
                /*[ALGORITHM = {UNDEFINED | MERGE | TEMPTABLE}]
                [DEFINER = { user | CURRENT_USER }]
                [SQL SECURITY { DEFINER | INVOKER }]*/
                VIEW `onlinestore`.`checkout`
                AS
            (SELECT
            `tbl_checkout`.`id_checkout` AS `id_checkout`,
            `tbl_barang`.`nama_produk`   AS `nama_produk`,
            `tbl_barang`.`harga`             AS `harga`,
            `tbl_barang`.`gambar`            AS `gambar`,
            `detail_checkout`.`jumlah`   AS `jumlah`,
            `tbl_user`.`nama_user`           AS `nama_user`,
            `tbl_checkout`.`id_user`         AS `id_user`
            FROM (((`detail_checkout`
                JOIN `tbl_checkout`
                    ON ((`detail_checkout`.`id_checkout` = `tbl_checkout`.`id_checkout`)))
                JOIN `tbl_user`
                    ON ((`tbl_checkout`.`id_user` = `tbl_user`.`id`)))
            JOIN `tbl_barang`
             ON ((`detail_checkout`.`id_barang` = `tbl_barang`.`id`))))"
        );
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
