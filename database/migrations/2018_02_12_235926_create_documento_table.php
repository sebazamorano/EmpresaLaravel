<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero')->unsigned();
            $table->integer('tipo_documento_id')->unsigned();
            $table->integer('proveedor_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('forma_pago');
            $table->integer('neto')->unsigned();
            $table->float('iva', 8, 2);
            $table->float('total');
            $table->timestamps();

            $table->foreign('tipo_documento_id')
                ->references('id')->on('tipo_documento')->onDelete('cascade');
            $table->foreign('proveedor_id')
                ->references('id')->on('proveedor')->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documento');
    }
}
