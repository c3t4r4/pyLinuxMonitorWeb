<?php

use App\Http\Controllers\LogReceiverController;
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

Route::middleware('checkNodeID')
    ->group(function () {
    /* API ReceiveLog */
    Route::post("/logs", [LogReceiverController::class, 'store'])->name('logreceiver.store');
});
