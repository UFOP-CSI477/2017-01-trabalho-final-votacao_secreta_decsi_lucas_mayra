<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReuniaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reuniaos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sala_id')->unsigned();
            $table->foreign('sala_id')
                  ->references('id')
                  ->on('salas');
            $table->date('date')->nullable(false);
            $table->boolean('status')
                  ->default(false);
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
        Schema::dropIfExists('reuniaos');
    }
}
