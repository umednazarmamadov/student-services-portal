<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\TicketController;

Route::get('/tickets', [TicketController::class, 'index']);
Route::get('/tickets/create', [TicketController::class, 'create']);
Route::post('/tickets', [TicketController::class, 'store']);
Route::get('/tickets/{id}', [TicketController::class, 'show']);