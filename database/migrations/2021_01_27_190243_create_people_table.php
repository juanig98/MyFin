<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 150);
            $table->string('second_name', 150)->nullable();
            $table->string('last_name', 150);
            $table->string('phone', 150);
            $table->string('address', 150)->nullable();
            $table->string('city', 150)->nullable();
            $table->string('region', 150)->nullable();
            $table->string('country', 150);
            $table->string('notes', 150)->nullable();
            $table->timestamp('birthday');
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('people');
    }
}
