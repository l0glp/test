<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'as' => 'index',
    'uses' => 'ApplicationController@index'
]);

//PRODUCTS

Route::get('/products/index', [
    'as' => 'products.index',
    'uses' => 'ApplicationController@productsIndex'
]);
//LOAD PRODUCTS
Route::get('/products/load',[
        'as' => 'products.load',
        'uses' => 'ApplicationController@loadProducts'
]);
Route::post('/products/load/save',[
    'as' => 'products.loadPost',
    'uses' => 'ApplicationController@loadProductsPost'
]);
Route::get('/products/update', [
    'as' => 'products.update',
    'uses' => 'ApplicationController@updateTableProd'
]);

//CLIENTS
Route::get('/clients/index', [
    'as' => 'clients.index',
    'uses' => 'ApplicationController@clientsIndex'
]);
// EDIT CLIENTS
Route::get('/clients/detail/{id?}', [
    'as' => 'clients.detail',
    'uses' => 'ApplicationController@clientsDetail'
]);
//SAVE EDIT CLIENTS
Route::post('/clients/detail/save', [
    'as' => 'clients.detailPost',
    'uses' => 'ApplicationController@clientsDetailPost'
]);
//DELETE CLIENTS
Route::get('/clients/index/delete/{id}', [
    'as' => 'clients.delete',
    'uses' => 'ApplicationController@clientsDelete'
]);

Route::get('/clients/update', [
    'as' => 'clients.update',
    'uses' => 'ApplicationController@updateTableClients'
]);


