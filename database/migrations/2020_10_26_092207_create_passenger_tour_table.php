<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassengerTourTable extends Migration
{
    public function up()
    {
        Schema::create('passenger_tour', function (Blueprint $table) {
            $table->id();

            $table->foreignId('passenger_id')
                ->references('id')
                ->on('passengers');

            $table->foreignId('tour_id')
                ->references('id')
                ->on('tours')
                ->cascadeOnDelete();

            $table->unique(['passenger_id', 'tour_id']);
            $table->integer('count');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('passenger_tour');
    }
}
