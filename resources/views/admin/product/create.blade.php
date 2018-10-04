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

        <div class="container">
        <h1>Dashboard</h1>
         <div class="col-md-6">
          
        <h1>Add New Product</h1>

   
        

        {!! Form::open(['route' => 'product.store', 'method' => 'post', 'files' => true]) !!}

          <div class="form-group">
                {{ Form::label('Proname', 'Name') }}
                {{ Form::text('pro_name', null, array('class' => 'form-control','required'=>'','minlength'=>'5')) }}
            </div>


          
            <div class="form-group">
                {{ Form::label('Code', 'Code') }}
                {{ Form::text('pro_code', null, array('class' => 'form-control')) }}
            </div>


            <div class="form-group">
                {{ Form::label('stock', 'stock') }}
                {{ Form::text('stock', null, array('class' => 'form-control')) }}
              </div>

            <div class="form-group">
                {{ Form::label('price', 'Price') }}
                {{ Form::text('pro_price', null, array('class' => 'form-control')) }}
            </div>

             <div class="form-group">
                {{ Form::label('Description', 'Description') }}
                {{ Form::text('pro_info', null, array('class' => 'form-control')) }}
            </div>


             <div class="form-group">
                 {{ Form::label('category_id', 'Categories') }}
                 {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder'=>'SelectCategory']) }}
            </div>

          


            <div class="form-group">
                {{ Form::label('image', 'Image') }}
                {{ Form::file('image',array('class' => 'form-control')) }}
            </div>

             <div class="form-group">
                {{ Form::label('Sale Price', 'Sale Price') }}
                {{ Form::text('spl_price', null, array('class' => 'form-control')) }}
            </div>
             
            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
             
   {{!! Form::close() !!}}
       </div>

      <div class="col-md-4">
            <h1>Add Properties</h1>


            <div align="center">    <a href="{{url('/addProperty')}}/2" class="btn btn-sm btn-info">Add Property</a>
                    </div>


    </div>

</div>

   </div>

   

          </div>
        </main>
      </div>
    </div>


@endsection
