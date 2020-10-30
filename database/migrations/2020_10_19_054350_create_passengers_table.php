<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassengersTable extends Migration
{

    public function up()
    {
        Schema::create('passengers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            $table->string('email', 150)->nullable()->unique();
            $table->string('telephone_number', 20)->nullable()->unique();
            $table->string('national_code', 10)->unique();
            $table->date('birthday')->nullable();
        });
    }


    public function down()
    {
        Schema::dropIfExists('passengers');
    }
}
