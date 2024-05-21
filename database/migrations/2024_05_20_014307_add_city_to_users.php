<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //$table->unsignedBigInteger('city_id')->nullable();
            //$table->foreign('city_id')->references('id')->on('city');
            $table->unsignedBigInteger('district_id')->nullable();
            $table->foreign('district_id')->references('id')->on('districts');
            //$table->dropUnique(['email']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //$table->dropForeign(['city_id']);
            $table->dropForeign(['district_id']);
            //$table->dropColumn('city_id');
            $table->dropColumn('district_id');
            //$table->unique(['email']);
        });
    }
};
