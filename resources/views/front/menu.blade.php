<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          
          

          <li class="nav-item"><a href="{{url('/')}}" class="nav-link active">Home</a>
              </li>
              <li class="nav-item"><a href="{{url('/shop')}}" class="nav-link">Shop</a>
              </li>
              

              <li class="nav-item"><a href="{{url('/contact')}}" class="nav-link">Contact</a>
              </li>

           <li class="nav-item"><a href="{{url('/login')}}" class="nav-link">Login</a>
              </li>

              <?php if (Auth::check()) { ?>
                    <li><a href="{{url('/')}}/profile"><i class="fa fa-user"></i>{{Auth::user()->name}}</li>
                 <?php } ?>
            
                <?php if (Auth::check()) { ?>
                    <li class="dropdown-item"><a href="{{url('/logout')}}"><i class="fa fa-lock"></i> Logout</a></li>
                <?php } else { ?>
                    <li class="dropdown-item"><a href="{{url('/login')}}"><i class="fa fa-lock"></i> Login</a></li>
                <?php } ?>
                    </li>


              <?php  $cats = DB::table('categories')->get(); ?>
                 @foreach($cats as $cat)
                  <li><a href="{{url('/')}}/products/{{$cat->name}}" class="dropdown-item">{{ucwords($cat->name)}}</a></li>
                @endforeach




          <li class="dropdown-item"><a href="{{url('/cart')}}"><i class="fa fa-shopping-cart">View Cart</i>({{Cart::count()}})  ({{Cart::total()}})</a></li>


          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>
        <form action='{{url('/search')}}' method="post" class="form-inline my-2 my-lg-0">
        

          <input type="search" name="search" id="search" class="form-control mr-sm-2" placeholder="What are you looking for?">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
