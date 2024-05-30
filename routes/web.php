<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Testing1Controller;
use App\Http\Controllers\Testing2Controller;

Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::resource('products', ProductController::class);

Route::resource('karyawans', KaryawanController::class)->names([
    'index' => 'karyawan.index'

]);

Route::resource('jabatans', JabatanController::class)->names([
    'index' => 'jabatan.index'
]);


Route::resource('levels', LevelController::class)->names([
    'index' => 'level.index'
]);


Route::resource('departments', DepartmentController::class)->names([
    'index' => 'department.index'
]);

Route::resource('testings1', Testing1Controller::class)->names([
    'index' => 'testing1.index'
]);


Route::resource('testings2', Testing2Controller::class)->names([
    'index' => 'testing2.index'
]);

