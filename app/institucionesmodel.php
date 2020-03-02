<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class institucionesmodel extends Model
{
    protected $table    = 'instituciones';
     protected $fillable = ['nombre'];
}
