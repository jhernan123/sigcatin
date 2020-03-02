<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class turnos extends Model
{
    protected $table    = 'turnos';
    protected $fillable = ['horario'];
}