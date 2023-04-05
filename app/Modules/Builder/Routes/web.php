<?php

// GENERAL ROUTES
Route::group(['middleware' => [], 'prefix' => LaravelLocalization::setLocale()], function () {
    Route::group(['prefix' => 'builder', 'middleware' => []], function () {
        Route::get('/', 'BuilderController@actionBuilderIndex')->name('actionBuilderIndex');
        Route::get('/success', 'BuilderController@actionBuilderSuccess')->name('actionBuilderSuccess');
    });
});

// AJAX ROUTES
Route::group(['prefix' => 'builder/ajax', 'middleware' => []], function () {
    Route::get('/check', 'BuilderAjaxController@ajaxCheckSubdomain')->name('ajaxCheckSubdomain');
    Route::post('/submit', 'BuilderAjaxController@ajaxBuilderSubmit')->name('ajaxBuilderSubmit');
});

// API ROUTES
Route::group(['prefix' => 'builder/api', 'middleware' => []], function () {
    Route::post('/parameters', 'BuilderAjaxController@ajaxBuilderParameterApi')->name('ajaxBuilderParameterApi')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
});