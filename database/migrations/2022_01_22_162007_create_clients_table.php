<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('fullname', 50);
            $table->string('company', 50);
            $table->string('email', 50);
            $table->string('phone', 15);
            $table->text('address');
            $table->string('province', 60);
            $table->string('city', 60);
            $table->string('district', 60);
            $table->string('sub_district', 60);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
