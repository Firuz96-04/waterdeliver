<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDogovorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_dogovors', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('dogovor_id')->unsigned();
            $table->foreign('dogovor_id')->references('id')->on('dogovors')->cascadeOnUpdate();
            $table->date('date_start');
            $table->date('date_end');
            $table->decimal('dogovor_price',10,2);
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
        Schema::dropIfExists('order_dogovors');
    }
}
