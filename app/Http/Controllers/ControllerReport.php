<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

use App\Horarios;
use Illuminate\Routing\Redirector;
use Exception;
use Illuminate\Notifications\Notifiable;
use App\Http\Controllers\Requests;
use PDF;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;

class ControllerReport extends Controller
{
public $desde ;
public $hasta;
private $servicio;
    
    public function index(Request $request)
    
  
    {
     $valor= $request->id_voluntario;


     
       if($valor){
       	
$hor=DB::table('horarios')
->select('horarios.*','voluntarios.codigo','voluntarios.nombre as n','instituciones.*')
->join('voluntarios','horarios.id_voluntario',"=",'voluntarios.codigo') 
->join('instituciones','instituciones.id_institucion',"=",'voluntarios.id_institucion') 
 ->where('voluntarios.codigo','=',$request->get('id_voluntario'))
->where('voluntarios.estado','activo')
 ;        


$horas=$hor->paginate(5);
return view ('catinvistas.report.buscar_horas',compact('horas'));  

      } 


$horas=DB::table('horarios')
->select('horarios.*','voluntarios.codigo','voluntarios.nombre as n','instituciones.*')
->join('voluntarios','horarios.id_voluntario',"=",'voluntarios.codigo') 
->join('instituciones','instituciones.id_institucion',"=",'voluntarios.id_institucion')
->where('voluntarios.estado','activo')
->where('estado','activo')->paginate(10);  



     
    
      return view ('catinvistas.report.buscar_horas',compact('horas'));  
      

       
   
    
    }


      public function mostrandoFecha(Request  $request){

       try{
            
         $desde=($request->input('desde'));
         $hasta=($request->input('hasta'));

         

 $servicio=DB::table('horarios')
->select('horarios.*','voluntarios.codigo','voluntarios.nombre as n','instituciones.*')
->join('voluntarios','horarios.id_voluntario',"=",'voluntarios.codigo') 
->join('instituciones','instituciones.id_institucion',"=",'voluntarios.id_institucion') 
->where('voluntarios.estado','activo')
 ->whereBetween('fecha',array($desde, $hasta))->get();        






  
   view()->share('servicio',$servicio);
 
    
    $this->servicio=$servicio;
         

   
return view ('catinvistas.report.buscar_porFecha',compact('servicio')); 

           
  
    } catch (Exception $e){
         return ('Error - ' . $e);
    }
    
    }


    public function prueba()
    
  
    {
     return view ('catinvistas.report.prueba');  
    }

      public function ConteoHoras()
    
  
    {


/*$horas = \DB::table('horarios')
->selectRaw('horas, sum(horas) as sum')
->select('horarios.*','voluntarios.codigo','voluntarios.nombre as n','instituciones.*')

->join('voluntarios','horarios.id_voluntario',"=",'voluntarios.codigo') 
->join('instituciones','instituciones.id_institucion',"=",'voluntarios.id_institucion') 
->get();*/


$horas = DB::table('horarios')     

->select(DB::raw('SUM((minute(horarios.horas)/60) + hour(horarios.horas))as total'),'horarios.*','voluntarios.codigo','voluntarios.*','voluntarios.nombre as n','instituciones.*')
->join('voluntarios','horarios.id_voluntario',"=",'voluntarios.codigo') 
->join('instituciones','instituciones.id_institucion',"=",'voluntarios.id_institucion') 
->where('voluntarios.estado','activo')
->groupBy('horarios.id_voluntario')




//  ->get();
->paginate(10);  

   
     
    
      return view ('catinvistas.report.contar_horas',compact('horas'));  

  
    }

    
    }
    
        

    
    
            
    

