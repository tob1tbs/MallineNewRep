<?php

// GENERAL ROUTES
Route::group(['middleware' => [], 'prefix' => LaravelLocalization::setLocale()], function () {
    Route::group(['prefix' => 'products', 'middleware' => []], function () {
        // PRODUCTS
        Route::get('/view/{product_id}', 'ProductsController@actionProductsView')->name('actionProductsView');
        Route::get('/{category_slug?}/{child_category_slug?}/{sub_category_slug?}', 'ProductsController@actionProductsIndex')->name('actionProductsIndex');
    });
});

// AJAX ROUTES
Route::group(['prefix' => 'products/ajax', 'middleware' => []], function () {
    Route::get('/quickview', 'ProductsAjaxController@ajaxProductQuickView')->name('ajaxProductQuickView');
    Route::post('/price', 'ProductsAjaxController@ajaxProductGetFilterUrl')->name('ajaxProductGetFilterUrl');
});