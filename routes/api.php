<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\KasirSubmission;

Route::post('/submit-form', [KasirSubmission::class, 'handleKasirSubmission'])->middleware('web')->name('kasir.submit');