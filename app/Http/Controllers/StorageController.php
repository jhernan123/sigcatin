<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector;
use App\Http\Requests;
use Exception;
class StorageController extends Controller
{
  public function save(Request $request)
{
 
       //obtenemos el campo file definido en el formulario
       $file = $request->file('file');
 
       //obtenemos el nombre del archivo
       $nombre = $file->getClientOriginalName();
 

 $path = public_path();
 \Storage::disk('local')->put($nombre,  \File::get($file));  
 
 
       return "archivo guardado";
}



public function index()
    {
           return view ('catinvistas.ingresos.mensaje');
    } 

    public function error()
    {
           return view ('catinvistas.ingresos.error');
    } 
}
