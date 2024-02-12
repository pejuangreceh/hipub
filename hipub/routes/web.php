<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function (){
    return view('register');
});

Route::get('/dashboard', function (){
    return view('user/dashboard');
});

Route::get('/upload', function (){
    return view('user/upload');
});

Route::get('/artikel', function(){
    return view('user/artikel');
});

Route::get('/log', function(){
    return view('user/log');
});

Route::get('/pembayaran', function(){
    return view('user/pembayaran');
});

Route::get('/editor/details', function(){
    return view('editor/details');
});