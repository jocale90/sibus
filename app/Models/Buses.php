<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buses extends Model
{
    use HasFactory;
    protected $table = 'vp_buses';
	protected $fillable = [
        "idbus",
        "nbus",
        "patente",
        "asientos",
        "estado",
        "empbus",
        "idlayout",
        "tipobus",
        "wifi",
        "nmotor",
        "marcabus",
        "colorbus",
        "nchasis",
        "anobus",
        "poliza",
        "vigencia",
        "region_inscripcion",
        "folio_inscripcion",
        "fecha_revision_tecnica",
        "km_inicial",
        "idrazonsocial",
        "compensacion",
        "fecha_registro",
        "id_regla_compensacion",
        "año_compensacion"
    ];
	protected $primaryKey="idbus";
	public $timestamps = true;
}
