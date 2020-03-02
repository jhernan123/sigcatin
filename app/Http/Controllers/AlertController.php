<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlertController extends Controller
{
   

public function show() 
{
    \Alert::message('Actividad realizada con exito', 'info');
    return view('test');
}
}
