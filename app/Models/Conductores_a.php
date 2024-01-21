<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conductores_a extends Model
{
    use HasFactory;
	protected $connection = 'sqlsrv2';
    protected $table = 'vp_conductores_a';
	protected $fillable = ['idconductor','rut','nombre','apellido','estado','ingreso','telefono','idusuario','tipotripulacion','idempresa','contrato','sistema_pago','idusuario_crea','fecha_crea'];
	protected $primaryKey="idconductor";
	public $timestamps = true;
}
