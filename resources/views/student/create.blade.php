@extends('welcome')
	@section('content')
		
	
	<div class="container">
   
     <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>
          <a href="{{route('all.student')}}"class="btn btn-primary" > All student</a>
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
        <form action="{{route('store.student')}}" method="post">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>NAME</label>
              <input type="text" class="form-control" placeholder="Student name" name="name" >
            </div>
          </div>

           <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>BLOOD GROUP</label>
              <input type="email" class="form-control" placeholder="Email " name="email" >
            </div>
          </div>
            <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>BLOOD GROUP</label>
              <input type="number" class="form-control" placeholder="Phone" name="phone" >
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