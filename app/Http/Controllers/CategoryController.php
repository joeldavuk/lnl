<?php namespace App\Http\Controllers;

use App\Categories;
use App\Category_Relationship;
use App\Item_Relationship;
use App\Items;
use Illuminate\Routing\Controller;
use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class CategoryController extends Controller {

    public function __construct(Categories $item) {

        $this->item = $item;


    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
     *
     *
     */
	public function index()
	{
		//
        //$categories = ['test','test1'];
        $item = $this->item->get();

        //dd($categories);

        return view('templates.category-list',compact('item'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return view('template.category-create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request, Categories $items)
	{
		$items->create($request->all());

        return redirect()->route('items_index');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id varchar $name
	 * @return Response
     *
	 */
	public function show(Categories $item, Request $request)
	{
        //$categories = Categories::find($id);
       // $categories = Categories::whereSlug($slug)->first();

        //dd($item);
       // dd($item->whereSlug($slug)->get());
        //dd(Items::find(1)->meta);
        // $item->meta = $item->;
        //dd(Items::find(1)->meta);
       // echo $item->count();
       // die();

       // $test = $item->with('categoryChildren')->with('categoryData')-with('itemData')->with('items');


        $item = Categories::with(array('itemData.items'))->where('slug','test2')->paginate(1);

        $itemCollection = Item_Relationship::paginate(20);
        dd($itemCollection);

        $users = Paginator::make($item->items, $item->totalItems, 50);

        dd($users);

        foreach($item as $b) {
            print_r($b);
        }

       // $x = Items::whereIn('id',$itemArray)->get();
dd($item->itemData()->items());
       //dd($x);

        //dd($item->id);

       // $items = Categories::->with('itemData','categoryChildren')->where('id',$item->id)->get();



        if(empty($item->exists)) {

          //  return view('error.404',[], [], 404);
        }


        return view('templates.category', compact('item'));



       // return view('templates.category', compact('item'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Category $item)
	{

        return view('templates.category-edit', compact('item'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Categories $item, Request $request)
	{

        //$category = $this->category->whereId($slug)->first();

        //$this->category->title =  $request->get('title');
        //$this->category->fill(['title' => $request->get('title')])->save();
        $item->fill($request->input())->save();

		return redirect('test');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
