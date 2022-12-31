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
        Schema::create('user_default_logos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("contest_id");
            $table->unsignedBigInteger("default_logo_id");
            $table->unsignedBigInteger("user_id");
            $table->timestamps();

            $table->foreign('contest_id')->references('id')->on('contests')->onUpdate('no action')->onDelete('no action');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('no action')->onDelete('no action');
            $table->foreign('default_logo_id')->references('id')->on('default_logos')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_default_logos');
    }
};
