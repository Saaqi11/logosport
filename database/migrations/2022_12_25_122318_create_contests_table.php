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
        Schema::create('contests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->string("business_level");
            $table->string('slug')->unique();
            $table->string("contest_price");
            $table->string("company_name")->nullable();
            $table->string("industry_type")->nullable();
            $table->string("slogan")->nullable();
            $table->string("start_date")->nullable();
            $table->string("logo_type_likes")->nullable();
            $table->string("logo_type_unlikes")->nullable();
            $table->string("website")->nullable();
            $table->string("company_about")->nullable();
            $table->string("company_advantages")->nullable();
            $table->string("company_employees_range")->nullable();
            $table->string("company_features")->nullable();
            $table->string("contest_format")->nullable();
            $table->string("duration")->nullable();
            $table->string("score")->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contests');
    }
};
