<?php

use App\Http\Controllers\HospitalController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('registration');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboardadmin', function () {
    return view('dashboardadmin');
})->name('dashboardadmin');

Route::get('/dashboardparamedic', function () {
    return view('dashboardparamedic');
})->name('dashboardparamedic');

Route::get('/', function () {
    return view('chooseuser');
});

Route::group(['namespace'=>'patients','as'=>'patients.','prefix'=>'patients'], function(){
        Route::get('/',[PatientController::class,'index'])->name('index');
        Route::get('/create',[PatientController::class,'create'])->name('create');
        Route::post('/',[PatientController::class,'store'])->name('store');
        Route::get('/edit/{id}',[PatientController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[PatientController::class,'update'])->name('update');
        Route::delete('/{id}',[PatientController::class,'destroy'])->name('destroy');
});

Route::group(['namespace'=>'hospital','as'=>'hospital.','prefix'=>'hospital'], function(){
        Route::get('/',[HospitalController::class,'index'])->name('index');
        Route::get('/create',[HospitalController::class,'create'])->name('create');
        Route::post('/',[HospitalController::class,'store'])->name('store');
        Route::get('/edit/{id}',[HospitalController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[HospitalController::class,'update'])->name('update');
        Route::delete('/{id}',[HospitalController::class,'destroy'])->name('destroy');
});
