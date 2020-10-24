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
            $table->timestamp('departure_time');
            $table->timestamp('arrival_time');
            $table->string('origin_address', 100);
            $table->string('destination_address', 100);

            #TODO discuss about this
            $table->string('ticket_code', 50)->unique();

            $table->text('conditions')->nullable();
            $table->smallInteger('percentage_reduction')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('transportation_services');
    }
}
