<?php

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

Route::get('/', function () {
    return view('welcome', ['data' => \App\Models\ProgressProductUpload::all()]);
});

Route::post('/upload', [\App\Http\Actions\UploadCsv::class , 'handle'])->name('upload');
//Route::post('/upload', [\App\Http\Actions\UploadCsvOptimized::class , 'handle'])->name('upload');
