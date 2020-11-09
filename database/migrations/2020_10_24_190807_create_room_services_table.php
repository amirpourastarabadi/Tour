<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomServicesTable extends Migration
{
    public function up()
    {
        Schema::create('room_services', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tour_id')
                ->references('id')
                ->on('tours')
                ->cascadeOnDelete();


            $table->smallInteger('beds');
            $table->string('room_type', 100);
            $table->text('room_service');
            $table->mediumInteger('room_service_price');
        });
    }

    public function down()
    {
        Schema::dropIfExists('room_services');
    }
}
