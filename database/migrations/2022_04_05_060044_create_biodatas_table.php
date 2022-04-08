<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodatas', function (Blueprint $table) {
            $table->id();
            $table->string('sosmed1');
            $table->string('sosmed2');
            $table->string('sosmed3');
            $table->string('total_projek');
            $table->string('alamat');
            $table->string('pekerjaan');
            $table->string('link_sosmed1');
            $table->string('link_sosmed2');
            $table->string('link_sosmed3');
            $table->string('deskripsi_profil');
            $table->string('foto_profil');
         
            $table->timestamps();
        });

        DB::table('biodatas')->insert([
            'id'=>1,
            'sosmed1'=>'anam-ig',
            'sosmed2'=>'anam-linkedin',
            'sosmed3'=>'anam-github',
            'link_sosmed1'=>'https://www.instagram.com/anamoeoe/',
            'link_sosmed2'=>'https://www.linkedin.com/in/k-anam-4b473b1a6/',
            'link_sosmed3'=>'https://github.com/anamoe',
            'total_projek'=>'20',
            'deskripsi_profil'=>'saya seorang web developer dan android developer saya seorang web developer dan android developer saya seorang web developer dan android developer',
            'foto_profil'=>'fotoku.jpg',
            'alamat'=>'banyuwangi',
            'pekerjaan'=>'Developer'


        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biodatas');
    }
}
