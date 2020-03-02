<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Concepto;
use App\voluntarios;
use App\voluntarios_detalle;
use App\v_sexo;
use Illuminate\Routing\Redirector;
use App\Http\Requests;
use Exception;
use Illuminate\Pagination\Paginator;

class ConceptoController extends Controller
{
     public function index()
    {

        $datos=Concepto::all();
      return view ('catinvistas.report.ver_concepto',compact('datos'));
    }
    
       public function show($id)
    {

$datos=DB::table('voluntarios')
->select('voluntarios.*','voluntarios.nombre as n','instituciones.*')
->where('voluntarios.concepto',$id)
->where('estado','activo')
->join('instituciones','instituciones.id_institucion',"=",'voluntarios.id_institucion')->paginate(10);  
if ($id==1){	$c="Servicio Social";}
if ($id==2){	$c="Voluntariado";}
if ($id==3){	$c="Seminario";}
if ($id==4){	$c="Beca al Servicio";}
if ($id==5){	$c="Beca de Idiomas";}
if ($id==6){	$c="Eventual";}

return view ('catinvistas.report.ver_concepto_Detalle',compact('datos'))->with('c',$c);
    }



       public function sexo_ver()
    {

        $datos=voluntarios_detalle::all();
        $datos2=v_sexo::all();
        return view ('catinvistas.report.buscar_sexo',compact('datos'),compact('datos2'));
    }
        
}
