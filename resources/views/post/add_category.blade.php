@extends('welcome')
	@section('content')
		
	
	<div class="container">
   
     <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>
        	<a href="{{route('addcategory')}}" class="btn btn-dark"> Add category</a>
          <a href="{{route('all.category')}}" class="btn btn-primary" > All category</a>
        </p>
<div class="alert alert-success">
@if ($errors->any())
    <div class="alert alert-warning">

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="{{route('storecategory')}}" method="post">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>DONOR NAME</label>
              <input type="text" class="form-control" placeholder="BLOOD GROUP" name="name" >
            </div>
          </div>

           <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>BLOOD GROUP</label>
              <input type="text" class="form-control" placeholder="DONOR NAME" name="slug" >
            </div>
          </div>
  
          <div class="form-group">
            <div class="form-group">
           <button type="submit" class="btn btn-primary" >Submit</button>
            
          </div>
        </form>
      </div>
    </div>
   
      
    
@endsection