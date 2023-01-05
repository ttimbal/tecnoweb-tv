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
        Schema::create('event_turns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('turn_id');
            $table->unsignedBigInteger('event_id');
            $table->foreign('turn_id')->references('id')->on('turns')->onDelete('cascade');;
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_turns');
    }
};
