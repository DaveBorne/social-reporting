<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    // Route::get('/projects', 'ProjectsController@index');
    // Route::get('/projects/create', 'ProjectsController@create');
    // Route::get('/projects/{project}', 'ProjectsController@show');
    // Route::get('/projects/{project}/edit', 'ProjectsController@edit');
    // Route::patch('/projects/{project}', 'ProjectsController@update');
    // Route::post('/projects', 'ProjectsController@store');
    // Route::delete('/projects/{project}', 'ProjectsController@destroy');

    Route::resource('campaigns', 'CampaignsController');

    Route::resource('/campaigns/{campaign}/projects', 'ProjectsController');








    Route::resource('/campaigns/{campaign}/projects/{project}/comments', 'CommentsController');
    Route::patch('/campaigns/{campaign}/projects/{project}/comments/{comment}', 'CommentsController@update');

    Route::resource('/campaigns/{campaign}/projects/{project}/comments/{comment}/responses', 'ResponsesController');
    Route::patch('/campaigns/{campaign}/projects/{project}/comments/{comment}/responses/{responses}', 'ResponsesController@update');

    //Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
    //Route::patch('/projects/{project}/tasks/{task}', 'ProjectTasksController@update');
    // Route::patch('/tasks/{task}', 'ProjectTasksController@update');

    Route::get('/home', 'HomeController@index')->name('home');
});

Auth::routes();
