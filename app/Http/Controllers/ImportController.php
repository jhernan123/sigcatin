<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marcaciones;
use App\Horarios;
use App\voluntarios;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Routing\Redirector;
use App\Http\Requests;
use Exception;
use Illuminate\Pagination\Paginator;
use Maatwebsite\Excel\Facades\Excel;
//use Illuminate\Support\Facades\Redirect;
use Redirect;
use Carbon\Carbon;
//use Carbon;
use DateTime;

class ImportController extends Controller
{
 public $bandera ='false'; 
    public function import(Request $bandera)
    {

  $nombre = session()->get('nombre');


         $temporal="";
         $temporal2=null;
        $this->bandera='false';

     
         $todo="storage\app\ ";
         $todito=trim($todo).$nombre;
       Excel::load($todito, function($reader) {
    

     foreach ($reader->get() as $marcacion) {

        $archivo=(int)$marcacion->id_voluntario;
        //$archivo=314;
        $verVol=DB::table('voluntarios')
        ->select('codigo')
        ->where('codigo','=',$archivo)->first();
        
        if (empty($verVol))
        {
          //dd($verVol);
         return redirect()->route('error');
        }



        $tabla_c1 = DB::table('marcaciones')->where('id_voluntario', $marcacion->id_voluntario)->first();
        if (!empty($tabla_c1)){
        
        $tabla=(int)$tabla_c1->id_voluntario;
        $tabla_fecha=$tabla_c1->marcacion; 
        
        $rr=strtr($marcacion->marcacion, '/', '-');
        $archivo_fecha = date('Y-m-d H:i:s' , strtotime($rr));
         
            if (($tabla==$archivo) && ($tabla_fecha==$archivo_fecha))
                 {
                    $this->bandera='true';
                    return redirect()->route('mensaje'); 
                   }   
                            }    
        $r=strtr($marcacion->marcacion, '/', '-');
        $date = date('Y-m-d H:i:s' , strtotime($r));



        Marcaciones::create([
        'id_voluntario' =>$marcacion->id_voluntario,
        'marcacion' => $date
        ]);
        
        
        $datee=new DateTime($date);
           $datee=$datee->format("y-m-d");

        ///////////////////////////////////////////////////////////////////////
        $temp=$marcacion->id_voluntario;
        $date0=null;
        $contador=0;
        $cuentahoras=0.00;
        $dteDiff="";



     $M  = DB::table('marcaciones')
    ->select('id_voluntario','marcacion')
    ->where('id_voluntario','=', $temp)
    ->whereRaw("DATE_FORMAT(marcacion,'%y-%m-%d')= ?",$date)
    ->get();



      foreach($M as $t){
                        
                $contador=$contador+1;   
                 
      } 

                      

    $tabla_c2 = DB::table('horarios')
    ->select('id_voluntario','fecha')
    ->where('id_voluntario','=', $temp)
    ->whereRaw("DATE_FORMAT(fecha,'%y-%m-%d')= ?",$datee)
    ->first();



$count = count($tabla_c2);

//echo 'Tabla horarios '.$count. '<br>';


        
        if(!$count){
   
        Horarios::create([
        'id_voluntario' =>$temp,
        'fecha' => $date,
        'horas' => null  
        ]);

         $t= DB::table('horarios')
         ->select('id_voluntario','fecha')
         ->where('id_voluntario', '=',$temp)->first();
        
           // $date=$t->fecha;
        
        }
        
       else
        {


if($contador=1){
$dates = new DateTime($date);


//echo 'ID: '.$temp .'   value temporal: '. $temporal->format('d-m-Y H:i:s') . ' --- value dates: ' . $dates->format('d-m-Y H:i:s').'<br>'; 

$dteDiff  = $temporal->diff($dates);


//echo  ' total time : '. $dteDiff->format('%H:%I:%s').'<br>';
}


           Horarios::where('id_voluntario', $temp)
           //->where('fecha', '=',$date)
           ->whereRaw("DATE_FORMAT(fecha,'%y-%m-%d')= ?",$datee)
           ->update(['horas' => $dteDiff->format('%H:%I')]);
        
              }


 
        $temp="";
        $temporal=$date;
        $temporal= new DateTime($temporal);
        
        $dteDiff  =null;
        ///////////////////////////////////////////////////////////////////////
                                        }         
 });

        $data=Marcaciones::all();  

        if ($this->bandera== 'true'){
        return redirect()->route('mensaje');  }
        if ($this->bandera =='false') {
        return view('catinvistas.ingresos.importacion')->with('data',$data); }
 }
        
 public function save(Request $request)
{
       $file = $request->file('file');
      $nombre = $file->getClientOriginalName();

       $path = public_path();
       \Storage::disk('local')->put($nombre,  \File::get($file));  
         session()->flash('nombre', $nombre);
       return redirect('import'); 
     
            
}
    
   public function index()
    {
           return view ('catinvistas.ingresos.importacion');
    } 
    
}
