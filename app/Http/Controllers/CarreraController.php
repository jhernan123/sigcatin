<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\carrera;
use Illuminate\Support\Facades\Input;
use Illuminate\Routing\Redirector;
use App\Http\Requests;
use Exception;


class CarreraController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
  public  function index(){
       // $data = carrera::all();
    $data = carrera::orderBy('id','desc')->get();
        foreach ($data as $c) {
            echo "<option value=" . $c->id . ">" . $c->carrera_opcion . "</option>";
        }
    }



  public function store(Request $request){
  	/*if ($request->ajax()) {
   carrera::create($request->all());
  	   return response()->json([

          "mensaje" => $request->all()
  	   	]);
  	}*/
 
        $carrera         = new carrera();
        $carrera->carrera_opcion = $request->modalcarrera;
        $carrera->save();
        return $this->index();
    }
}
