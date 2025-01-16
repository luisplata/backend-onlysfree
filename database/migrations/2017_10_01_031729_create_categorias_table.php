<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string("nombre");
            $table->text("descripcion");
            $table->integer("padre");
        });
        Schema::create('categorias_post', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string("nombre");
            $table->text("descripcion");
            $table->integer("padre");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
        Schema::dropIfExists('categorias_post');
    }
}
