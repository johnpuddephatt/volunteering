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


Auth::routes(['verify' => true]);

Route::get('/registration', 'Auth\RegisterController@showRegistrationForm')->name('registration.get');
Route::post('/registration', 'Auth\RegisterController@showRegistrationForm')->name('registration.post');

Route::post('/register', 'Auth\RegisterController@register')->name('register');

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
  Route::get('/account', 'OrganisationController@account')->name('organisation.account');
  Route::post('/account', 'OrganisationController@update')->name('organisation.update');
});

Route::group(['middleware' => ['auth','verified','activated']], function () {
    Route::get('/dashboard', 'OrganisationController@dashboard')->name('organisation.dashboard');

    Route::get('/opportunity/create', 'OpportunityController@new')->name('opportunity.new');
    Route::post('/opportunity/create', 'OpportunityController@store')->name('opportunity.store');
    Route::get('/opportunity/edit/{hashid}', 'OpportunityController@edit')->name('opportunity.edit');
    Route::post('/opportunity/edit/{hashid}', 'OpportunityController@update')->name('opportunity.update');
    Route::get('/opportunity/renew/{hashid}', 'OpportunityController@renew')->name('opportunity.renew');
    Route::get('/opportunity/delete/{hashid}', 'OpportunityController@delete')->name('opportunity.delete');
});

Route::get('/opportunities', 'OpportunityController@index')->name('opportunity.index');
Route::post('/opportunities', 'OpportunityController@postcode')->name('opportunity.postcode');
Route::get('/opportunities/all', 'OpportunityController@reset')->name('opportunity.reset');
Route::get('/opportunities/{slug}', 'OpportunityController@single')->name('opportunity.single');

Route::get('/enquire', 'EnquiryController@new')->name('enquiry.new');
Route::post('/enquire', 'EnquiryController@store')->name('enquiry.store');


// Route::get('/search', 'OpportunityController@index')    # shows all results
// Route::get('/search/location/{lat}/{long}/', 'OpportunityController@locationSearch');
// Route::get('/search/suitability/{category k}/', 'OpportunityController@locationSearch');
// Route::get('/search/suitability/{slug}/', 'OpportunityController@locationSearch');
