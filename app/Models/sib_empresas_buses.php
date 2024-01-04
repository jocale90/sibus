<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sib_empresas_buses extends Model
{
    use HasFactory;
	protected $connection = 'sqlsrv2';
    protected $table = 'sib_empresas_buses';
	protected $fillable = [
        'idempbus',
        'rut',
        'nombre',
        'codigo',
        'min_anu',
        'min_dev',
        'min_cnj',
        'resp_tramo_cupon',
        'logo_emp',
        'copia_precio',
        'precio_agrupa',
        'tripu_usuario',
        'nombreempresa',
        'desglose_arqueo',
        'logo64',
        'urlboleto',
        'textoboleto',
        'ocupaqr',
        'fueradefecha',
        'imprimecolilla',
        'dev_cambio',
        'tipo_moneda',
        'info_pasajero',
        'desc_boleto',
        'info_rut_empresa',
        'info_pasajero_boleto',
        'Permiso_anula',
        'venta_credito',
        'recarga_prepago',
        'valor_pas_des',
        'desc_res',
        'ange_boleto',
        'canje_web_altas',
        'cuponera',
        'info_edit_pasajeros',
        'detalle_planilla',
        'clave_boleto',
        'medio_tra',
        'medio_pay',
        'medio_cre',
        'medio_pre',
        'bloqueo_asien_texto',
        'pasajes_blanco',
        'servicio_tripu',
        'caja_chica',
        'editar_servicio_tramo',
        'cuponera_ruta78',
        'ingreso_tercero',
        'por_max_rec',
        'copiar_arqueo',
        'exec_actualiza_compensacion_bus',
        'exec_resumen_decena',
        'imprime_zaa',
        'acumula_km_por_boleto',
        'pda_empresas'
    ];
	protected $primaryKey="idempbus";
	public $timestamps = true;
}
