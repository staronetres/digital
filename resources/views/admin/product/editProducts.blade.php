@extends('admin.master')


@section('content')

 <main class="col-sm-12 ml-sm-auto col-md-10 pt-3" role="main">
<h3>Products</h3>

<ul>

    



   
              







                
@include('admin.includes.sidenav')


  <div class="row">

       
              <div class="col-md-4">

                {!! Form::model($Products, ['method'=>'post', 'action'=> ['ProductsController@editProducts', $Products->id], 'files'=>true]) !!}


               
               <input type="hidden" name="id" class="form-control" value="{{$Products->id}}">

             
                
                <Select class="form-control" name="cat_id">
                            @foreach($categories as $cat)
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
               

                <div class="form-group">
                New Arrival: <p class="pull-right"><input type="checkbox" name="new_arrival" value="1"></p>
                </div>
                            
            {{ Form::submit('Update', array('class' => 'btn btn-default')) }}
    
  
    
   {{!! Form::close() !!}}

</div>







<div class="col-md-6">




  <div class="content-box-large">
                      
                            
                         <div class="col-md-8">
                    
                     
                  <div class="panel-heading">
                   <div class="panel-title">
                     Update Proprities
                     <a href="" class="btn btn-info pull-right"
                     style="margin:-6px; color:#fff">Add more</a>
                   </div>
                   </div>

                   <div class="content-box-large">

                      <table class="table table-responsive">
                      <tr>
                        <td>Size</td>
                        <td>Color</td>
                        <td>price</td>
                        <td>Update</td>
                      </tr>
                
              <?php {?>
                @foreach($prots as $prot)
              
           

                 {!! Form::open(['url' => 'admin/editProperty',  'method' => 'post']) !!}
                

 
                      <tr>
                          <input type="hidden" name="pro_id" value="{{$prot->pro_id}}" size="6"/> <!-- products_properties pro_id -->
                          <input type="hidden" name="id" value="{{$prot->id}}" size="6"/> <!--// products_properties id -->
                        <td><input type="text" name="size" value="{{$prot->size}}" size="6"/></td>
                        <td><input type="text" name="color" value="{{$prot->color}}" size="15"/></td>
                        <td><input type="text" name="p_price" value="{{$prot->p_price}}" size="6"/></td>
                        <td colspan="3" align="right"><input type="submit" class="btn btn-success"
                          value="Save" style="margin:-6px; color:#fff"></td>
                      </tr>
                            {!! Form::close() !!}
                      @endforeach

                      </table>
                       <div>
                 <?php }?>
                          <td>
                         
                       <!-- INLINE FORM -->
         <!-- FORM ROW -->

         <div class="d-flex justify-content-between align-items-center">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username">
            <div class="input-group-append pull-right">
                <span class="input-group-text">@something.com</span>
            </div>
        </div>
      </div>
             
                        
                       </td>
                        
                

      
                    </tr>   

                      </table>
                       <div>


                  
                     






  <div align="center">  

    <a href="{{route('addProperty',$Products->id)}}" class="btn btn-sm btn-info" style="margin:5px">Add Property</a>
    
   <br>
  </div>



  <div align="center"> 
 <h1>Change Image</h1>
      <img class="card-img-top img-fluid" src="{{url('images',$Products->image)}}" style="width:200px" alt="Card image cap">

      <p><a href="{{route('ImageEditForm',$Products->id)}}"
       class="btn btn-info">Change Image</a>
        </p>

    </div>
</div>

</div>

    
        
</main>

 <!-- NEWSLETTER -->
  <section id="newsletter" class="text-center p-5 bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Sign Up For Our Newsletter</h1>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio asperiores consectetur, quae ducimus voluptates
            vero repellendus architecto maiores recusandae mollitia?</p>
          <form class="form-inline justify-content-center">
            <input type="text" class="form-control mb-2 mr-2" placeholder="Enter Name">
            <input type="text" class="form-control mb-2 mr-2" placeholder="Enter Email">
            <button class="btn btn-primary mb-2">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  
  

 @endsection