<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\MotoristaController;
use App\Http\Controllers\ViagemController;


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
    return view('home');
});


//Rotas para veículos
Route::get('/cadastrar-veiculo', function () {
    return view('veiculos.cadastrar');
});

Route::get('/veiculos', [VeiculoController::class ,'index']);
Route::get('/veiculos/{id}', [VeiculoController::class ,'show']);
Route::post('/veiculos', [VeiculoController::class ,'store'])->name('veiculos.store');
Route::delete('/veiculos/{id}', [VeiculoController::class ,'destroy']);
Route::put('/veiculos/{id}', [VeiculoController::class ,'update'])->name('veiculos.update');

//Rotas para motoristas
Route::get('/cadastrar-motorista', function () {
    return view('motoristas.cadastrar');
});

Route::get('/motoristas', [MotoristaController::class ,'index']);
Route::get('/motoristas/{id}', [MotoristaController::class ,'show']);
Route::post('/motoristas', [MotoristaController::class ,'store'])->name('motoristas.store');
Route::delete('/motoristas/{id}', [MotoristaController::class ,'destroy']);
Route::put('/motoristas/{id}', [MotoristaController::class ,'update'])->name('motoristas.update');

//Rotas para viagens
Route::get('/cadastrar-viagem', function () {
    $controller = new ViagemController();
    return $controller->index(true);
});

Route::get('/viagens', [ViagemController::class ,'index']);
Route::get('/viagens/{id}', [ViagemController::class ,'show']);
Route::post('/viagens', [ViagemController::class ,'store']);
Route::delete('/viagens/{id}', [ViagemController::class ,'destroy']);
Route::put('/viagens/{id}', [ViagemController::class ,'update'])->name('viagens.update');