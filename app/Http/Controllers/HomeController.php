<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Product;

use App\reviews;
use App\Category;
use Illuminate\Support\Facades\DB;
use App\alt_images;
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

        $proInfo = alt_images::all();
         


        $reviews = reviews::all();
       

        $Products = DB::table('products')->where('id', $id)->get();
        return view('front.product_details', compact('Products','proInfo','reviews','count_reviews'));
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


     public function selectSize(Request $request) {
        // echo $request->proDum; // see it in console

        $proDum = $request->proDum;
        $size = $request->size;

        $s_price = DB::table('products_properties')->where('pro_id', $proDum)
        ->where('size', $size)
        ->get();


        foreach($s_price as $sPrice){
            echo "US $ " .$sPrice->p_price;?>

             <input type="hidden" value="<?php echo $sPrice->p_price;?>" name="newPrice"/>
             <div style="background:<?php echo $sPrice->color;?>; width:40px; height:40px"></div>
             <?php
        }
    }


    public function newArrival(){
                  $products = DB::table('products')->where('new_arrival', 1)->paginate(6); // now we are fetching all products
                  return view('front.newArrival', compact('products'));

    }



     public function addReview(Request $request){
      DB::table('reviews')->insert(
    ['person_name' => $request->person_name, 'person_email' => $request->person_email,
  'review_content' => $request->review_content,
  'created_at' => date("Y-m-d H:i:s"),'updated_at' =>date("Y-m-d H:i:s")]
      );
      return back();
    }


}
