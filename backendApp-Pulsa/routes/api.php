<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('users', [UserController::class, 'index'])->name('user.index');
Route::get('users/view/{id}', [UserController::class, 'view'])->name('view.index');
Route::post('users/create', [UserController::class, 'createUser'])->name('create.index');
Route::put('users/update/{id}', [UserController::class, 'updateSaldo'])->name('update.index');


Route::get('transactions/{id}', [TransactionController::class, 'index'])->name('user.index');
Route::post('transactions/create/{id}', [TransactionController::class, 'beliPulsa'])->name('create.index');
