<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Storage;
use Image;
use App\Category;
use App\about;
use App\products_properties;
use App\Product;

use App\products;
class ProductsController extends Controller
{
    //
    //   public function index()
    // {
    //     $products=Product::all();
    //     return view('admin.product.index',compact('products'));
    // }
    //   public function index()
    // {
         // $cartItems = Cart::content();
        // $Products = DB::table('categories')->rightJoin('products', 'products.category_id', '=', 'categories.id')->get(); // now we are fetching all products
        // return view('home', compact('cartItems'));
    //     $Products=Product::all();
    //     return view('admin.product.index',compact('Products'));
    // }
      public function index()
    {
        $Products = DB::table('categories')->rightJoin('products', 'products.category_id', '=', 'categories.id')->get(); // now we are fetching all products
        // now we are fetching all products and categories
        $Products=Product::all();
        return view('admin.product.index',compact('Products'));
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
            // $image->resize(238, 238)->move('images',$imageName);
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
public function ProductEditForm($id) {
        //$pro_id = $reqeust->id;
        // $Products = DB::table('products')->where('id', '=', $id)->get(); // 
        $Products = Product::findOrFail($id);
        $categories = Category::all();

        $prots = products_properties::all();
        // $categories = Category::pluck('name', 'id');
        // $categories = Category::findOrFail($id);
        // $Products::findOrFail($id)->update($request->all());
        // $Products = Product::all();
        // now we are fetching all products
        return view('admin.product.editProducts', compact('Products', 'categories', 'prots'));
    }
    public function edit($id)
    {
        //
    }
public function editProducts(Request $request, $id) {
        // $pro_id = $reqeust->id;


        $Products = Product::findOrFail($id);
        // $Products = DB::table('products')->where('id', '=', $id)->get();
        // $category = Category::findOrFail($id); // now we are fetching all products
        // Product::findOrFail($id)->update($request->all());
        $proid = $request->id;
        $pro_name = $request->pro_name;
        $category_id = $request->cat_id;
        $pro_code = $request->pro_code;
        $pro_price = $request->pro_price;
        $pro_info = $request->pro_info;
        $spl_price = $request->spl_price;
      
        
        DB::table('products')->where('id', $proid)->update([
            'pro_name' => $pro_name,
            'category_id' => $category_id,
            'pro_code' => $pro_code,
            'pro_price' => $pro_price,
            'pro_info' => $pro_info,
            'spl_price' => $spl_price
           
        ]);
        // $Product::findOrFail($id)->update($request->all());
        // return view('admin.product.update', compact('product','category'));
        return view('admin.product.index', compact('Products','category'));
        // return redirect()->back();
    }
    public function ImageEditForm($id) {
        $Products = Product::findOrFail($id);
        // $Products = DB::table('products')->where('id', '=', $id)->get(); // now we are fetching all products
        return view('admin.product.ImageEditForm', compact('Products'));
    }
// public function update(Request $request, $id)
//     {
//         //
//         $Products::findOrFail($id)->update($request->all());
//         return view('admin.product', compact('Products'));
//     }
public function editProImage(Request $request) {
        $proid = $request->id;
        $image=$request->image;
        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('images',$imageName);
            $formInput['image']=$imageName;
        }
       
        DB::table('products')->where('id', $proid)->update(['image' => $imageName]);
       
        return redirect()->back();
        
    }
     public function destroy($id)
    {
        //
          Product::findOrFail($id)->delete();
        return redirect()->back();
    }
    // displaying cats in edit form of products
    public function allCategories($id)
    {
       // $categories = DB::table('categories')->get();
       $categories = Categories::all();
       return view('admin.product.index',compact('categories'));
    }
    public function addProperty($id) {
        $Products = Product::findOrFail($id);
        // $Products = DB::table('products')->where('id', '=', $id)->get();
        return view('admin.product.addProperty', compact('Products'));
    }
    public function sumbitProperty(Request $request){
    $properties = new products_properties;
    $properties->pro_id = $request->pro_id;
    $properties->size = $request->size;
    $properties->color = $request->color;
    $properties->p_price = $request->p_price;
    $properties->save();
    // return redirect('admin.product.ProductEditForm');
    // return redirect('admin.product.index');
    return redirect()->back();
   
  }


  public function editProperty(Request $request){
         $uptProts = DB::table('products_properties')
          ->where('pro_id', $request->pro_id)
          ->where('id', $request->id)
          ->update($request->except('_token'));
          if($uptProts){
          return back()->with('msg', 'updated');
        }else {
        return back()->with('msg', 'check value again');
      }
  }
}