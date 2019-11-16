<?php
/**
 * Route the static pages
 */
Route::group(['as' => 'page.'], function () {
    Route::view('/', 'pages.home')->name('home');
});

Auth::routes();

Route::get('/signout', 'Auth\LoginController@logout')->name('signout');

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
        Route::get('/orders', 'Operator\OrderController@index')->name('orders');
        Route::get('/order/{number}', 'Operator\OrderController@show')->name('order');
        Route::patch('/order/{number}', 'Operator\OrderController@update')->name('order.update');
        Route::get('/customers', 'Operator\CustomerController@index')->name('customers');
        Route::get('/customer/{id}', 'Operator\CustomerController@show')->name('customer');
});

// routes for customer
Route::group([
    'middleware' => ['auth', 'roles:customer'],
    'as' => 'customer.', 'prefix' => 'my'
    ], function () {
        Route::get('/', 'Customer\MainController@index')->name('index');
        Route::resource('/order', 'Customer\OrderController');
        Route::get('/setting', 'Customer\SettingController@index')->name('setting.index');
        Route::post('/setting/changePassword', 'Customer\SettingController@changePassword')->name('setting.changePassword');
        Route::post('/setting/changeProfile', 'Customer\SettingController@changePassword')->name('setting.changeProfile');
});

//Routes for order
Route::get('/order', 'OrderController@index')->name('order');

Route::group([
    'middleware' => ['auth', 'roles:customer,admin,operator'],
    'as' => 'order.'
    ], function () {
        Route::post('/order/store', 'OrderController@store')->name('store');
        Route::get('/invoice/{number}', 'OrderController@invoice')->name('invoice');
});