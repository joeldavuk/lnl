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

    if(empty($items)) {
        return Response::view('error.404', [], 404);
    }
    return $items;

});
Route::bind('category', function ($slug) {
    $item = App\Categories::where('slug', $slug)->first();

    if (empty($item)) {
        //return Response::view('error.404', [], 404);
    }

    return $item;
});

Route::bind('subcategory', function ($slug, $route) {

   // $category = $route->parameter('category');
    $item = App\Categories::where('slug', $slug)->first();
    //if (empty($item))   return Response::view('error.404', [], 404);
    return $item; // shortcut of if
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
/*
Route::get('{one}/{two}', function($one, $two)
{
    return 'two: ' . $one . ', ' . $two;
});
Route::get('{one}', function($one)
{
    return 'one: ' . $one;
});
*/
Route::filter('cat', function($route,$request)
{

    // @todo cleanup this mess and add parent checks
    if(count($request->segments()) > 1) {
        $item = App\Categories::where('slug', $request->segments()[1])->first();
        if(empty($item)) {
            return Response::view('error.404', [], 404);
        }
    }
    if(count($request->segments()) < 2) {
        $item = App\Categories::where('slug', $request->segments()[0])->first();
        if(empty($item)) {
            return Response::view('error.404', [], 404);
        }
    }

});
Route::filter('item', function()
{

    //
});
//Route::get('/{slug-a}/{slug-b}','CategoryController@show');

Route::get('/{slug}.html', array('before' => 'item', 'uses' => 'ItemsController@show'));
//Route::get('/{slug}','CategoryController@show');
Route::get('/{category}/{subcategory?}', array('before' => 'cat', 'uses' => 'CategoryController@show'));
//Route::get('/{slug}.html','ItemsController@show');

//Route::model('cat', 'App\Categories');


/*
$router->resource('Items', 'ItemsController',[
    'names' => [
        'index' => 'items_path',
        'show' => 'item_index'
    ]
]);
*/

