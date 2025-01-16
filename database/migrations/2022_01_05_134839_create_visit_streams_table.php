<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitStreamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_streams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("visita")->default(0);
            $table->timestamps();
            $table->unsignedBigInteger('stream_id');
            $table->foreign('stream_id')->references('id')->on('streams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visit_streams');
    }
}
