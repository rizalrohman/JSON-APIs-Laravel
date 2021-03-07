<?php

use Illuminate\Http\Request;

Route::get('/mahasiswa', 'MahasiswaController@get');
Route::post('/mahasiswa', 'MahasiswaController@post');
Route::put('/mahasiswa/{id}', 'MahasiswaController@put');
Route::delete('/mahasiswa/{id}', 'MahasiswaController@delete');