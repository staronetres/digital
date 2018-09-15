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
       


              







                



  

       


                {!! Form::model($Products, ['method'=>'post', 'action'=> ['ProductsController@editProducts', $Products->id]]) !!}


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

    
            </tbody>
        </table>

        
</main>
  
  

 @endsection
