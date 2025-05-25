<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get(uri: '/posts', action: 'App\Http\Controllers\PostController@index')->name(name: 'posts.index');
Route::get(uri: '/posts/create', action: 'App\Http\Controllers\PostController@create');
Route::get(uri: '/posts/update', action: 'App\Http\Controllers\PostController@update');
Route::get(uri: '/posts/delete', action: 'App\Http\Controllers\PostController@delete');
Route::get(uri: '/posts/first_or_create', action: 'App\Http\Controllers\PostController@firstOrCreate');
Route::get(uri: '/posts/update_or_create', action: 'App\Http\Controllers\PostController@updateOrCreate');

Route::get(uri: '/main', action: 'App\Http\Controllers\MainController@index')->name(name: 'main.index');
Route::get(uri: '/contacts', action: 'App\Http\Controllers\ContactController@index')->name(name: 'contacts.index');
Route::get(uri: '/about', action: 'App\Http\Controllers\AboutController@index')->name(name: 'about.index');
