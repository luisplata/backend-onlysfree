<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddindTagsInAllPostAndStream extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('streams', function (Blueprint $table) {
            $table->string("tags")->default("onlyfans");
        });
        Schema::table('productos', function (Blueprint $table) {
            $table->string("tags")->default("onlyfans");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('streams', function (Blueprint $table) {
            //
            $table->dropColumn("tags");
        });
        Schema::table('productos', function (Blueprint $table) {
            //
            $table->dropColumn("tags");
        });
    }
}
