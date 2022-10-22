<?php

// GENERAL ROUTES
Route::group(['middleware' => [], 'prefix' => LaravelLocalization::setLocale()], function () {
    Route::get('/waiting', 'DashboardController@actionDashboardWaiting')->name('actionDashboardWaiting');
    
    Route::group(['prefix' => 'dashboard', 'middleware' => ['checkAdmin']], function () {
        Route::get('/', 'DashboardController@actionDashboardIndex')->name('actionDashboardIndex');
        Route::get('/setup', 'DashboardController@actionDashboardSetup')->name('actionDashboardSetup');
    });
});

// AJAX ROUTES
Route::group(['prefix' => 'dashboard/ajax', 'middleware' => []], function () {
	
	Route::post('/setup', 'DashboardAjaxController@ajaxDashboardSetup')->name('ajaxDashboardSetup');
	Route::post('/contact', 'DashboardAjaxController@ajaxDashboardContact')->name('ajaxDashboardContact');
	Route::post('/navigation', 'DashboardAjaxController@ajaxDashboardNavigation')->name('ajaxDashboardNavigation');
	Route::post('/slider/add', 'DashboardAjaxController@ajaxDashboardSliderAdd')->name('ajaxDashboardSliderAdd');
	Route::post('/product/add', 'DashboardAjaxController@ajaxDashboardProductAdd')->name('ajaxDashboardProductAdd');
	Route::post('/product/delete', 'DashboardAjaxController@ajaxProductDelete')->name('ajaxProductDelete');
	Route::get('/product/get', 'DashboardAjaxController@ajaxProductGet')->name('ajaxProductGet');
	Route::post('/slider/delete', 'DashboardAjaxController@ajaxSliderDeletePhoto')->name('ajaxSliderDeletePhoto');
});

Route::group(['prefix' => 'dashboard/api', 'middleware' => []], function () {
	Route::post('/create', 'DashboardAjaxController@ajaxApiCreateData')->name('ajaxApiCreateData')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
});