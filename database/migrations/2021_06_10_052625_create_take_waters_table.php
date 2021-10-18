<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTakeWatersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('take_waters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dogovor_id');
            $table->date('take_date');
            $table->smallInteger('water_column')->default(0);
            $table->decimal('water_summ',10,2)->default(0);
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
        Schema::dropIfExists('take_waters');
    }
}
