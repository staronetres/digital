@extends('front.master')
 @section('content')


 <main role="main">
<br>
<br>
<br>
      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Album example</h1>
          <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
          <p>
            <a href="#" class="btn btn-primary">Main call to action</a>
            <a href="#" class="btn btn-secondary">Secondary action</a>
          </p>
        </div>
      </section>

      <div class="album text-muted">

      <div class="container">
       
        <div class="row">
         @forelse($products as $product)
           
          <div class="card" style="width:30rem height: 20rem">
         
             <img src="{{url('images',$product->image)}}" class="card-img">
            
          <div class="card-body">

            <p class="card-text">


              {{$product->pro_name}}


            </p>
             

             


             
              

            <p id="price">

              @if($product->spl_price==0)
            <div class="d-flex justify-content-between align-items-center">
              <p class="card-text">${{$product->pro_price}}</p>
               <p class="card-text"></p>
     </div>
              @else
               



               <div class="d-flex justify-content-between align-items-center">
            <p class="" style="text-decoration:line-through; color:#333">${{$product->spl_price}}</p>
             <img src="{{URL::asset('dist/images/shop/sale.png')}}" alt="..."  style="width:60px">
             <p class="">${{$product->pro_price}}</p>

             
           </div>
              @endif

            </p>
             
            <button class="btn btn-primary btn-sm">
             <a href="{{url('/product_details')}}/<?php echo $product->id; ?>" class="add-to-cart addcart">View Product</a>
           </button>
            
            <button class="btn btn-primary btn-sm float-right">
             <a href="{{url('/cart/addItem')}}/<?php echo $product->id; ?>" class="add-to-cart addcart">Add ToCart<i class="fa fa-shopping-cart"></i></a>
            </button>
         
          </div>
          </div>
          @empty
            <h3>No Shirts</h3>
            @endforelse
          </div>
         </div>
         
        </div>

      </div>

    </main>
    @endsection

