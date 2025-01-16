<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string("nombre");
            $table->text("descripcion");
            $table->string("imagen");
            $table->string("url");
            $table->integer("categorias_id")->unsigned();
            $table->foreign('categorias_id')->references('id')->on('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('productos');
    }

}
