@extends('admin.master')


@section('content')

 <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
<h3>Products</h3>

<ul>

    



   
     <!-- INVERSE/DARK TABLE -->
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>Product Price</th>
                    <th>Category Id</th>
                    <th>Update</th>
                </tr>
            </thead>

            <tbody>

               @foreach($Products as $product)


             
                <tr>
                    <td style="width:50px; border: 1px solid #333;"><img class="card-img-top img-fluid" src="{{url('images',$product->image)}}" width="50px" alt="Card image cap"></td>
                    <td style="width:50px;">{{$product->id}} </td>
                    <td style="width:50px;">{{ucwords($product->name)}} </td>
                    <td style="width:50px;">{{$product->pro_name}} </td>
                    <td style="width:50px;">{{$product->pro_code}} </td>
                    <td style="width:50px;">{{$product->pro_price}} </td>
                    <td style="width:50px;">{{$product->category_id}}</td>
                    <td><a href="{{route('ProductEditForm',$product->id)}}" class="btn btn-success btn-small">Edit</a></td>
                </tr>
                @endforeach

                
            </tbody>
        </table>

        
</main>
  
  

 @endsection
