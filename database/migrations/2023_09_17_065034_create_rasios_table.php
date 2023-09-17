<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRasiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rasios', function (Blueprint $table) {
            $table->id();
            $table->text('nama_rasio');
            $table->char('id_sumber');
            $table->text('sumber')->nullable();
            $table->char('id_formula');
            $table->text('upper');
            $table->text('lower');
            $table->text('rasio');
            $table->date('cut_off_data');
            $table->char('created_by')->nullable();
            $table->char('updated_by')->nullable();
            $table->char('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_sumber')
            ->references('id')
            ->on('sumbers')
            ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('id_formula')
            ->references('id')
            ->on('formulas')
            ->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rasios');
    }
}
