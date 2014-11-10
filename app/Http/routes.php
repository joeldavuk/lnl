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



Route::bind('category', function () {

    if(!Request::segment(2)) {
        /**
    $item = App\Categories::with(array('categories' => function($query)
        {
            $query->where('category_relationship.type_of', '=', 'child');
        }))->where('slug', Request::segment(1))->first();


    return $item;
         * **/
    }
});

Route::bind('subcategory', function () {

    if(Request::segment(2)) {
    $item = App\Categories::with(array('categoryRelations' => function($query)
        {
            $query->where('category_relationship.type_of', '=', 'child')->with('categoryData');
        }))->where('slug', Request::segment(2))->first();


    return $item;
    }
});


Route::get('/','HomeController@index');

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
    /**
    //subcategory
    if(count($request->segments()) > 1) {


        $item = App\Categories::with(array('itemData','categories' => function($query)
            {
               // $query->where('type_of', 'like', '%category%');
                $query->where('category_relationship.type_of', '=', 'child');

            }))->where('slug', $request->segments()[1])->first();



        //get all children of the sub category

        $children = DB::table('categories')
            ->join('category_relationship', 'category_id', '=', 'categories.id')
            ->join('items', 'category_id', '=', 'categories.id')
            ->where('categories.slug', '=',  $request->segments()[1])
            ->where('category_relationship.type_of', '=', 'child')
            ->get();







        foreach($children as $child) {
            $child_ids[] = $child->base_category_id;
        }

        $item = DB::table('categories')
            ->whereIn('categories.id',$child_ids)
            ->get();



        //$queries = DB::getQueryLog();
        //$last_query = end($queries);

        if(empty($item)) {
            return Response::view('error.404', [], 404);
        }
    }
    //single category
    if(count($request->segments()) < 2) {
        $item = App\Categories::where('slug', $request->segments()[0])->first();
        if(empty($item)) {
            return Response::view('error.404', [], 404);
        }
    }
     * */

});
Route::filter('item', function()
{

    //
});
//Route::get('/{slug-a}/{slug-b}','CategoryController@show');

Route::get('/{slug}.html', array('before' => 'item', 'uses' => 'ItemsController@show'));
//Route::get('/{slug}','CategoryController@show');
Route::get('{category}/{subcategory?}', array('before' => 'cat', 'uses' => 'CategoryController@show'));
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

