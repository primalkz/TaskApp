<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('loginform');
});

Route::get('/success', function () {
    return view('success');
});

Route::get('/app', function () {
    return view('app');
});

Route::post('/login-user', [UserController::class, 'login']);
