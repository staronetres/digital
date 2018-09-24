<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Gloudemans\Shoppingcart\Facades\Cart;


use App\Product;
use App\products;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    public function index() {
         $cartItems = Cart::content();
        return view('cart.index', compact('cartItems'));
    }

   public function addItem($id) {
         // echo $id;

         $products = products::find($id);

         Cart::add($id, $products->pro_name, 1, $products->pro_price, ['img' => $products->image, 'stock' => $products->stock]);

         return back();
    }

    public function destroy($id){
    // echo $id; 

     Cart::remove($id);

     return back();
    }


    public function  update(Request $request, $id){

        $qty = $request->qty;
      $proId = $request->proId;

      $rowId = $request->rowId; // for update

      Cart::update($rowId, $qty);
      // $cartItems = Cart::update($rowId, $qty);
      $cartItems = Cart::content();
      return view('cart.upCart', compact('cartItems'))->with('status', 'cart updated');
      // echo Cart::content(); // for display all new data of cart


      // $product = product::find($proId);
      // $stock = $product->stock;
     


      // if($qty<$stock) {
      //     $msg = 'Cart is updated';
      //    Cart::update($id, $request->qty);
      //    return back()->with('status', $msg);
      // } else{
      //    $msg = 'Please check your qty is more than product stock';
      //    return back()->with('error', $msg);
   
      // }

      }


}
