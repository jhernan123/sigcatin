<?php

namespace App\Http\Controllers;

use App\orientador;
use Illuminate\Http\Request;

class OrientadorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //$data = orientador::all();
        $data = orientador::orderBy('id_orientador','desc')->get();
        // $data = orientador::paginate();
        foreach ($data as $c) {

            echo "<option value=" . $c->id_orientador . "   >" . $c->nombre . "</option>";
        }
    }

    public function store(Request $request)
    {
        $otr         = new orientador();
        $otr->nombre = $request->modalorientador;
        $otr->save();
        return $this->index();

    }

}
