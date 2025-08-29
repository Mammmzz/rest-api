<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Routes untuk API Produk
Route::prefix('produk')->group(function () {
    Route::get('/', [ProdukController::class, 'index']);          // GET /api/produk
    Route::post('/', [ProdukController::class, 'store']);         // POST /api/produk
    Route::get('/{id}', [ProdukController::class, 'show']);       // GET /api/produk/{id}
    Route::put('/{id}', [ProdukController::class, 'update']);     // PUT /api/produk/{id}
    Route::delete('/{id}', [ProdukController::class, 'destroy']); // DELETE /api/produk/{id}
});
