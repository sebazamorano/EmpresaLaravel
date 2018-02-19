<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_documento', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('documento_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->integer('cantidad')->unsigned();
            $table->float('precio');
            $table->timestamps();

            $table->foreign('documento_id')->references('id')->on('documento')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('producto')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_documento');
    }
}
