<?php

// GENERAL ROUTES
Route::group(['prefix' => 'blog', 'middleware' => []], function () {
    Route::get('/', 'BlogController@actionBlogIndex')->name('actionBlogIndex');
    Route::get('/{slug}', 'BlogController@actionBlogView')->name('actionBlogView');
});