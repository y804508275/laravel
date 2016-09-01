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

Route::get('/', 'ShowController@index');

Route::get('/list','ShowController@showAll');

Route::get('/list/{id}','ShowController@showList');

Route::get('/city/{city}','ShowController@showCity');

Route::get('/activity/{id}','ShowController@activity');

Route::get('/article/{id}','ArticlesController@show');
//admin

Route::get('/admin', 'AdminController@index');

Route::get('/admin/activityAdmin','ActivityController@index');

Route::get('/admin/activity','ActivityController@activity');

Route::post('/admin/kind/add','ActivityController@addKind');

Route::post('/admin/edit','ActivityController@editKind');

Route::get('/admin/list','ActivityController@allList');

Route::get('/admin/list/{id}','ActivityController@kindList');

Route::get('/admin/activity/edit/{id}','ActivityController@activityEdit');

Route::post('/admin/activity/edit','ActivityController@editSubmit');

Route::get('/admin/activity/add/{id}','ActivityController@activityAdd');

Route::post('/admin/activity/add','ActivityController@addSubmit');

Route::get('/admin/activity/top/{id}','ActivityController@top');

Route::get('/admin/activity/cancelTop/{id}','ActivityController@cancelTop');

Route::post('/admin/kind/delete','ActivityController@kindDelete');

Route::get('/addKind','ActivityController@addKind');

Route::get('/admin/banner','BannerController@index');

Route::get('/admin/banner/add','BannerController@add');

Route::post('/admin/banner/add','BannerController@addSubmit');

Route::get('/admin/banner/edit/{id}','BannerController@edit');

Route::post('/admin/banner/edit','BannerController@editSubmit');

Route::post('/admin/banner/delete','BannerController@del');

Route::get('/admin/banner/top/{id}','BannerController@top');

Route::get('/admin/login','LoginController@index');

Route::post('/admin/login','LoginController@check');

Route::get('welcome','LoginController@welcome');

Route::get('/admin/city','CityController@index');

Route::post('/admin/city/add','CityController@addCity');

Route::post('/admin/city/delete','CityController@cityDelete');

Route::get('/admin/city/edit/{id}','CityController@editCity');

Route::get('/admin/topic','TopicController@index');

//admin 主题管理

Route::get('/admin/theme','ThemeController@index');

Route::get('/admin/theme/add','ThemeController@add');

Route::get('/admin/theme/{id}','ThemeController@edit');


Route::post('/admin/theme/edit','ThemeController@editSubmit');

Route::post('/admin/theme/add','ThemeController@addSubmit');

Route::post('/admin/theme/delete','ThemeController@themeDelete');

//admin文章管理

Route::get('/admin/article','ArticlesController@index');

Route::get('/admin/article/add','ArticlesController@add');

Route::post('/admin/article/add','ArticlesController@addSubmit');

Route::get('/admin/article/edit/{id}','ArticlesController@edit');

Route::post('/admin/article/edit','ArticlesController@editSubmit');

Route::post('/admin/article/delete','ArticlesController@del');

//Api

Route::get('/api/main','ApiController@mainApi');

Route::get('/api/find','ApiController@findApi');

Route::get('/api/kind/{name}','ApiController@kind');

Route::get('/api/city/{name}','ApiController@city');

Route::get('/api/theme/{themeId}','ApiController@theme');

Route::post('/api/user/signup','UserController@signUp');

Route::post('/api/user/signin','UserController@signIn');

Route::get('/api/list/{number}','ApiController@allList');

Route::get('/api/user/set','UserController@set');

Route::post('/api/ceshi','UserController@ceshi');

Route::get('/api/sms/{tel}','UserController@sms');
//Route::get('/api/activity/{id}','ApiController@activity');


Route::get('/api/activity/{id}','ApiController@showActivity');