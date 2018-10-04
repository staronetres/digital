<!--  <link href="{{asset('dist/css/slick.css')}}"> -->





@extends('front.master')

@section('content')


<script>
$(document).ready(function(){
  $('#size').change(function(){
    var size = $('#size').val();
    var proDum = $('#proDum').val();


   $.ajax({
        type: 'get',
        dataType: 'html',
        url: '<?php echo url('/selectSize');?>',
        data: "size=" + size + "& proDum=" + proDum,
        success: function (response) {
            console.log(response);
            $('#price').html(response);
        }
    });


  });
});





</script>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br> 



<div class="container align-vertical hero">
<div class="row">
<div class="col-md-5 text-left">


</div>
</div><!--end of row-->
</div><!--end of container-->
</header>


 

  <section id="index-amazon">

 
    <div class="amazon">
<div class="container">

<div class="row">
<div class="col-md-12">
<div class="product">
<div class="row">
<div class="col-md-6 col-xs-12">


@foreach($Products as $product)


<div class="thumbnail">
             <img src="{{url('images',$product->image)}}" class="card-img">
                                <br>



</div>



<!-- ALT IMAGE  -->

 <div id="similar-product" class="vertical-center-4" data-ride="carousel">
                                
                                  <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                      <div class="d-flex justify-content-between align-items-center">
                                        <div class="item active">
                                          <a href=""><img src="{{url('images',$product->image)}}" alt=""></a>
                                          
                                        </div>
                                        <div class="item">
                                          <a href=""><img src="{{url('images',$product->image)}}" alt=""></a>
                                          
                                        </div>
                                        <div class="item">
                                          <a href=""><img src="{{url('images',$product->image)}}" alt=""></a>
                                         
                                        </div>
                                        
                                    </div>

                                  <!-- Controls -->
                                  <a class="left item-control" href="#similar-product" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                  </a>
                                  <a class="right item-control" href="#similar-product" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                  </a>
                                  </div>
                            </div>







<!-- TESTIMONIALS -->
  <section id="testimonials" class="p-4 bg-dark text-white">
    <div class="container">
      <h2 class="text-center">testimonials</h2>
      <div class="row text-center">
        <div class="col">
      
   <div class="center">
    <div>
      <img src="{{url('images',$product->image)}}" data-srcset="http://placehold.it/650x300?text=1-650w 650w, http://placehold.it/960x300?text=1-960w 960w" data-sizes="100vw">
    </div>
    <div>
      <img src="{{url('images',$product->image)}}" data-srcset="http://placehold.it/650x300?text=2-650w 650w, http://placehold.it/960x300?text=2-960w 960w" data-sizes="100vw">
    </div>
    <div>
      <img src="{{url('images',$product->image)}}"  data-srcset="http://placehold.it/650x300?text=3-650w 650w, http://placehold.it/960x300?text=3-960w 960w" data-sizes="100vw">
    </div>
    <div>
      <img src="{{url('images',$product->image)}}"  data-srcset="http://placehold.it/650x300?text=4-650w 650w, http://placehold.it/960x300?text=4-960w 960w" data-sizes="100vw">
    </div>
    <div>
      <img src="{{url('images',$product->image)}}"  data-srcset="http://placehold.it/650x300?text=5-650w 650w, http://placehold.it/960x300?text=5-960w 960w" data-sizes="100vw">
    </div>
    <div>
      <!-- this slide should inherit the sizes attr from the parent slider -->
      <img src="{{url('images',$product->image)}}"  data-srcset="http://placehold.it/650x300?text=6-650w 650w, http://placehold.it/960x300?text=6-960w 960w">
    </div>
  </div>
</div>
</div>
</section>




    




</div>
<div class="col-md-5 col-md-offset-1">

<div class="product-details">

<h2 class="product-title">
 <h2><?php echo ucwords($product->pro_name);?></h2>
 <h5>{{$product->pro_info}}</h5>

 
 </h2>


 <form action="{{url('/cart/addItem')}}/<?php echo $product->id; ?>">

 <span>



  

 <span id="price">

    @if($product->spl_price ==0)

   ${{$product->pro_price}}

   <input type="hidden" value="<?php echo $product->pro_price;?>" name="newPrice"/>


   @else


   <div class="d-flex justify-content-between align-items-center">

          <input type="hidden" value="<?php echo $product->spl_price;?>" name="newPrice"/>
            <p class="" style="text-decoration:line-through; color:#333">${{$product->spl_price}}</p>
             <img src="{{URL::asset('dist/images/shop/sale.png')}}" alt="..."  style="width:60px">
             <p class="">${{$product->pro_price}}</p>

             
           </div>


   @endif

 </span>




 <p><b>Availability:</b>{{$product->stock}} In Stock</p>


 <?php $sizes = DB::table('products_properties')->where('pro_id',$product->id)->get(); ?>

  <select name="size" id='size'>

   @foreach ($sizes as $size)
    <option>{{$size->size}}</option>

   @endforeach

  </select>



   @if($product->new_arrival==1)
   <img src="{{URL::asset('dist/images/product-details/new.jpg')}}" alt="...">
    @endif



  
 
<button class="btn btn-fefault cart" id="addToCart">
   <i class="fa fa-shopping-cart"></i>
   Add to cart
</button>


<input type="hidden" value="<?php echo $product->id; ?>" id="proDum"/>

</span>

</form>


<p class="">
 


</div>
</div>

@endforeach





</div>
</div>
</div>
</div><!-- /.row -->

        </div>
        </div>
      </section>


      <div class="no-padding-top section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="#" class="load-more"><i class="fa fa-ellipsis-h"></i></a>
                            </div>
                        </div><!-- /.row -->
                    </div><!-- /.container -->
                </div>

                <!-- Recommends table -->


               <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>

               

                  </div><!--/recommended_items-->
                    
                </div>

<!-- TESTIMONIALS -->
  







   

  <!-- TESTIMONIALS -->
  <section id="testimonials" class="p-4 bg-dark text-white">
    <div class="container">
      <h2 class="text-center">testimonials</h2>
      <div class="row text-center">
        <div class="col">
          <div class="slider">
            <div>
              <blockquote class="blockquote">
                <p class="mb-0">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, quaerat.
                </p>
                <footer class="blockquote-footer">John Doe From
                  <cite title="Company 1">Company 1</cite>
                </footer>
              </blockquote>
            </div>
            <div>
              <blockquote class="blockquote">
                <p class="mb-0">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, quaerat.
                </p>
                <footer class="blockquote-footer">Sam Smith From
                  <cite title="Company 2">Company 2</cite>
                </footer>
              </blockquote>
            </div>
            <div>
              <blockquote class="blockquote">
                <p class="mb-0">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, quaerat.
                </p>
                <footer class="blockquote-footer">Meghan Williams From
                  <cite title="Company 3">Company 3</cite>
                </footer>
              </blockquote>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>








@endsection


@section('script')
<script src="{{asset('js/slick.js')}}"></script>
    
 <script>
        
            $('.center').slick({
  centerMode: true,
  centerPadding: '60px',
  slidesToShow: 3,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
});



            $('.autoplay').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
});


            $('.slider').slick({
      infinite: true,
      slideToShow: 1,
      slideToScroll: 1
    });

</script>

@endsection

