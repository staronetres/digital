@extends('admin.master')
@section('content')



<br>
<br>
<br>
<br>


<div class="container-fluid">
      <div class="row">
@include('admin.includes.sidenav')


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
            </div>
          </div>


          <h2>Section title</h2>
          <div class="table-responsive">




<div class="row">
  <br>
<br>
<br>
<br>
    <div class="col-md-6">
<h3>Categories</h3>

<table class="table table-dark">
            <thead>
                <tr>
                    
                    <th>Category Name</th>
                    <th>Edit</th>
                    <th>Status</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>
        
            @foreach($categories as $category)

            <tr>
                <td><a href="{{route('category.show',$category->id)}}">
                 {{$category->name}}</a></td>
                <td><a href="{{route('CatEditForm',$category->id)}}" class="btn btn-info btn-small">Edit</a></td>   
            

                    {{$category->name}}</a></td>

                     <td>@if($category->status=='0')
                                    Enable
                                    @else
                                    Disable

                                    @endif</td>
              

            {!! Form::open(['method'=>'DELETE', 'action'=> ['CategoriesController@destroy', $category->id]]) !!}


                <td>  {!! Form::submit('Delete Category', ['class'=>'btn btn-danger col-sm-6']) !!}</td> 



                {!! Form::close() !!}
                
              </tr>
              @endforeach

            
            </tbody>
    </table>
       

</div>
  

      <div class="col-md-4">
           <div class="card card-body bg-success text-white py-5">
       <h2>Create Category</h2>
       <p class="lead">Lorem Ipsum has been the industry's standard dummy text ever since the</p>
          {!! Form::open(['route' => 'category.store', 'method' => 'post']) !!}
            <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
            </div>

            <td>Category Status</td>

         
   
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Category</button>

          {!! Form::close() !!}

     </div>
        
                {!! Form::open(['route' => 'category.store', 'method' => 'post']) !!}
              
                    
                </div>
                {!! Form::close() !!}
            </div><!-- /.modal-content -->
     
    </div>

</div>


    {{--products--}}
    @if(isset($products))

    <h3>Products</h3>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Products</th>
            </tr>
        </thead>
        <tbody>
@forelse($products as $product)
    <tr><td>{{$product->name}}</td></tr>
        @empty
        <tr><td>no data</td></tr>
        @endforelse

        </tbody>
    </table>
   

     </div>
        </main>
      </div>
    </div>
    @endif
@endsection
