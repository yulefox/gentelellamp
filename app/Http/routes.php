<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

Route::get('api/hosts', 'HostController@hosts');

// 认证路由...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// 注册路由...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('/operate/versions', 'DeployController@version');

Route::group(['middleware' => 'auth', 'prefix' => 'jfjh/v1'], function () {
    Route::resource('versions', 'VersionController');
    Route::resource('players', 'PlayerController');
    Route::get('apps', 'LampController@getServers');
    Route::get('gm/add_namelist', 'LampController@addNamelist');
    Route::get('gm/trigger_event', 'LampController@triggerEvent');
    Route::get('gm/add_mail', 'LampController@addMail');
    Route::get('stat/retention', 'LampController@retention');
});

Route::get('/gentelella/{page}', 'LampController@gentelella');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'GMController@role');
    Route::get('/home', 'GMController@role');
    Route::get('/doc/{page}', 'LampController@doc');
    Route::get('/api/query/{table}', 'LampController@prettyQuery');
    Route::get('/coc/costs', 'COCController@costs');
    Route::get('/operate/deploy', 'DeployController@index');
    Route::post('/operate/deploy', 'DeployController@deploy');
    Route::post('/operate/merge', 'DeployController@merge');
    Route::post('/operate/package', 'DeployController@package');
    Route::get('/monitor/online', 'OnlineController@index');
    Route::get('/admin/event', 'GMController@event');
    Route::post('/admin/event', 'GMController@postEvent');
    Route::get('/admin/mail', 'GMController@mail');
    Route::post('/admin/mail', 'GMController@postMail');
    Route::get('/admin/role', 'GMController@role');
    Route::get('/stat/summary', 'LampController@summary');
    Route::get('/{sector}/{page}', 'LampController@index');
});
