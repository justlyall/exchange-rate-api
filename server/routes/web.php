<?php

Route::get('/', function() {
    return 'Server is running';
});

Route::group(['prefix' => 'api/v1/'], function() {
    Route::post('purchase', 'PurchaseCurrencyController@purchase');
    Route::get('currencies', 'CurrenciesController@get');
    Route::get('orders', 'OrdersController@get');
});
