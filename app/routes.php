<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/camera/{id}', 'CameraController@getCamera');
Route::get('/', 'CategoriesController@index');
Route::get('/categories-{id}', 'ListCamerasController@index');

Route::get('/admin/control-panel',
    array(
        'as' => 'control-panel',
        'uses' => 'ControlPanelController@index'
    )
);
Route::get('/admin/control-panel/add', 'ControlPanelController@formAdd');
Route::post('/admin/control-panel/add', 'ControlPanelController@addCamera');
Route::post('/admin/control-panel/delete', 'ControlPanelController@delete');
Route::post('/admin/control-panel/copy', 'ControlPanelController@copy');

Route::get('/admin/control-panel/update/{id}', 'ControlPanelController@getFormUpdate');
Route::post('/admin/control-panel/update', 'ControlPanelController@doUpdate');


Route::get('/about-us', function () {
    return View::make('template.camworld.about-us');
});

/*
       Authentication and authorization
       */

Route::get('/admin',
    array(
        'as' => 'get-login',
        'uses' => 'AuthController@getLogin'
    )
);
Route::post('/admin',
    array(
        'as' => 'post-login',
        'uses' => 'AuthController@postLogin'
    )
);

Route::get('/admin/logout',
    array(
        'as' => 'logout',
        'uses' => 'AuthController@logout'
    )
);