<?php
// routes/api.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\EmpresaController;

Route::apiResource('contatos', ContatoController::class);
Route::apiResource('empresas', EmpresaController::class);

 Route::get('contatos', [ContatoController::class, 'index']);

