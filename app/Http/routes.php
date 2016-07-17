<?php

Route::group(['middleware' => ['web', 'editprofile']], function () {

    Route::get('/', [
        'as'   => '/',
        'uses' => 'IndexController@index',
    ]);
    Route::get('/quickstart', [
        'uses' => 'PagesController@QuickStart',
        'as'   => 'quickstart',
    ]);

    Route::get('faq', [
       'uses' => 'FaqController@index',
        'as' => 'faq',
    ]);
    
    /*Login and Register*/
    Route::get('/auth/logout', [
        'as' => 'logout',
        function () {

            Auth::logout();

            return redirect()->route('/');
        }
    ]);
    Route::get('/auth/{provider?}', [
        'uses' => 'Auth\AuthController@login',
    ]);
    Route::get('/auth/register', [
        'uses' => 'Auth\AuthController@register',
    ]);
    Route::post('/auth/submit', [
        'uses' => 'Auth\AuthController@submit',
    ]);

    Route::get('agents/data', [
        'uses' => 'ProfileController@verifiedAgents',
        'as'   => 'agents.data',
    ]);

    Route::resource('agents', 'ProfileController', [
        'only'       => [
            'index',
            'show'
        ],
        'paramaters' => [
            'agent' => 'agent',
        ]
    ]);

    Route::resource('user', 'ProfileController', [
        'only' => [
            'edit',
            'update',
            'destroy',
        ]
    ]);


    Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {

        Route::get('agents/data', [
            'uses' => 'Admin\AgentsController@data',
            'as'   => 'admin.agents.data',
        ]);
        
        Route::resource('agents', 'Admin\AgentsController');
        
        Route::get('faqs/data', [
           'uses' => 'Admin\FaqsController@data',
            'as' => 'admin.faqs.data',
        ]);

        Route::post('faqs/update_order', [
            'uses' => 'Admin\FaqsController@updateOrder',
            'as' => 'admin.faqs.update_order',
        ]);

        Route::resource('faqs', 'Admin\FaqsController');

        Route::get('badges/data', [
            'uses' => 'Admin\BadgesController@data',
            'as' => 'admin.badges.data',
        ]);

        Route::post('badges/update_order', [
            'uses' => 'Admin\BadgesController@updateOrder',
            'as' => 'admin.badges.update_order',
        ]);

        Route::resource('badges', 'Admin\BadgesController');

    });

});

