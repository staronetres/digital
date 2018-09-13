<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Storage;

use Image;

use App\Category;
use App\about;

use App\Product;

class ProductsController extends Controller
{
    //
      public function index()
    {
        $products=Product::all();
        return view('admin.product.index',compact('products'));
    }


     public function create()
    {
        $categories=Category::pluck('name','id');
        return view('admin.product.create',compact('categories'));
        
        // return view('admin.product.create');
    }




    public function store(Request $request) 

    {


        $formInput=$request->except('image');
//        validation
      
        $this->validate($request,[
            'pro_name'=>'required',
            'pro_code'=>'required',
            'pro_price'=>'required',
            'pro_info'=>'required',
            'spl_price'=>'required',
            'image'=>'image|mimes:png,jpg,jpeg|max:10000'
        ]);

        
      
        $image=$request->image;
        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('images',$imageName);
            $formInput['image']=$imageName;
        }
     
        Product::create($formInput);
        // return redirect()->route('admin.index');
        return redirect()->back();

}


public function show($id)
    {
        $product = Product::findOrFail($id);
        // $blog = Blog::whereSlug($slug)->first();
        return view('product.show', compact('products'));
        // var_dump($product);
    }


}
