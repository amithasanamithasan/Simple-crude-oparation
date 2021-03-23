@extends('welcome')
	@section('content')
		
	
	<div class="container">
   
     <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>
      <a href="{{route('addcategory')}}" class="btn btn-dark"> Add category</a>
      <a href="{{route('all.category')}}" class="btn btn-primary" > All category</a>    
        </p>
     <div>
       <ul>

            <li>Category name:{{$cat->name}}</li>
             <li>Category Slug:{{$cat->slug}}</li>
          <li>category Created at:{{$cat->created_at}}</li>
          </ul>
     </div>
          
      <!-- tui view e ja mane button gula koi ache -->

      </div>
    </div>
   </div>
      
    
@endsection