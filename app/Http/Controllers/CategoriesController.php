<?php

namespace App\Http\Controllers;
use DB;
use App\Category;
use App\Product;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories=Category::all();
        return view('admin.category.index',compact(['categories','products']));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Category::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $products=Category::find($id)->products;
        
        //
        $categories=Category::all();
        return view('admin.category.index',compact(['categories','products']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
        //
    // }


     public function destroy($id)
    {
        //
          Category::findOrFail($id)->delete();

        return redirect()->back();
    }


    public function CatEditForm($id) {
        // $catid = $request->id;
        // $cats = DB::table('categories')->where('id', $categoryid)->get();
        $categories = Category::findOrFail($id);
        return view('admin.category.CatEditForm', compact('categories'));

    }


    public function editCat(Request $request) {

        $catid = $request->id;
        $catName = $request->cat_name;
        $status = $request->status;
        DB::table('pro_cat')->where('id', $catid)->update(['name' => $catName, 'status' => $status]);

        $cats = DB::table('pro_cat')->orderby('id', 'DESC')->get();

        return view('admin.categories', compact('cats'));
    }
}
