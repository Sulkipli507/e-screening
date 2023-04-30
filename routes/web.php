<?php

use App\Http\Controllers\admin\PatientController;
use Illuminate\Support\Facades\Route;

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
    return view('backend.master');
});

Route::get('/patient/create', [PatientController::class, 'create'])->name('patient-create');
Route::post('/patient/store', [PatientController::class, 'store'])->name('patient-store');
Route::get('/patient/index', [PatientController::class, 'index'])->name('patient-index');
Route::get('/patient/edit/{id}', [PatientController::class, 'edit'])->name('patient-edit');
Route::put('/patient/update/{id}',[PatientController::class, 'update'])->name('patient-update');
Route::delete('/patient/delete/{id}', [PatientController::class, 'destroy'])->name('patient-delete');