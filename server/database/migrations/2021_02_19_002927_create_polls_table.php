<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polls', function (Blueprint $table) {
            $table->id();
            $table->string("title", 191);
            $table->text("description");
            $table->dateTime("deadline");
            $table->unsignedBigInteger("created_by");
            $table->unsignedBigInteger('division_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign("created_by")->references("users")->on("id");
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
        Schema::dropIfExists('polls');
    }
}
