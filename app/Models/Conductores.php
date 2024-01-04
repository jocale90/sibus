<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conductores extends Model
{
    use HasFactory;
	protected $connection = 'sqlsrv2';
    protected $table = 'vp_conductores_c';
	protected $fillable  = [
		'idconductor',
		'rut',
		'nombre',
		'apellido',
		'estado',
		'ingreso',
		'telefono',
		'idusuario',
		'tipotripulacion',
		'comision',
		'fecha_licencia',
		'idempresa',
		'contrato',
		'sistema_pago',
		'idusuario_crea',
		'fecha_crea'
	];
	
	protected $primaryKey="idconductor";
	public $timestamps = true;
}
