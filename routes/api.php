<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController as User;
use App\Http\Controllers\Api\V1\PaymentController as Payment;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/clients')->group(function () {
    Route::get('', [User::class, 'index'])->name('api-clients');    
});

Route::prefix('/payments')->group(function () {
    Route::get('', [Payment::class, 'index'])->name('api-payments');
    Route::post('', [Payment::class, 'store'])->name('api-payments-store');      
});

