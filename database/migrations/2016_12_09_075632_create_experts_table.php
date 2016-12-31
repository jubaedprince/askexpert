<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('mobile');
            $table->boolean('is_active')->default(false);
            $table->string('status')->default('pending'); //pending, approved, declined
            $table->string('slug');
            $table->integer('number_of_complete_calls')->unsigned()->default(0);
            $table->string('profile_picture_url');
            $table->integer('cost_per_minute');
            $table->text('bio');
            $table->string('youtube_video_url')->nullable();
            $table->string('current_occupation');
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
        Schema::dropIfExists('experts');
    }
}
