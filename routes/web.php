<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('Base.index_home');
});
Route::get('/login', 'AuthenticationController@login')->name('auth.login');
Route::post('/loginProcess', 'AuthenticationController@loginProcess')->name('auth.loginProcess');
Route::get('/logout', 'AuthenticationController@logout')->name('auth.logout');

Route::get('/register_takers', 'AuthenticationController@register_takers')->name('auth.register_takers');
Route::post('/register_takersPro', 'AuthenticationController@register_takersPro')->name('auth.register_takersPro');

Route::get('/register_owner', 'AuthenticationController@register_owner')->name('auth.register_owner');
Route::post('register_ownerPro', 'AuthenticationController@register_ownerPro')->name('auth.register_ownerPro');

Route::get('/home', 'BasePageController@index_home')->name('Base.index_home');
Route::get('/checkin/{id}', 'BasePageController@checkin')->name('Base.checkin');
Route::get('/search', 'BasePageController@search')->name('Base.search');
Route::get('/concert', 'BasePageController@concert')->name('Base.concert');
Route::get('/searchConcert', 'BasePageController@searchConcert')->name('Base.searchConcert');
Route::get('/seminar', 'BasePageController@seminar')->name('Base.seminar');
Route::get('/searchSeminar', 'BasePageController@searchSeminar')->name('Base.searchSeminar');


Route::group(['middleware' => 'auth.login'], function () {

    Route::group(['prefix' => 'takers'], function (){
        Route::get('/', 'TakersController@index')->name('takers.index');
        Route::get('/checkin/{id}', 'TakersController@checkin')->name('takers.checkin');
        Route::post('/ticketPro', 'TakersController@ticketPro')->name('takers.ticketPro');
        Route::get('/bookingreq', 'TakersController@bookingreq')->name('takers.bookingreq');
        Route::post('/payment', 'TakersController@payment')->name('takers.payment');
        Route::get('/pay/{id}', 'TakersController@pay')->name('takers.pay');
        Route::get('/search', 'TakersController@search')->name('takers.search');
        Route::get('/concert', 'TakersController@concert')->name('takers.concert');
        Route::get('/searchConcert', 'TakersController@searchConcert')->name('takers.searchConcert');
        Route::get('/seminar', 'TakersController@seminar')->name('takers.seminar');
        Route::get('/searchSeminar', 'TakersController@searchSeminar')->name('takers.searchSeminar');
    });

    Route::group(['prefix' => 'owners'], function () {
        Route::get('/', 'EventOwnerController@index')->name('owners.index');
        Route::get('/create', 'EventOwnerController@create')->name('owners.create');
        Route::post('/store', 'EventOwnerController@store')->name('owners.store');
        Route::get('/edit/{id}', 'EventOwnerController@edit')->name('owners.edit');
        Route::post('/update/{id}', 'EventOwnerController@update')->name('owners.update');
        Route::get('/detail/{id}', 'EventOwnerController@detail')->name('owners.detail');
        Route::get('/status/{id}', 'EventOwnerController@status')->name('owners.status');
        Route::get('/delete/{id}', 'EventOwnerController@delete')->name('owners.delete');
        Route::post('/restore', 'EventOwnerController@restore')->name('owners.restore');
        Route::get('/bookingList', 'EventOwnerController@bookingList')->name('owners.bookingList');
        Route::get('/bookingCode', 'EventOwnerController@bookingCode')->name('owners.bookingCode');
        Route::get('/findCode', 'EventOwnerController@findCode')->name('owners.findCode');
        Route::get('/statChange{id}', 'EventOwnerController@statChange')->name('owners.statChange');
        Route::get('/charts', 'EventOwnerController@charts')->name('owners.charts');
    });
});


