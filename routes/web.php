<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PrinterController;

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
Route::get('/token', function () {
    return csrf_token(); 
});

Route::get('/', function () {
    return view('welcome');
});


Route::post('/document', [DocumentController::class, 'store'])->name('document.store');
Route::get('/document/{document_id}', [DocumentController::class, 'show'])->name('document.show');

Route::get('/printer', [PrinterController::class, 'index'])->name('printer.index');
Route::post('/printer', [PrinterController::class, 'store'])->name('printer.store');
