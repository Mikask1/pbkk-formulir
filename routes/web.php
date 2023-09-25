<?php

use App\Http\Controllers\TransactionFormController;
use App\Http\Controllers\TransactionListController;
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

Route::get('/', [TransactionListController::class, 'index']);
Route::get('/transaction-form', [TransactionFormController::class, 'index']);
