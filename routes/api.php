<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AtivoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/ativos', [AtivoController::class, 'index']);
Route::post('/ativos', [AtivoController::class, 'store']);
Route::put('/ativos/{id}', [AtivoController::class, 'update']);
Route::delete('/ativos/{id}', [AtivoController::class, 'destroy']);
Route::post('/compras', [AtivoController::class, 'storeCompra']);
Route::post('/vendas', [AtivoController::class, 'storeVenda']);
Route::get('/movimentacoes', [AtivoController::class, 'getMovimentacoes']);
