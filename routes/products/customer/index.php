<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'index')->name('index');
Route::get('/create', 'create')->name('create');
Route::post('/order', 'order')->name('order');
