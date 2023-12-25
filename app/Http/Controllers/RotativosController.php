<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conductores;
use App\Models\Conductores_a;
use App\Models\Buses;
use App\Models\Rutas;
use Illuminate\Support\Facades\DB;


class RotativosController extends Controller
{
    
    
    
    public function __construct()
    {
        DB::setDefaultConnection('sqlsrv2');
    }
    
    public function rotativos()
    {
        $conductores    = Conductores::all();
        $conductores_a  = Conductores_a::all();
        $buses          = Buses::all();
        $rutas          = Rutas::all();
        
        return view('first', compact('conductores','conductores_a','buses','rutas') );
    }

    public function ListadoIdaVuelta($fechaIda = '2023-03-1', $fechaVuelta = '2023-03-1', $ruta = 296, $empresa = 1)
    {
       
        $rutas_ida = DB::select("SELECT * FROM [dbo].[sib_listado_servicio_rotativa](?, ?, ?, ?)", array($fechaIda, $fechaVuelta, $ruta, $empresa));
        $rutas_vuelta = DB::select("SELECT * FROM [dbo].[sib_listado_servicio_rotativa_vuelta](?, ?, ?, ?)", array($fechaIda, $fechaVuelta, $ruta, $empresa));
    
        return response()->json([
            'tabla1' => $rutas_ida,
            'tabla2' => $rutas_vuelta
        ]);
    }
}
