<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vp_servicios extends Model
{
    use HasFactory;
	protected $connection = 'sqlsrv2';
    protected $table = 'vp_servicios';
	protected $fillable  = [
		'idbus',
		'idconductor1',
		'idconductor2',
		'idauxiliar',
        'idservicio',
	];
	
	protected $primaryKey="idservicio";
	public $timestamps = false;
}
