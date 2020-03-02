<?php

namespace App\Http\Controllers;

use App\turnos;
use Illuminate\Http\Request;

class TurnosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //$data = orientador::all();
        $data = turnos::orderBy('id','desc')->get();
        // $data = orientador::paginate();
        foreach ($data as $c) {
            echo "<option value=" . $c->id . "   >" . $c->horario . "</option>";
        }
    }

    public function store(Request $request)
    {
        $otr         = new turnos();
        $otr->horario = $request->horario;
        $otr->save();
        return $this->index();
    }

}
