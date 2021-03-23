@extends('welcome')
	@section('content')
		
	
	<div class="container">
   
     <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>
      <a href="{{route('all.student')}}" class="btn btn-dark"> all Student</a>
      
        </p>
     <div>
       <ul>

            <li>student name:{{$amit->name}}</li>
             <li>student email:{{$amit->email}}</li>
             <li>student phone:{{$amit->phone}}</li>
          <li>category Created at:{{$amit->created_at}}</li>
          </ul>
     </div>
          
      <!-- tui view e ja mane button gula koi ache -->

      </div>
    </div>
   </div>
      
    
@endsection