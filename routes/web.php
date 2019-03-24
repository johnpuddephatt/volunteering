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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], function () {
    Route::get('/', 'OrganisationController@dashboard')->name('dashboard');

    Route::get('/opportunity/create', 'OpportunityController@form')->name('opportunity.form');
    Route::post('/opportunity/create', 'OpportunityController@store')->name('opportunity.store');
    Route::get('/opportunity/edit/{hashid}', 'OpportunityController@update')->name('opportunity.update');
    Route::get('/opportunity/delete/{hashid}', 'OpportunityController@delete')->name('opportunity.delete');
});

Route::get('/opportunity/{slug}', 'OpportunityController@show')->name('opportunity.show');
