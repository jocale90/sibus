<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conductores extends Model
{
    use HasFactory;
	protected $connection = 'sqlsrv2';
    protected $table = 'vp_conductores_c';
	protected $fillable = ['idusuario','Indice Cond_c','IX_vp_conductores_c','IX_vp_conductores_c_1','IX_vp_conductores_c_2','IX_vp_conductores_c_3'];
	protected $primaryKey="idconductor";
	public $timestamps = true;
}
