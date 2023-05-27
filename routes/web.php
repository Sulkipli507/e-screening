<?php

use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\PatientController;
use App\Http\Controllers\admin\HomeController;
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
    return view('auth.login');
});

Route::middleware(['auth', 'CheckRole:admin'])->group(function(){
    Route::get('/user/index', [UserController::class, 'index'])->name('user-index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user-create');
    Route::post('user/store', [UserController::class, 'store'])->name('user-store');
    Route::delete('user/delete/{id}', [UserController::class, 'destroy'])->name('user-delete');
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user-edit');
    Route::put('user/update/{id}', [UserController::class, 'update'])->name('user-update');
});

Route::middleware(['auth', 'CheckRole:perawat'])->group(function(){
    Route::get('/patient/create', [PatientController::class, 'create'])->name('patient-create');
    Route::post('/patient/store', [PatientController::class, 'store'])->name('patient-store');
    Route::get('/patient/edit/{id}', [PatientController::class, 'edit'])->name('patient-edit');
    Route::put('/patient/update/{id}',[PatientController::class, 'update'])->name('patient-update');
    Route::delete('/patient/delete/{id}', [PatientController::class, 'destroy'])->name('patient-delete');
});

Route::middleware(['auth', 'CheckRole:admin,perawat,pemimpin'])->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/patient/index', [PatientController::class, 'index'])->name('patient-index');
});

Auth::routes();
Route::match(['GET','POST'], '/register', function(){
    return redirect('/login');
})->name('register');
