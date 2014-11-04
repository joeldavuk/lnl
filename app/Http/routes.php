<?php
/**
 * Created by PhpStorm.
 * User: w
 * Date: 27/10/14
 * Time: 20:24
 */

//Route::model('categories','App\Categories');




Route::bind('slug', function($slug) {

    $items = App\Items::with('meta')->where('slug',$slug)->first();

   // $items->with('meta')-first();


    if(empty($items)) {
        return View::make('404');
    }
    return $items;

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
Route::get('/{slug}','ItemsController@show');

//Route::model('cat', 'App\Categories');


/*
$router->resource('Items', 'ItemsController',[
    'names' => [
        'index' => 'items_path',
        'show' => 'item_index'
    ]
]);
*/

