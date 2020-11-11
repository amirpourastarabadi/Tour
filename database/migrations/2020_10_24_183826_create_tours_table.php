<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();

            $table->foreignId('hotel_id')
                ->references('id')
                ->on('hotels')
                ->cascadeOnDelete();

            $table->foreignId('tour_admin_id')
                ->references('user_id')
                ->on('tour_admins')
                ->cascadeOnDelete();

            $table->string('origin', 100);
            $table->string('destination', 100);
            $table->date('start_at');
            $table->smallInteger('duration');
            $table->mediumInteger('price');
            $table->smallInteger('total_num');
            $table->smallInteger('filled_num')->default(0)->comment('must be <= total_num');
            $table->boolean('personal_certificates');
            $table->boolean('marriage_certificates');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tours');
    }
}
