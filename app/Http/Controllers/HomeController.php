<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\DB;

use App\wishList;
use App\recommends;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        return view('front.home');
        // $this->middleware('admin/home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('home');
    // }


    public function index()
    {
        $products=Product::all();
        $categories=Category::all();
        // return view('front.home',compact('products'));
        return view('front.home');
    }



     public function shop()
    {
        // $Products = DB::table('products')->get();
        // return view('front.shop',compact('Products'));

        $products=Product::all();
        $categories=Category::all();
        return view('front.shop',compact(['categories','products']));
    }


    public function contact()
    {
        return view('front.contact');
    }


    public function product_details($id) {

      
        $Products = DB::table('products')->where('id', $id)->get();
        return view('front.product_details', compact('Products'));
    }

    public function search(Request $request) {
        $search = $request->search_data;
        if ($search == '') {
            return view('front.home');
        } else {
            $Products = DB::table('products')->where('pro_name', 'like', '%' . $search . '%')->paginate(12);
            return view('front.shop', ['msg' => 'Results: ' . $search], compact('Products'));
        }
    }





}