<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use Storage;
use App\pro_cat;
use Image;
use App\products_properties;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.home');
    }


    //   public function add_product(Request $request) {
    //     $file = $request->file('pro_img');
    //     echo $filename = $file->getClientOriginalName();


    //     $path = 'upload/images';
    //     $file->move($path, $filename);
       
    //     $products = new products;
    //     $products->pro_name = $request->pro_name;
    //     $products->pro_code = $request->pro_code;
    //     $products->pro_price = $request->pro_price;
    //     $products->pro_info = $request->pro_info;
    //     $products->spl_price = $request->spl_price;
    //     $products->pro_img = $filename;
    //     $products->save();


    //     return redirect()->action('AdminController@index')->with('status', 'Product uploaded');
    // }



    // public function add_product(Request $request) 

    // {


        // $formInput=$request->except('image');
//        validation
      
        // $this->validate($request,[
        //     'pro_name'=>'required',
        //     'pro_code'=>'required',
        //     'pro_price'=>'required',
        //     'pro_info'=>'required',
        //     'spl_price'=>'required',
        //     'image'=>'image|mimes:png,jpg,jpeg|max:10000'
        // ]);

        
      
        // $image=$request->image;
        // if($image){
        //     $imageName=$image->getClientOriginalName();
        //     $image->move('images',$imageName);
        //     $formInput['image']=$imageName;
        // }
        // $cat_data = DB::table('pro_cat')->get();
        // $categories=Category::all();
        // Products::create($formInput);
        // return redirect()->back();
        // return redirect()->action('AdminController@index')->with('status', 'Product uploaded');

// }






// }





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
        // $cat_data = DB::table('pro_cat')->get();
        // $categories=Category::all();
        Products::create($formInput);
        return redirect()->back();
        // return redirect()->action('AdminController@index')->with('status', 'Product uploaded');

}






}
