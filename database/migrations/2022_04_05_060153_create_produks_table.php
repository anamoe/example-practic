<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('item_code');
            $table->string('item_name');
            $table->string('price');
            $table->string('stock');
            $table->string('foto_produk');
            $table->timestamps();
        });

        DB::table('produks')->insert([
            'id'=>'1',
            'item_code'=>'4WFSFSF',
            'item_name'=>'aplikasi wisata',
            'price'=>'300000',
            'stock'=>'0',
            'foto_produk'=>'foto2.png'
        ]);

        DB::table('produks')->insert([
            'id'=>'2',
            'item_code'=>'4WFSFSF',
            'item_name'=>'aplikasi perikanan',
            'price'=>'200000',
            'stock'=>'0',
            'foto_produk'=>'foto2.png'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
}
