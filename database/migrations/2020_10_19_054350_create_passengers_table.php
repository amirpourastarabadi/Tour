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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('national_code', 10)->unique();
            $table->date('birthday')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('mobile_number', '14')->unique();
            $table->timestamp('mobile_number_verified_at')->nullable();
            $table->string('password');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('passengers');
    }
}
