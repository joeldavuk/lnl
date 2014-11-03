<?php
/**
 * Created by PhpStorm.
 * User: w
 * Date: 27/10/14
 * Time: 20:24
 */

//Route::model('categories','App\Categories');

/*
Route::bind('item', function($slug) {

    return App\Items::where('slug', $slug)->whereSlug($slug)->first();

});

/*
Route::get('/','CategoryController@index');
Route::get('/test','CategoryController@index');
Route::get('/{cat}/{slug}','CategoryController@show');
Route::get('/category/edit/{id}','CategoryController@edit');
Route::patch('/category/{id}','CategoryController@update');
*/
//Route::model('slug','Items');
//Route::model('item', 'App\Items');
//Route::get('/{cat}/{item}','ItemsController@show');

//Route::model('cat', 'App\Categories');


$router->resource('Items', 'ItemsController',[
    'names' => [
        'index' => 'items_path',
        'show' => 'item_index'
    ]
]);

