<?php
/**
 * Route the static pages
 */
Route::group(['as' => 'page.'], function () {
    Route::view('/', 'pages.home')->name('home');
});

// routes for guest
Route::get('/order', 'OrderController@index')->name('order');

Auth::routes();

// routes for admin
Route::group([
    'middleware' => ['auth', 'roles:admin'],
    'as' => 'admin.', 'prefix' => 'management'
    ], function () {
        Route::get('/', 'Admin\MainController@index')->name('index');
        Route::resource('/administrator', 'Admin\AdministratorController');
        Route::resource('/operator', 'Admin\OperatorController');
        Route::resource('/customer', 'Admin\CustomerController');
        Route::resource('/price', 'Admin\PriceController');
});

// routes for operator
Route::group([
    'middleware' => ['auth', 'roles:operator'],
    'as' => 'operator.', 'prefix' => 'dashboard'
    ], function () {
        Route::get('/', 'Operator\MainController@index')->name('index');
});

// routes for customer
Route::group([
    'middleware' => ['auth', 'roles:customer'],
    'as' => 'customer.', 'prefix' => 'my'
    ], function () {
        Route::get('/', 'Customer\MainController@index')->name('index');
});