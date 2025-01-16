<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensajesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string("titulo");
            $table->text("contenido");
            $table->string("email");
            $table->tinyInteger("leido")->default("0");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('mensajes');
    }

}
