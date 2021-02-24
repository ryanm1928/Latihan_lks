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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('poll_id');
            $table->unsignedBigInteger('division_id');
            
            $table->timestamps();

            $table->foreign("choice_id")->references("choices")->on("id");
            $table->foreign("user_id")->references("users")->on("id");
            $table->foreign("poll_id")->references("polls")->on("id");
            $table->foreign("division_id")->references("divisions")->on("id");
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
