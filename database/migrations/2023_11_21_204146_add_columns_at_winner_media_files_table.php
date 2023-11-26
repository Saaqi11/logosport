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
        Schema::table('winner_media_files', function (Blueprint $table) {
            $table->unsignedBigInteger('no_of_request')->after('score')->default(0);
            $table->json('change_request')->after('no_of_request')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('winner_media_files', function (Blueprint $table) {
            $table->dropColumn('no_of_request');
            $table->dropColumn('change_request');
        });
    }
};
