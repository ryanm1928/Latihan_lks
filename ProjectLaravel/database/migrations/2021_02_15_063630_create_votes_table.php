<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('choice_id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('poll_id')->unsigned();
            $table->bigInteger('division_id')->unsigned();
            $table->timestamps();
       
            $table->foreign("choice_id")->references('id')->on("choices");
            $table->foreign("user_id")->references('id')->on("users");
            $table->foreign("poll_id")->references('id')->on("polls");
            $table->foreign("division_id")->references("id")->on("divisions");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
