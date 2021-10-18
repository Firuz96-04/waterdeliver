<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKlientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name',60);
            $table->string('doljnost',30)->nullable();
            $table->string('name',30)->nullable();
            $table->string('last_name',30)->nullable();
            $table->string('adress',100)->nullable();
            $table->string('phone',50)->nullable();
            $table->date('data_registr');
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
        Schema::dropIfExists('klients');
    }
}
