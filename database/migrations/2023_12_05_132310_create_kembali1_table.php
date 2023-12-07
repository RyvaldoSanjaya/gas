<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKembali1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kembali1', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('tgl_kembali');

            $table->unsignedBigInteger('gas_id');
            $table->foreign('gas_id')->references('id')->on('gastank');

            $table->integer('qty');
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
        Schema::dropIfExists('kembali1');
    }
}
