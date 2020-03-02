<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarcacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marcaciones', function (Blueprint $table) {
            $table->increments('id_marcaciones');
            
             $table->integer('id_voluntario')->unsigned();
           
            $table->string('marcacion');
            $table->timestamps();
             $table->foreign('id_voluntario')->references('codigo')
            ->on('voluntarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marcaciones');
    }
}
