<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conductores;
use App\Models\Conductores_a;
use App\Models\Buses;
use App\Models\Rutas;
use App\Models\Infosibus;
use App\Models\User;
use App\Models\sib_empresas_buses;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class RotativosController extends Controller
{
    
    
    
    public function __construct()
    {
        DB::setDefaultConnection('sqlsrv2');
    }
    
    public function rotativos()
    {
        
        $userId = Auth::id();
        $user   = User::find($userId);

        if ($user) {
            $idEmpresaCon = $user->idempresaCon;
        }

        $infosibus      = Infosibus::where('idempresaCon', $idEmpresaCon)->get();
        $sib_empresas_buses      = sib_empresas_buses::all();
        $conductores    = Conductores::all();
        $conductores_a  = Conductores_a::all();
        $buses          = Buses::all();
        $rutas          = Rutas::all();

            /*         if ($infosibus)
                    {

                        if ($infosibus->count() > 0)
                        {
                            foreach ($infosibus as $resultado)
                            {
                                $idempresasibus = $resultado->idempresaCon;
                                $nombre = $resultado->nombre;
                                $odbc_name = $resultado->odbc_name;
                                $odbc_user = $resultado->odbc_user;
                                $odbc_pass = $resultado->odbc_pass;
                                $server_name = $resultado->server_name;
                                $estado = $resultado->estado;
                            }
                        }
                    } */

            /*         dd($idempresasibus,$nombre,$odbc_name,$odbc_user,$odbc_pass,$server_name,$estado); */

        return view('first', compact('conductores','conductores_a','buses','rutas','infosibus','idEmpresaCon','sib_empresas_buses'));
    }

    public function ListadoIdaVuelta(Request $request)
    {

        $ruta        = $request->get("ruta");
        $empresa     = $request->get("empresa");
        $fechaIda    = $request->get("fechaida");
        $fechaVuelta = $request->get("fechavuelta");
        $viajecorto  = 0;

        /* dd($ruta,$empresa,$fechaIda,$fechaVuelta); */

        $rutas_ida    = DB::select("SELECT * FROM [dbo].[sib_listado_servicio_rotativa](?, ?, ?, ?)", array($fechaIda, $fechaVuelta, $ruta, $empresa));
        $rutas_vuelta = DB::select("SELECT * FROM [dbo].[sib_listado_servicio_rotativa_vuelta](?, ?, ?, ?)", array($fechaIda, $fechaVuelta, $ruta, $empresa));

        foreach ($rutas_ida as $value) {
            $tiempo = $value->tiempo_viaje;
            if ($tiempo < 300) {
                $viajecorto = 1;
            } else {
                $viajecorto  = 0;
            }
        }

        return response()->json([
            'tabla1' => $rutas_ida,
            'tabla2' => $rutas_vuelta,
            'viajecorto' => $viajecorto
        ]);
    }

    public function logout()
    {
        
        Auth::logout();
        return redirect('/nova/login');

    }
}
