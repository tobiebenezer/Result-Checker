<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\lecturer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Rules\Role;

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



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware('hod')->group(function(){

});

Route::any('/',[authController::class,"home"])->name('home');
Route::middleware('home')->group(function(){

    
});

Route::get('/nome',function(){
    return view('home');
});    

Route::middleware('lecture')->group(function(){

Route::any('/lecturer',[lecturer::class,'viewUpload'])->name('lecturer.home');
Route::any('/upload-file',[lecturer::class,'upload'])->name('lresult.update');
Route::any('/upload-form',[lecturer::class,'form'])->name('lupload.form');

});

Route::middleware('student')->group(function(){

});



