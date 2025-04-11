<?php

use App\Http\Controllers\ConverterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ConverterController::class, 'index'])->name('converter.index');
Route::post('/convert', [ConverterController::class, 'convert'])->name('converter.convert');
