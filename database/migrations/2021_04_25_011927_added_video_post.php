<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddedVideoPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('productos', function (Blueprint $table) {
            $table->char('isVideo',1)->default('0');
            $table->string("url_video")->nullable();
            $table->string("imagen")->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('productos', function (Blueprint $table) {
            $table->dropColumn(['isVideo', 'url_video']);
        });
    }
}
