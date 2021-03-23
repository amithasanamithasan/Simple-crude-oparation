@extends('welcome')
  @section('content')
    
  
  <div class="container">
   
     <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>
    
          <a href="{{route('all.student')}}" class="btn btn-primary" > All category</a>
        </p>
        <hr>

@if ($errors->any())
    <div class="alert alert-warning">

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 
        


        <form action="{{url('update/student/'.$student->id)}}" method="post">
       
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>category name</label>
              <input type="text" class="form-control" value="{{($student->name)}}"  name="name" >
            </div>
          </div>

           <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Slug name</label>
              <input type="email" class="form-control" value="{{($student->email)}}" name="email" >
            </div>
          </div>

           <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Slug name</label>
              <input type="number" class="form-control" value="{{($student->phone)}}" name="phone" >
            </div>
          </div>
         
          <br>
         
            <div class="form-group">
           <button type="submit" class="btn btn-primary" >Update</button>
          </div>
        </form>
      </div>
    </div>
   
      
    
@endsection