<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class voluntarios extends Model
{
     protected $table    = 'voluntarios';
     protected $primaryKey = 'id_voluntario';
     protected $fillable = ['estado','codigo','categoria','concepto','id_orientador','condicion','fecha_inicio','fecha_fin','nombre','direccion',
      'edad','correo','telefono_f','celular','dui','nit','cuenta_bancaria','id_institucion','carnet','carrera_opcion','horario',
      'horas_requeridas','horas_realizar','contacto','parentesco','tel_contacto','padecimiento','descripcion','foto','sexo','f_nacimiento'
     ];

  
}
?>