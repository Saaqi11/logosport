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
        Schema::create('customer_favourite_works', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("work_media_file_id");
            $table->unsignedBigInteger("contest_id");
            $table->tinyInteger("status")->default(0);
            $table->timestamps();

            $table->foreign('contest_id')->references('id')->on('contests')->onUpdate('no action')->onDelete('no action');
            $table->foreign('work_media_file_id')->references('id')->on('work_media_files')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_favourite_works');
    }
};
