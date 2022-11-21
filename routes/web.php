<?php

use App\Http\Controllers\DoctorController;
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


Route::get('/doctors', [DoctorController::class, 'index']);
Route::get('/doctors/list', [DoctorController::class, 'dataDoctor'])->name('doctors.list');

// Route::post('/doctors/store', [DoctorController::class, 'store'])->name('doctors.store');
Route::post('/doctors/store',[DoctorController::class, 'store'])->name('doctors.store');
Route::get('/doctors/edit/{id}',[DoctorController::class, 'edit'])->name('doctors.edit');
Route::put('/doctors/update/{id}',[DoctorController::class, 'update'])->name('doctors.update');
Route::delete('/doctors/delete/{id}',[DoctorController::class, 'delete'])->name('doctors.delete');