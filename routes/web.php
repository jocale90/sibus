<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\RotativosController;
use App\Http\Controllers\CompareController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test-db-connection', function () {
    try {
        DB::connection()->getPdo();
        return "Conexión exitosa a la base de datos.";
    } catch (\Exception $e) {
        return "Error al conectar a la base de datos: " . $e->getMessage();
    }
});

Route::get('rotativos'         ,[RotativosController::class, 'rotativos'])->name('rotativos');
Route::get('logout'            ,[RotativosController::class, 'logout'])->name('logout');
Route::get('ListadoIdaVuelta'  ,[RotativosController::class, 'ListadoIdaVuelta'])->name('ListadoIdaVuelta');
Route::post('updateservice'    ,[CompareController::class, 'updateservice'])->name('updateservice');

