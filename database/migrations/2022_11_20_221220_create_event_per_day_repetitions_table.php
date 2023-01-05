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
        Schema::create('event_per_day_repetitions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_per_day_id');
            $table->unsignedBigInteger('repetition_id');
            $table->foreign('event_per_day_id')->references('id')->on('event_per_days')->onDelete('cascade');;
            $table->foreign('repetition_id')->references('id')->on('repetitions')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_per_day_repetitions');
    }
};
