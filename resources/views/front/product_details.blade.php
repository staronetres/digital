@extends('front.master')

@section('content')
<br>
<br>
<br>
<br>

<div class="row">
          <div class="product-images col-lg-6">
          @foreach($Products as $product)
            <div class="ribbon-info text-uppercase">Fresh</div>
            <div class="ribbon-primary text-uppercase">Sale</div>
            <div data-slider-id="1" class="owl-carousel items-slider owl-drag">
              <div class="item"><img src="<?php echo $product->image;?>" alt="shirt"></div>
              <div class="item"><img src="img/shirt-black.png" alt="shirt"></div>
              <div class="item"><img src="img/shirt-green.png" alt="shirt"></div>
              <div class="item"><img src="img/shirt-red.png" alt="shirt"></div>
            </div>
            <div data-slider-id="1" class="owl-thumbs d-flex align-items-center justify-content-center">
              <button class="owl-thumb-item"><img src="img/shirt-small.png" alt="shirt"></button>
              <button class="owl-thumb-item active"><img src="img/shirt-black-small.png" alt="shirt"></button>
              <button class="owl-thumb-item"><img src="img/shirt-green-small.png" alt="shirt"></button>
              <button class="owl-thumb-item"><img src="img/shirt-red-small.png" alt="shirt"></button>
            </div>

          </div>
          <div class="details col-lg-6">
            <h2>Lose Oversized Shirt</h2>
            <div class="d-flex align-items-center justify-content-between flex-column flex-sm-row">
              <ul class="price list-inline no-margin">
                <li class="list-inline-item current">{{$product->pro_price}}</li>
                <li class="list-inline-item original">{{$product->spl_price}}</li>
                <li class="">{{$product->pro_code}}</li>
              </ul>
              <div class="review d-flex align-items-center">
                <ul class="rate list-inline">
                  <li class="list-inline-item"><i class="fa fa-star-o text-primary"></i></li>
                  <li class="list-inline-item"><i class="fa fa-star-o text-primary"></i></li>
                  <li class="list-inline-item"><i class="fa fa-star-o text-primary"></i></li>
                  <li class="list-inline-item"><i class="fa fa-star-o text-primary"></i></li>
                  <li class="list-inline-item"><i class="fa fa-star-o text-primary"></i></li>
                </ul><span class="text-muted">No reviews</span>
              </div>
            </div>
            <p>{{$product->pro_info}}</p>
            <div class="d-flex align-items-center justify-content-center justify-content-lg-start">
              <div class="quantity d-flex align-items-center">
                <div class="dec-btn">-</div>
                <input type="text" value="1" class="quantity-no">
                <div class="inc-btn">+</div>
              </div>
              <select id="product-size" class="bs-select">
                <option value="small">Small</option>
                <option value="meduim">Medium</option>
                <option value="large">Large</option>
                <option value="x-large">X-Large</option>
              </select>
            </div>
            <ul class="CTAs list-inline">
              <li class="list-inline-item"><a href="#" class="btn btn-template wide"> <i class="icon-cart"></i>Add to Cart</a></li>
              <li class="list-inline-item"><a href="#" class="btn btn-template-outlined wide"> <i class="fa fa-heart-o"></i>Add to wishlist</a></li>
            </ul>
          </div>

          @endforeach



@endsection