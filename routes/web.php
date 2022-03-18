<?php

use App\Http\Controllers\EmpleadoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $areas = [
        'administracion', 'recursos humanos', 'desarollador', 'redes'
    ];
    return view('index', compact('areas'));
});
Route::post('/empleados/imageUpdate', [EmpleadoController::class, 'imageUpdate'])->name('empleados.imageUpdate');
Route::delete('/empleados/imageDestroy/{empleado}', [EmpleadoController::class, 'imageDestroy'])->name('empleados.imageDestroy');
Route::resource('/empleados', EmpleadoController::class)->names('empleados');

