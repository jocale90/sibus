<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rutas extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv2';
    protected $table = 'vp_rutas';
	protected $fillable = [
        "idruta",
        "nombreruta",
        "ciudador",
        "ciudaddes",
        "pda",
        "ruta_contraria",
        "color",
        "transfer",
        "orden",
        "desc_ruta",
        "agrupa",
        "agrupa_txt",
        "location",
        "pco_lleno",
        "pco_vacio",
        "idempresa",
        "idzona",
        "km_ruta_rep",
        "km_tramo_rep",
        "tipo_viaje",
        "estado_ruta",
        "cant_adulto",
        "cant_estudiante"
    ];
	protected $primaryKey="idruta";
	public $timestamps = true;
}
