<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevelopersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('fullname', 50);
            $table->string('birth_date', 50);
            $table->string('email', 50);
            $table->string('phone', 15);
            $table->text('address');
            $table->string('province', 60);
            $table->string('city', 60);
            $table->string('district', 60);
            $table->string('sub_district', 60);
            $table->string('gender', 20);
            $table->string('mariage_status', 25);
            $table->string('religion', 25);
            $table->string('nationality', 25);
            $table->string('position', 25);
            $table->text('programing_language');
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
        Schema::dropIfExists('developers');
    }
}
