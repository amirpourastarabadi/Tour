<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportationServicesTable extends Migration
{
    public function up()
    {
        Schema::create('transportation_services', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tour_id')
                ->references('id')
                ->on('tours')
                ->cascadeOnDelete();

            $table->string('vehicle', 20);
            $table->string('transition_type', 15);
            $table->string('company', 100);
            $table->mediumInteger('transition_service_price');
            $table->timestamp('departure_time')->nullable()->default(null);
            $table->timestamp('arrival_time')->nullable()->default(null);
            $table->string('origin_address', 100);
            $table->string('destination_address', 100);
            $table->string('ticket_code', 50)->nullable()->unique();
            $table->string('conditions');
            $table->mediumInteger('percentage_reduction');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transportation_services');
    }
}
