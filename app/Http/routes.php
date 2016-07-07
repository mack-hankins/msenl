<?php

Route::get('/', ['as' => '/', 'uses' => 'IndexController@index']);
Route::get('/quickstart', 'PagesController@QuickStart');

/*Login and Register*/
Route::get('/auth/logout', ['as' => 'logout', function () {

    Auth::logout();

    return Redirect::back();
}]);
Route::get('/auth/{provider?}', 'Auth\AuthController@login');
Route::get('/auth/register', 'Auth\AuthController@register');
Route::post('/auth/submit', 'Auth\AuthController@submit');

/*Enemy Portals*/
Route::get('/enemy-portals/submit', 'Msenl\Http\Controllers\EnemyPortalsController@submit');
Route::post('/enemy-portals/update', 'Msenl\Http\Controllers\EnemyPortalsController@update');
Route::get('/enemy-portals/{agent}', 'Msenl\Http\Controllers\EnemyPortalsController@index');
Route::get('/enemy-portals/{agent}/remove/{id}', 'Msenl\Http\Controllers\EnemyPortalsController@remove');
Route::get('/enemy-portals/{agent}/undo/{id}', 'Msenl\Http\Controllers\EnemyPortalsController@undoremove');
