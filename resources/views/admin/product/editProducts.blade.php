@extends('admin.master')


@section('content')

 <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
<h3>Products</h3>

<ul>

    



   
              







                



  <div class="row">

       
              <div class="col-md-4">

                {!! Form::model($Products, ['method'=>'post', 'action'=> ['ProductsController@editProducts', $Products->id], 'files'=>true]) !!}


                <?php $cat_data = DB::table('categories')->get(); ?>



                
                <Select class="form-control" name="cat_id">
                            @foreach($cat_data as $cat)
                            Category:  <option value="{{ $cat->id }}"  <?php 
                            if($Products->cat_id==$cat->id) {?> selected="selected"<?php }?>


                            >{{ ucwords($cat->name) }}</option>
                            @endforeach
                            </select>
                            <br>
               
                            
                <div class="form-group">
                 {!! Form::label('pro_name', 'Name:') !!}
                 {!! Form::text('pro_name', null, ['class'=>'form-control'])!!}
               </div>


               <div class="form-group">
                 {!! Form::label('pro_price', 'Pro Price:') !!}
                 {!! Form::text('pro_price', null, ['class'=>'form-control'])!!}
               </div>
                

                <div class="form-group">
                 {!! Form::label('pro_code', 'Pro Code:') !!}
                 {!! Form::text('pro_code', null, ['class'=>'form-control'])!!}
               </div>


              


                <img class="card-img-top img-fluid" src="{{url('images',$Products->image)}}" style="width:50px" alt="Card image cap">

                
                <div class="form-group">
                 {!! Form::label('spl_price', 'Spl Price:') !!}
                 {!! Form::text('spl_price', null, ['class'=>'form-control'])!!}
               </div>


               <div class="form-group">
                 {!! Form::label('pro_info', 'Pro Info:') !!}
                 {!! Form::text('pro_info', null, ['class'=>'form-control'])!!}
               </div>



                            
            {{ Form::submit('Update', array('class' => 'btn btn-default')) }}
    
  
    
   {{!! Form::close() !!}}

</div>


<div class="col-md-3">

 <h1>Change Image</h1>
      <img class="card-img-top img-fluid" src="{{url('images',$Products->image)}}" style="width:200px" alt="Card image cap">

      <p><a href="{{route('ImageEditForm',$Products->id)}}"
       class="btn btn-info">Change Image</a>
        </p>
</div>

</div>

    
        
</main>
  
  

 @endsection
