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
// Route::resource('students', 'DoctorController');
// Route::get('users', [DoctorController::class, 'index'])->name('users.index');
Route::post('add-doctors', [DoctorController::class, 'store']);