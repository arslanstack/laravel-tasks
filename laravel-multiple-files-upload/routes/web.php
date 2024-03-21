<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\FileController;
  
Route::get('file-upload', [FileController::class, 'index']);
Route::post('file-upload', [FileController::class, 'store'])->name('file.store');