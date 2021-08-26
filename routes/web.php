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

Route::post('/register-redirect', function() {
  return redirect()->route('registration.redirect');
})->name('registration.redirect');

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('registration.get');
Route::post('/register', 'Auth\RegisterController@register')->name('register');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/specialised', 'NeedController@specialised')->name('specialised');


Route::group(['middleware' => ['auth']], function () {
  Route::get('/account', 'OrganisationController@account')->name('organisation.account');
  Route::post('/account', 'OrganisationController@update')->name('organisation.update');
});


Route::group(['middleware' => ['auth','verified','activated']], function () {
    Route::get('/dashboard', 'OrganisationController@dashboard')->name('organisation.dashboard');
    Route::get('/dashboard/cards', 'OrganisationController@cards')->name('organisation.cards');

    Route::get('/opportunity/create', 'OpportunityController@new')->name('opportunity.new');
    Route::post('/opportunity/create', 'OpportunityController@store')->name('opportunity.store');
    Route::get('/opportunity/edit/{hashid}', 'OpportunityController@edit')->name('opportunity.edit');
    Route::post('/opportunity/edit/{hashid}', 'OpportunityController@update')->name('opportunity.update');
    Route::get('/opportunity/renew/{hashid}', 'OpportunityController@renew')->name('opportunity.renew');
    Route::get('/opportunity/delete/{hashid}', 'OpportunityController@delete')->name('opportunity.delete');

    Route::get('/need/create', 'NeedController@new')->name('need.new');
    Route::post('/need/create', 'NeedController@store')->name('need.store');
    Route::get('/need/edit/{hashid}', 'NeedController@edit')->name('need.edit');
    Route::post('/need/edit/{hashid}', 'NeedController@update')->name('need.update');
    Route::get('/need/delete/{hashid}', 'NeedController@delete')->name('need.delete');
    Route::get('/need/enquiries/{hashid}', 'NeedController@enquiries')->name('need.enquiries');
    Route::get('/enquiry/delete/{hashid}', 'EnquiryController@delete')->name('enquiry.delete');

    Route::post('/organisation/covid', 'OrganisationController@updateCovid')->name('organisation.updateCovid');

});

Route::get('/organisation/{slug}', 'OrganisationController@single')->name('organisation.single');
Route::get('/organisation', 'OrganisationController@index')->name('organisation.index');
Route::post('/organisation', 'OrganisationController@postcode')->name('organisation.postcode');

Route::get('/opportunities', 'OpportunityController@index')->name('opportunity.index');
Route::post('/opportunities', 'OpportunityController@postcode')->name('opportunity.postcode');
Route::get('/opportunities/all', 'OpportunityController@reset')->name('opportunity.reset');
Route::get('/opportunities/{slug}', 'OpportunityController@single')->name('opportunity.single');

Route::get('/enquire', 'EnquiryController@new')->name('enquiry.new');
Route::post('/enquire', 'EnquiryController@store')->name('enquiry.store');

Route::get('{page}/{subs?}', ['uses' => 'PageController@index'])
    ->where(['page' => '^(((?=(?!admin))(?=(?!\/)).))*$', 'subs' => '.*']);
