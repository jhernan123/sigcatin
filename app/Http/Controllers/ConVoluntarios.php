<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\metodos;
use App\viewVoluntarios as v_volunt;
use App\viewrepcarrerasvolunt as repvolunt;
use App\viewvoluntinstituto as instvolunt;
use App\carrera ;
//use Illuminate\Support\Facades\Input;
//use Illuminate\Routing\Redirector;
use DB;
use App\voluntarios as volunt;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image as Image;
include 'metodos.php';

class ConVoluntarios extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index($msjcodigo = null)
    {

        $info   = veralerta($msjcodigo);
        $ruta   = route('voluntarios.store');
        $datos  = datosnull( asset('Images/fotoperfil/default.png') );
        $metodo = null;
        return view('catinvistas.voluntarios.voluntarios', compact('ruta', 'info', 'datos', 'metodo'));
    }

    public function store(Request $request)
    {
        try {
               $foto = 'default.png';
               if ($request->foto) {
            $file = Input::file('foto');
              //Creamos una instancia de la libreria instalada
            $image = \Image::make(\Input::file('foto'));
            //Ruta donde queremos guardar las imagenes
            $path = public_path() . '/Images/fotoperfil/';
            $image->save($path . $file->getClientOriginalName());
            // Cambiar de tamaño
            $image->resize(100, 100);
            // Guardar
            $image->save($path . $file->getClientOriginalName());
           $foto=$file->getClientOriginalName();
          }

           $datos = array(
        'estado'           => $request->estado,
        'codigo'           => $request->codigo,
        'concepto'         => $request->concepto,
        'id_orientador'    => $request->id_orientador,
        'condicion'        => $request->condicion,
        'fecha_inicio'     => $request->fecha_inicio,
        'fecha_fin'        => $request->fecha_fin,
        'nombre'           => $request->nombre,
        'direccion'        => $request->direccion,
        'edad'             => $request->edad,
        'correo'           => $request->correo,
        'telefono_f'       => $request->telefono_f,
        'celular'          => $request->celular,
        'dui'              => $request->dui,
        'cuenta_bancaria'  => $request->cuenta_bancaria,
        'id_institucion'   => $request->id_institucion,
        'carnet'           => $request->carnet,
        'carrera_opcion'   => $request->carrera_opcion,
        'horario'          => $request->horario,
        'horas_requeridas' => $request->horas_requeridas,
        'horas_realizar'   => $request->horas_realizar,
        'contacto'         => $request->contacto,
        'parentesco'       => $request->parentesco,
        'tel_contacto'     => $request->tel_contacto,
        'padecimiento'     => $request->padecimiento,
        'descripcion'      => $request->descripcion,
        'foto'             => $foto,
        'f_nacimiento'     => $request->f_nacimiento,
        'sexo'             => $request->sexo
    );
                          
         // volunt::create($request->all());
            volunt::create($datos);
            $notification = array(
            'message' => 'Datos guardados con exito!', 
            'alert-type' => 'success'
             );
        
           return redirect()->back()->with($notification);

        } catch (Exception $e) {
              $notification = array(
            'message' => 'Fallo guardar datos!', 
            'alert-type' => 'error'
             );

        
           return redirect()->back()->with($notification);
        }
    }

    public function show($id)
    {
        $datos = volunt::findOrFail($id);
        return view('catinvistas.voluntarios.voluntarios', compact('datos'));
    }

     public function index2($msjcodigo = null)
    {
        // para la grafica google chart
        /* $grafica = DB::table('carreras')
                     ->leftJoin('voluntarios','carreras.carrera_opcion','=','voluntarios.carrera_opcion')
                     ->select('carreras.carrera_opcion',DB::raw('count(voluntarios.carrera_opcion) as cantidad'))
                    // ->where('status', '<>', 1)
                     ->groupBy('carreras.carrera_opcion')
                     ->get();*/
              $carvolunt = repvolunt::all(); 
              $instvolunt = instvolunt::all(); 

        $info  = veralerta($msjcodigo);
        $datos = v_volunt::all();
        $datos = v_volunt::paginate(5);
        return view('catinvistas.voluntarios.index', compact('datos', 'info','grafica','carvolunt','instvolunt'));
    }


    public function edit($id)
    {
       try {

        $datos  = volunt::findOrFail($id);
        $datos['foto'] = "/Images/fotoperfil/".$datos['foto'];
        $info   = veralerta();
        $ruta   = route('voluntarios.update', $id);
        $metodo = true;
        return view('catinvistas.voluntarios.voluntarios', compact('ruta', 'info', 'datos', 'metodo'));
       }catch(Exception $e) {   
            return  redirect()->back();
       }
    }

    public function update(Request $request, $id)
    {
        try {
              
              $v=volunt::findOrFail($id);
              $fotoanterior = $v->foto;
            
          if ($request->foto) {
            $file = Input::file('foto');
              //Creamos una instancia de la libreria instalada
            $image = \Image::make(\Input::file('foto'));
            //Ruta donde queremos guardar las imagenes
            $path = public_path() . '/Images/fotoperfil/';
            
            $image->save($path . $file->getClientOriginalName());
            // Cambiar de tamaño
            $image->resize(100, 100);
            // Guardar
            $image->save($path . $file->getClientOriginalName());
            
            //se elimina la foto anterior excepto la imagen por defecto "default.png"
            if ($fotoanterior != 'default.png') {
             \File::delete(public_path('images/fotoperfil/'.$fotoanterior));
            }
            
          }
               
            volunt::find($id)->update($request->all());
                if ($request->foto) {
                  $v->foto=$file->getClientOriginalName();
                  $v->save();
                }else{
                 $v->foto=$fotoanterior;
                 $v->save();
                }
            $notification = array(
            'message' => 'Datos guardados con exito!', 
            'alert-type' => 'success'
             );
           return redirect()->back()->with($notification);
        } catch (Exception $e) {
            $notification = array(
            'message' => 'Fallo guardar los datos!', 
            'alert-type' => 'error'
             );

           return redirect()->back()->with($notification);
        }

    }
    public function destroy(Request $request, $id)
    {
        try {
            $vl = volunt::findOrFail($id);
            $vl->delete();
           $notification = array(
            'message' => 'Registro eliminado!', 
            'alert-type' => 'info'
             );

           return redirect()->back()->with($notification);
        } catch (Exception $e) {
            $notification = array(
            'message' => 'Registro no pudo ser eliminado', 
            'alert-type' => 'warning',
             );

           return redirect()->back()->with($notification);
        }
        
    }

    public function valkodigo(Request $request){
         //funcion que consulta si existe ya el codigo que esta digitando el usuario.
   try {
  $kd  = volunt::select('id_voluntario')->where('codigo' , "=" , $request->code)->get();
      // return dd($kd);
       echo $kd[0]->id_voluntario;
   }catch (Exception $e){
      // return $e->getMessage();
    echo false;
   }
 
   }

}
