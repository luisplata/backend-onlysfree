<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("visita")->default(0);
            $table->integer("idoAlPack")->default(0);
            $table->timestamps();
            $table->integer('producto_id')->unsigned();
            $table->foreign('producto_id')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visit_posts');
    }
}
