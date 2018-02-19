<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('producto_categoria', function (Blueprint $table) {
            $table->integer('producto_id')->unsigned();
            $table->integer('categoria_id')->unsigned();

            $table->foreign('producto_id')
                ->references('id')->on('producto')->onDelete('cascade');
            $table->foreign('categoria_id')
                ->references('id')->on('categoria')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoria');
        Schema::dropIfExists('producto_categoria');
    }
}
