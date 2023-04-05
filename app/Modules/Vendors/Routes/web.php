<?php

// GENERAL ROUTES
Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Route::group(['prefix' => 'vendors', 'middleware' => []], function () {
        Route::get('/guide', 'VendorsController@actionVendorsGuide')->name('actionVendorsGuide');
        Route::get('/view/{id}', 'VendorsController@actionVendorsView')->name('actionVendorsView');
        Route::get('/', 'VendorsController@actionVendorsIndex')->name('actionVendorsIndex');
    });
});

// AJAX ROUTES
Route::group(['prefix' => 'vendors/ajax', 'middleware' => []], function () {
    
});