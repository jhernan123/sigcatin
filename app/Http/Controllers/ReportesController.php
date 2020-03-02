<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\institucionesmodel;
use Illuminate\Support\Facades\Input;
use Illuminate\Routing\Redirector;
use App\Http\Requests;
use Exception;

class ReportesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        // $data = institucionesmodel::all();
        $data = institucionesmodel::orderBy('id_institucion','desc')->get();
        foreach ($data as $c) {
            echo '<option value="' . $c->id_institucion . '"">' . $c->nombre . '</option>';
        }
    }
 
 public function store(Request $request){
 	   	     
        $instituto         = new institucionesmodel();
        $instituto->nombre = $request->modalinstitucion;
        $instituto->save();
        return $this->index();
 }

}