@extends('admin.master')

@section('content')

<br>
<br>

<br>
<br>

@include('admin.includes.sidenav')
  <section id="container" class="">

    <div class="row">
      
      

             

                    <div class="col-md-5">


                    

                    <br>
<br>

<br>
<br>


               
                

                    {!! Form::model($Products, ['method'=>'post', 'action'=> ['ProductsController@editProImage', $Products->id], 'files'=>true]) !!}

                   
                    <input type="hidden" name="id" class="form-control" value="{{$Products->id}}">

                    <input type="text" class="form-control" value="{{$Products->pro_name}}" readonly="readonly">
                    <br/>
                    <img class="card-img-top img-fluid" src="{{url('images',$Products->image)}}" width="150px" alt="Card image cap"/>

                    <br/>
                    Select Image:
                    {{ Form::label('image', 'Image') }}
                {{ Form::file('image',array('class' => 'form-control')) }}

                    
                    <br/>
                    <input type="submit" value="Upload Image" class="btn btn-success pull-right">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    {!! Form::close() !!}
                  </div>
                </div>



@endsection