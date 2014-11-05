<?php namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Routing\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

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




        return view('templates.category', compact('item'));
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
