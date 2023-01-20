<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partcrs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_batch');
            $table->string('name');
            $table->string('ttl');
            $table->integer('nik');
            $table->string('pddk');
            $table->integer('id_itn');
            $table->string('itn_addr');
            $table->integer('notel');
            $table->string('email');
            $table->string('size');
            $table->string('addr');
            $table->string('ktp');
            $table->string('ijazah');
            $table->string('skb');
            $table->string('foto4x6');
            $table->string('foto2x3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partcrs');
    }
};
