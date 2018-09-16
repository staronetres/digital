@extends('admin.master')

@section('content') 


           
          
          <div class="col-md-10">
            <div class="row">
                


                    <div class="col-md-6">

                        <br>
                         <br>
                         <br>
                         <br>
                       <h1>Edit Categories</h1>



                        <!-- TABLE -->
     {!! Form::model($categories, ['method'=>'post', 'action'=> ['CategoriesController@editCat', $categories->id], 'files'=>true]) !!}
        <table class="table">
            <thead>
                <tr>
                    <th>Catgeory Name:</th>
                    
                    <th>Update</th>
                </tr>
            </thead>
                
            <tbody>

                
                <tr>
                
                     <input type="hidden" name="id" class="form-control" value="{{$categories->id}}">
                    <td><input type="text" name="cat_name" class="form-control" value="{{$categories->name}}"></td>


                    <td> Category Status:</td>
                    <td>
                        <select name="status" class="form-control">
                            <option value="0"  <?php if($categories->status=='0'){?>  selected="selected" <?php }?>>Enable</option>
                            <option value="1" <?php if($categories->status=='1'){?> selected="selected" <?php }?>>Disable</option>

                        </select>
                    </td>
                     <td>{{ Form::submit('Update', array('class' => 'btn btn-default')) }}</td>

                     
                    
                    
                </tr>

               

               
            </tbody>

            
        </table>


    {{!! Form::close() !!}}

                    </div>

               
            </div>

            

            <div class="content-box-large">
                
            </div>
          </div>
 


      @endsection