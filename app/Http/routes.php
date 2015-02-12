<?php

Route::get('/', 'Msenl\Http\Controllers\IndexController@index');
Route::get('/quickstart', 'Msenl\Http\Controllers\PagesController@QuickStart');

/*Login and Register*/
Route::get('/login', 'Msenl\Http\Controllers\AuthController@login');
Route::get('/logout', 'Msenl\Http\Controllers\AuthController@logout');
Route::get('/register', 'Msenl\Http\Controllers\AuthController@register');
Route::post('/submit', 'Msenl\Http\Controllers\AuthController@submit');

/*Enemy Portals*/
Route::get('/enemy-portals/submit', 'Msenl\Http\Controllers\EnemyPortalsController@submit');
Route::post('/enemy-portals/update', 'Msenl\Http\Controllers\EnemyPortalsController@update');
Route::get('/enemy-portals/{agent}', 'Msenl\Http\Controllers\EnemyPortalsController@index');
Route::get('/enemy-portals/{agent}/remove/{id}', 'Msenl\Http\Controllers\EnemyPortalsController@remove');
Route::get('/enemy-portals/{agent}/undo/{id}', 'Msenl\Http\Controllers\EnemyPortalsController@undoremove');
