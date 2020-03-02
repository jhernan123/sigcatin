<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

use Illuminate\Database\Eloquent\Builder;

class Horarios extends Model
{

	 protected $table = 'horarios';
      protected $fillable=['id_voluntario','fecha','horas'];


 public function scopeName($query,$id_voluntario)
 {

     if(!is_null($id_voluntario)){
    return $query->where('id_voluntario', 'like', '%'.$id_voluntario.'%');
  
 }


}

}