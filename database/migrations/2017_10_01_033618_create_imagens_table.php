<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagensTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('imagens', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string("url");
            $table->integer("posts_id")->unsigned();
            $table->foreign('posts_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('imagens');
    }

}
