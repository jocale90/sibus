<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conductores;
use App\Models\Conductores_a;
use App\Models\Buses;
use App\Models\Rutas;


class RotativosController extends Controller
{
    public function rotativos()
    {
        $conductores    = Conductores::all();
        $conductores_a  = Conductores_a::all();
        $buses          = Buses::all();
        $rutas          = Rutas::all();
        return view( 'first', compact('conductores','conductores_a','buses','rutas') );
    }
}
