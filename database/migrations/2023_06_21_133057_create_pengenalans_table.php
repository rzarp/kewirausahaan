<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengenalansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengenalans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger("provinsi")->nullable();
            $table->unsignedBigInteger("kabupaten")->nullable();
            $table->unsignedBigInteger("kecamatan")->nullable();
            $table->unsignedBigInteger("kelurahan")->nullable();
            $table->string('sls');
            $table->string('no_urut_usaha');
            $table->string('nama_usaha');
            $table->string('alamat_usaha');
            $table->string('no_telp');
            $table->string('no_hp');
            $table->string('email');
            $table->date('tahun');
            $table->char('created_by')->nullable();
            $table->char('updated_by')->nullable();
            $table->char('deleted_by')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengenalans');
    }
}
