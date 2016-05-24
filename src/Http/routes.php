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
Route::group(['middleware' => 'web'], function() {
    /**
     * Switch between the included languages
     */
     Route::resource('categories', 'Kun\Categories\Http\Controllers\CategoryController', [
         'names' => [
             'index'   => 'categories.index',
             'create'  => 'categories.create',
             'update'  => 'categories.update',
             'edit'    => 'categories.edit',
             'show'    => 'categories.show',
             'destroy' => 'categories.destroy',
             'store'   => 'categories.store',
         ]
     ]);
     Route::get('categories/{id}/moveUp', 'Kun\Categories\Http\Controllers\CategoryController@moveUp')->name('categories.moveUp');
     Route::get('categories/{id}/moveDown', 'Kun\Categories\Http\Controllers\CategoryController@moveDown')->name('categories.moveDown');
});
