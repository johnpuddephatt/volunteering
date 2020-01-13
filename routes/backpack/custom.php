<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes

    CRUD::resource('opportunity','OpportunityCrudController');
    Route::post ( 'opportunity/{id}/renew', 'OpportunityCrudController@renew' );

    CRUD::resource('category','CategoryCrudController');
    CRUD::resource('suitability','SuitabilityCrudController');
    CRUD::resource('accessibility','AccessibilityCrudController');
    CRUD::resource('location','LocationCrudController');

    CRUD::resource('organisation','OrganisationCrudController');
    Route::get('organisation/{id}/activate','OrganisationCrudController@activation');
    Route::post('organisation/{id}/activate','OrganisationCrudController@activate');
    Route::post('organisation/{id}/deactivate','OrganisationCrudController@deactivate');
    Route::post('organisation/{id}/sendemailverification','OrganisationCrudController@sendEmailVerification');

}); // this should be the absolute last line of this file
