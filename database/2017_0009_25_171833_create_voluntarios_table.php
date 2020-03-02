<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id_voluntario');
            $table->string('estado',255,null);
            $table->string('categoria',255,null);
            $table->integer('id_orientador')->unsigned();
            $table->foreign('id_orientador')->references('id_orientador')->on('orientador');
            $table->string('condicion',255,null);
            $table->string('fecha_inicio',255,null);
            $table->string('fecha_fin',255,null);
            $table->string('foto',255,null);
            
            $table->string('nombre',255,null);
            $table->string('direccion',255,null);
            $table->string('fecha_nac',255,null);
            $table->string('correo',255,null);
            $table->string('telefono_f',255,null);
            $table->string('telefono_c',255,null);
            $table->string('dui',255,null);
            $table->string('nit',255,null);
            $table->string('cuenta_bancaria',255,null);
            
            $table->string('institucion',255,null);
            $table->string('carnet',255,null);
            $table->string('carrera_opcion',255,null);
            
            $table->string('horario',255,null);
            $table->integer('horas_requeridas',null);
            $table->integer('horas_realizar',null);
            $table->string('contacto',255,null);
            $table->string('tel_contacto',255,null);
            $table->string('padecimiento',255,null);
            $table->string('descripcion',255,null);
            
            
            
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
