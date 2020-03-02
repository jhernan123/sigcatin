<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoluntariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voluntarios', function (Blueprint $table) {
            $table->increments('id_voluntario')->unsigned();
            $table->string('estado', 255);
            $table->integer('codigo')->unsigned();
            $table->string('concepto', 255);
            $table->integer('id_orientador')->unsigned();
            $table->foreign('id_orientador')->references('id_orientador')->on('orientador');
            $table->string('condicion', 20);
            $table->string('fecha_inicio', 255);
            $table->string('fecha_fin', 255);
            $table->string('foto', 255);

            $table->string('nombre', 255);
            $table->string('direccion', 255);
            $table->integer('edad');
            $table->string('correo', 255);
            $table->string('telefono_f', 255)->nullable();
            $table->string('celular', 255)->nullable();
            $table->string('dui', 255);
            $table->string('cuenta_bancaria', 255)->nullable();

            $table->integer('id_institucion')->unsigned();
            $table->foreign('id_institucion')->references('id_institucion')->on('instituciones');

            $table->string('carnet', 255);
            $table->integer('carrera_opcion')->unsigned();
            $table->foreign('carrera_opcion')->references('id')->on('carreras');

            $table->string('horario', 255)->nullable();
            $table->integer('horas_requeridas')->nullable();
            $table->integer('horas_realizar')->nullable();
            $table->string('contacto', 255)->nullable();
            $table->integer('parentesco')->nullable();
            $table->string('tel_contacto', 255)->nullable();
            $table->string('padecimiento', 255)->nullable();
            $table->string('descripcion', 255)->nullable();

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
        Schema::dropIfExists('voluntarios');
    }
}
