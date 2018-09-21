


    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
      <a href="{{url('/')}}" class="navbar-brand">GlozzomEcom</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a href="{{url('/shop')}}" class="nav-link">Shop</a>
          </li>
          <li class="nav-item">
            <a href="{{url('/contact')}}" class="nav-link">Contact</a>
          </li>
          <li class="nav-item">
            <a href="{{url('/login')}}" class="nav-link">Login</a>
          </li>

         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="badge badge-secondary badge-pill"><i class="fa fa-shopping-cart"></i>{{Cart::count()}}</span></a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <div class="">
          <h4 class="d-flex justify-content-between align-items-center mb-3">

            <span class="badge badge-secondary badge-pill"><i class="fa fa-shopping-cart"></i>{{Cart::count()}}</span>
            <span class="text-muted">Total: ({{Cart::total()}})</span>
            
          </h4>
          <ul class="list-group mb-3">
            

            <?php $cartItems = Cart::content();?>

           
            
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              @foreach($cartItems as $cartItem)
              

             <div class="col-md-6">
              <img  class="dropdownimage" src="{{url('images',$cartItem->options->img)}}"  class="img-responsive dropdownimage" style="width:50px" />
           </div>
              
            <div class="col-md-6">
                <h6 class="my-0">Name: {{$cartItem->name}}</h6>
               
               
                <small class="text-muted foat-right">Price: {{$cartItem->price}}</small>
              </div>
             @endforeach 
            </li>
         
        
            
            
            <li class="list-group-item d-flex justify-content-between">
              <button type="button" class="btn btn-sm btn-outline-secondary">Checkout</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">View Cart</button>
            </li>
          </ul>
        </div>
           </div> 
          </li>

         


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <?php  $cats = DB::table('categories')->get(); ?>
                 @foreach($cats as $cat)
              <a class="dropdown-item" href="{{url('/')}}/products/{{$cat->name}}">{{ucwords($cat->name)}}</a>

               @endforeach
          
            </div>
          </li>


          <?php if (Auth::check()) { ?>
                    <li nav-item><a href="{{url('/')}}/profile"><i class="fa fa-user"></i>{{Auth::user()->name}}</li>
                 <?php } ?>
            
                <?php if (Auth::check()) { ?>
                    <li class="dropdown-item"><a href="{{url('/logout')}}"><i class="fa fa-lock"></i> Logout</a></li>
                <?php } else { ?>
                    <li class="dropdown-item"><a href="{{url('/login')}}"><i class="fa fa-lock"></i> Login</a></li>
                <?php } ?>
                    </li>



          <li class="nav-item">
            <a href="blog.html" class="nav-link">Blog</a>
          </li>
          <li class="nav-item">
            <a href="contact.html" class="nav-link">Contact</a>
          </li>

          
        </ul>
      </div>
    </div>
  </nav>
