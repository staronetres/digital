@extends('admin.master')


@section('content')

 <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
<h3>Products</h3>

<ul>
@forelse($products as $product)
    <li>
        <h4>Name of product:{{$product->pro_name}}</h4>
        
        <form action="{{route('product.destroy',$product->id)}}"  method="POST">
           {{csrf_field()}}
           {{method_field('DELETE')}}
           <input class="btn btn-sm btn-danger" type="submit" value="Delete">
         </form>

    </li>

        @empty

        <h3>No products</h3>
</main>
    @endforelse
  

 @endsection
