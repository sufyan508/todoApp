<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('user')->namespace('App\Http\Controllers\Admin')->name('user/')->group(static function() {
    Route::prefix('test-tasks')->name('test-tasks/')->group(static function() {
        Route::get('/',                                             'TasksController@index')->name('index');
        Route::get('/create',                                       'TasksController@create')->name('create');
        Route::post('/store',                                       'TasksController@store')->name('store');
        Route::get('/{task}/edit',                                  'TasksController@edit')->name('edit');
        Route::post('/bulk-destroy',                                'TasksController@bulkDestroy')->name('bulk-destroy');
        Route::post('/{task}',                                      'TasksController@update')->name('update');
        Route::delete('/{task}',                                    'TasksController@destroy')->name('destroy');
    });
});
