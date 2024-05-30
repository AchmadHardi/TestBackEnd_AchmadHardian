<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\DepartmentController;

Route::post('/api/validate', 'ValidationController@validateInput');
Route::post('/convert', [CurrencyController::class, 'convert']);
Route::prefix('api')->group(function () {
    Route::apiResource('departments', DepartmentController::class)->names([
        'index' => 'api.department.index'
    ]);
});
