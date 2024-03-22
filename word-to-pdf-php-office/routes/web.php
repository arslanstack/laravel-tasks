<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WordToPDFController;

Route::get('word-to-pdf', [WordToPDFController::class, 'index']);
Route::post('word-to-pdf', [WordToPDFController::class, 'store'])->name('word.to.pdf.store');