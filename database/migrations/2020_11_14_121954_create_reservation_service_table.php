<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationServiceTable extends Migration
{

    public function up()
    {
        Schema::create('reservation_service', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservation_id')
                ->references('id')
                ->on('passenger_tour')
                ->cascadeOnDelete();

            $table->foreignId('tour_services_id')
                ->references('id')
                ->on('tour_services')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservation_service');
    }
}
