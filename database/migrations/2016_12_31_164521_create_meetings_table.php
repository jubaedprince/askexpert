<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('requestor_name');
            $table->string('requestor_phone_number');
            $table->string('preferable_date');
            $table->string('preferable_time');
            $table->string('estimated_duration');
            $table->text('discussion_topics');
            $table->integer('expert_id')->unsigned();
            $table->foreign('expert_id')->references('id')->on('experts')->onDelete('cascade');
            $table->string('status');
            $table->text('note');
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
        Schema::dropIfExists('meetings');
    }
}
