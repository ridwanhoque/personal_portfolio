<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database;

use App\Category;
use Session;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$categories = Category::all();
		
		return view('admin/category/index',['categories'=> $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/category/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required|unique:categories',
			'description' => 'required',
		]);
		
		Category::create($request->except('_token'));
		
		return redirect('/category')->with(['message'=>'Category created successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$category_by_id = Category::findOrFail($id);
        return view('admin.category.show',['category_by_id'=>$category_by_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category_by_id = Category::findOrFail($id);
		return view('admin.category.edit',['category_by_id'=>$category_by_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
	
		$this->validate($request, [
			'name' => 'required',
			'description' => 'required',
		]);
		
	
        $category_by_id = Category::find($id);
		$category_by_id->update($request->except('_token'));
		return redirect('/category')->with(['message'=>'Category updated successfully!']);
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category_by_id = Category::with('projects')->first('id', $id);

		if($category_by_id->projects->count() <= 0){
			$category_by_id->delete();

			return redirect()
                ->route('category.index')
                ->with('message', 'Category deleted successfully!');
		}

        return redirect()
            ->route('category.index')
            ->with('error','Category can not be deleted!');
    }
}
