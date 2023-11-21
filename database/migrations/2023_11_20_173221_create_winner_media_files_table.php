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
        Schema::create('winner_media_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("work_id");
            $table->unsignedMediumInteger("score")->default(0);
            $table->json('media')->nullable();
            $table->foreign('work_id')->references('id')->on('works')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('winner_media_files');
    }
};
