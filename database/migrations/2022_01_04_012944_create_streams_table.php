<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStreamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('streams', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("nombre")->nullable();
            $table->string("imagen")->nullable();
            $table->integer("estado")->default(0);
            $table->string("url")->nullable();
            $table->timestampTz("publication_date")->default(date("YmdHis"));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('streams');
    }
}
