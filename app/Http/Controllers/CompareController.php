<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conductores;
use App\Models\Conductores_a;
use App\Models\Buses;
use App\Models\Rutas;
use App\Models\Infosibus;
use App\Models\Vp_servicios;
use App\Models\User;
use App\Models\sib_empresas_buses;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;

class CompareController extends Controller
{
    
    
    
    public function __construct()
    {
        DB::setDefaultConnection('sqlsrv');
    }

    public function updateservice(Request $request)
    {


        $ruta                = $request->get("ruta");
        $empresa             = $request->get("empresa");
        $fechaIda            = $request->get("fechaida");
        $fechaVuelta         = $request->get("fechavuelta");
        $busSelect           = $request->get("busSelect");    
        $conductor1          = $request->get("conductor1");    
        $conductor2          = $request->get("conductor2");    
        $auxiliar            = $request->get("auxiliar");    
        $selectedDataIda     = request('selectedDataIda');
        $selectedDataVuelta  = request('selectedDataVuelta');
        $savedquery          = 0;

/*         
        DB::table('temp_ida')->truncate();
        DB::table('temp_vuelta')->truncate();
        
        foreach ($selectedDataIda as $data)
        {
            DB::statement("
                INSERT INTO temp_ida (idservicio, fechasalida, horasalida, horallegada)
                VALUES (?, ?, ?, ?)
            ", [$data['idservicio'], $data['fechasalida'], $data['horasalida'], $data['horallegada']]);
        }

        foreach ($selectedDataVuelta as $data)
        {
            DB::statement("
                INSERT INTO temp_vuelta (idservicio, fechasalida, horasalida, horallegada)
                VALUES (?, ?, ?, ?)
            ", [$data['idservicio'], $data['fechasalida'], $data['horasalida'], $data['horallegada']]);
        } */

        
/*         $mismodiaida = DB::select("
            IF EXISTS (
                SELECT 1
                FROM [dbo].[temp_ida]
                GROUP BY [fechasalida]
                HAVING COUNT(*) > 1
            )
                SELECT 1
            ELSE
                SELECT 0;
        ");

        $mismodiavuelta = DB::select("
            IF EXISTS (
                SELECT 1
                FROM [dbo].[temp_vuelta]
                GROUP BY [fechasalida]
                HAVING COUNT(*) > 1
            )
                SELECT 1
            ELSE
                SELECT 0;
        "); */

/*         $mismafechasalida = DB::select("
        SELECT fechasalida, COUNT(*) AS cantidad_registros
        FROM (
            SELECT fechasalida FROM temp_ida
            UNION ALL
            SELECT fechasalida FROM temp_vuelta
        ) AS combined
        GROUP BY fechasalida
        HAVING COUNT(*) > 1
        "); */


/*         $vuelta = $mismodiavuelta[0]->{''};
        $ida    = $mismodiaida[0]->{''};

        if ($ida || $vuelta == 1 || !empty($mismafechasalida))
        {
            return response()->json([
                'guardado' => 0,
            ]);
        } */

        
        
        if(isset($selectedDataIda))
        {

            foreach ($selectedDataIda as $value)
            {
                
                $idservicio = $value['idservicio'];
    
                $updateServicios = Vp_servicios::where('idservicio', $idservicio)
                ->update([
                    'idbus' => $busSelect,
                    'idconductor1' => $conductor1,
                    'idconductor2' => $conductor2,
                    'idauxiliar' => $auxiliar,
                ]);
    
                if($updateServicios)    
                {
                    $savedquery = 1;
                    log::info("SE ACTUALIZO EL BUS".$busSelect);
                }
            }

        }
        
        if(isset($selectedDataVuelta))
        {
            foreach ($selectedDataVuelta as $value)
            {
                
                $idservicio = $value['idservicio'];
    
                $updateServicios = Vp_servicios::where('idservicio', $idservicio)
                ->update([
                    'idbus' => $busSelect,
                    'idconductor1' => $conductor1,
                    'idconductor2' => $conductor2,
                    'idauxiliar' => $auxiliar,
                ]);
    
                if($updateServicios)    
                {
                    $savedquery = 1;
                    log::info("SE ACTUALIZO EL BUS".$busSelect);
                }
            }
        }



        if($savedquery > 0)
        {
            return response()->json([
                'guardado' => 1,
            ]);
        }
        else
        {
            return response()->json([
                'guardado' => 0,
            ]);
        }

       
    }
    

}
