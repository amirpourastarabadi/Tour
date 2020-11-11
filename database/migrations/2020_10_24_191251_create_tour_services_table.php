<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourServicesTable extends Migration
{
    public function up()
    {
        Schema::create('tour_services', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tour_id')
                ->references('id')
                ->on('tours')
                ->cascadeOnDelete();


            $table->string('service', 100);
            $table->mediumInteger('tour_service_price');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tour_services');
    }
}
