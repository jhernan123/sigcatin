<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersHorarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('horarios', function (Blueprint $table) {
            $table->increments('id_horarios');
            
             $table->integer('id_voluntario');
             $table->string('fecha');
             $table->float('horas');
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
             Schema::dropIfExists('horarios');
    }
}
