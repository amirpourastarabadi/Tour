<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourAdminsTable extends Migration
{
    public function up()
    {
        Schema::create('tour_admins', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            $table->string('agency');
            $table->date('start_at');
            $table->string('guild_code', 15)->unique();
            $table->string('email', 150)->nullable()->unique();
            $table->string('telephone_number');
        });
    }


    public function down()
    {
        Schema::dropIfExists('tour_admins');
    }
}
