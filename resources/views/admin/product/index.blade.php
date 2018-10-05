@extends('admin.master')


@section('content')



<script>
 $(document).ready(function(){


<?php for($i=1;$i<60;$i++){?>
  // start loop
      $('#amountDiv<?php echo $i;?>').hide();
      $('#checkSale<?php echo $i;?>').show();
        $('#onSale<?php echo $i;?>').click(function(){  // run when admin need to add amount for sale
          $('#amountDiv<?php echo $i;?>').show();
          $('#checkSale<?php echo $i;?>').hide();
            $('#saveAmount<?php echo $i;?>').click(function(){
              var salePrice<?php echo $i;?> = $('#spl_price<?php echo $i;?>').val();
              var pro_id<?php echo $i;?> = $('#pro_id<?php echo $i;?>').val();
                $.ajax({
                  type: 'get',
                  dataType: 'html',
                  url: '<?php echo url('/admin/addSale');?>',
                  data: "salePrice=" + salePrice<?php echo $i;?> + "& pro_id=" + pro_id<?php echo $i;?>,
                  success: function (response) {
                      console.log(response);
                  }
              });
            });
        });
        $('#noSale<?php echo $i;?>').click(function(){ // this when admin dnt need sale
          $('#amountDiv<?php echo $i;?>').hide();
          $('#checkSale<?php echo $i;?>').show();

        });
        //end loop
        <?php }?>
 });


</script>

 

 <div class="container-fluid">
      <div class="row">
       
        @include('admin.includes.sidenav')
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          

          <h2>Section title</h2>
          <div class="table-responsive">
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
                    <th>Alt Images</th>
                    <th>On Sale</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>


               <?php $count =1;?>
               @foreach($Products as $product)


             
                <tr>
                    <td style="width:50px; border: 1px solid #333;"><img class="card-img-top img-fluid" src="{{url('images',$product->image)}}" width="50px" alt="Card image cap"></td>

                   
                    <td style="width:50px;">{{$product->id}} </td>
                  
                    <td style="width:50px;">{{$product->pro_name}} </td>
                    <td style="width:50px;">{{$product->pro_code}} </td>
                    <td style="width:50px;">{{$product->pro_price}} </td>
                    <td style="width:50px;">{{$product->category_id}}</td>
                    <td> <a href="{{url('/')}}/admin/addAlt/{{$product->id}}"
                                   class="btn btn-info" style="border-radius:20px;">
                                   <i class="fa fa-plus"></i> Add</a></td>

                
              <!-- ProInfo -->

                     <td>
                      <div class="content-box-large col-md-5">
                <h1>ALt images</h1>
                <?php $altImages = DB::table('alt_images')->where('proId', $proInfo[0]->id)->get();?>
@if(count($altImages)!=0)
                <table class="table table-striped">
                  <tr>
                    <td>index</td>
                    <td>Product id</td>
                    <td>alt image</td>
                    <td>status</td>
                  </tr>
                  @foreach($altImages as $img)
                  <tr>
                    <td>{{$img->id}}</td>
                    <td>{{$img->proId}}</td>
                  <td>


                  <img class="card-img-top img-fluid" src="{{url('images',$img->alt_img)}}" width="50px" alt="Card image cap">


                  </td>
                    <td>{{$img->status}}</td>
                  </tr>
                  @endforeach

                </table>
                @else
                <p class="alert alert-danger">this product have not any alt images</p>
                @endif
              </div>

                     </td>

                        <!-- ProInfo -->

                    <td >

                       <div id="checkSale<?php echo $count;?>">
                        <input type="checkbox" id="onSale<?php echo $count;?>"> Yes

                       </div>

                       <div id="amountDiv<?php echo $count;?>">
                         
                         <input type="hidden" id="pro_id<?php echo $count;?>" value="{{$product->id}}"/>
                         <input type="checkbox" id="noSale<?php echo $count;?>"> No<br>


                         <input type="text" id="spl_price<?php echo $count;?>" size="12" placeholder="Sale Price"/><br>

                         <button id="saveAmount<?php echo $count;?>" class="btn btn-success">Save Amount</button>
                       </div>

                    </td>
                    <td><a href="{{route('ProductEditForm',$product->id)}}" class="btn btn-success btn-small">Edit</a></td>


                   {!! Form::open(['method'=>'DELETE', 'action'=> ['ProductsController@destroy', $product->id]]) !!}


                  <td>  {!! Form::submit('Delete Product', ['class'=>'btn btn-danger col-sm-6']) !!}</td> 



                  {!! Form::close() !!}
                
                </tr>

                <?php $count++;?>
                @endforeach

                
            </tbody>
        </table>

          </div>
        </main>
      </div>
    </div>
  
  

 @endsection
