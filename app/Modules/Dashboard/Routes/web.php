<?php

// GENERAL ROUTES
Route::group(['middleware' => [], 'prefix' => LaravelLocalization::setLocale()], function () {
    Route::group(['prefix' => 'dashboard', 'middleware' => ['checkAdmin']], function () {
        Route::get('/', 'DashboardController@actionDashboardIndex')->name('actionDashboardIndex');
    });
});

// AJAX ROUTES
Route::group(['prefix' => 'dashboard/ajax', 'middleware' => []], function () {
	Route::post('/contact', 'DashboardAjaxController@ajaxDashboardContact')->name('ajaxDashboardContact');
	Route::post('/navigation', 'DashboardAjaxController@ajaxDashboardNavigation')->name('ajaxDashboardNavigation');
	Route::post('/slider/add', 'DashboardAjaxController@ajaxDashboardSliderAdd')->name('ajaxDashboardSliderAdd');
	Route::post('/product/add', 'DashboardAjaxController@ajaxDashboardProductAdd')->name('ajaxDashboardProductAdd');
	Route::post('/product/delete', 'DashboardAjaxController@ajaxProductDelete')->name('ajaxProductDelete');
	Route::post('/slider/delete', 'DashboardAjaxController@ajaxSliderDeletePhoto')->name('ajaxSliderDeletePhoto');
});