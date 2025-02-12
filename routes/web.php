<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\RouteCheck;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('loginform');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/success', function () {
    return view('success');
});

Route::view('/app', 'app')->middleware('class1');

Route::get('/products', [ProductController::class, 'getProducts']);


Route::post('/login-user', [UserController::class, 'login']);
Route::post('/signup-user', [UserController::class, 'signup']);

Route::get('/logout', [UserController::class, 'logout']);

Route::post('/adddata', [ProductController::class, 'add']);
Route::get('/delete/{id}', [ProductController::class, 'delete']);
Route::get('/edit/{id}', [ProductController::class, 'edit']);
Route::put('/edit-product/{id}', [ProductController::class, 'editProduct']);
Route::get('search', [ProductController::class, 'search']);
Route::get('/export-products', [ProductController::class, 'exportProducts']);

Route::post('/import-products', [ProductController::class, 'importProducts']);
Route::get('/upload', function () {
    return view('upload');
});
