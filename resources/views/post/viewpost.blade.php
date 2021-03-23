@extends('welcome')
	@section('content')
	

	<div class="container">
   
     <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
     
     <div>
       <ul>
            <li>{{$post->name}}</li>
             <li>{{$post->titel}}</li>
             <img src="{{URL::to($post->image)}}" height="340px">
             <p>{{$post->details}}</p>
          </ul>
     </div>
          
      <!-- tui view e ja mane button gula koi ache -->

      </div>
    </div>
   </div>
      
    
@endsection