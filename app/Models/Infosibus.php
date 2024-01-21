<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infosibus extends Model
{
    
    use HasFactory;
    protected $connection = 'sqlsrv';
    protected $table = "info_sibus";
	protected $fillable = [
        "idempresaCon",
        "nombre",
        "odbc_name",
        "odbc_user",
        "odbc_pass",
        "server_name",
        "estado"
    ];
	protected $primaryKey="idempresaCon";
	public $timestamps = true;
}
