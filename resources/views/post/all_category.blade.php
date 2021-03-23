@extends('welcome')
	@section('content')
		
	
	<div class="container">
   
     <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>
        	<a href="{{route('addcategory')}}" class="btn btn-dark"> Add category</a>
          
          <a href="{{route('all.category')}}" class="btn btn-dark"> All category</a>
          
          <hr>
          <table class="table table-responsive">
            
              <tr>
                <th>SL</th>
                <th>Category Name</th>
                <th>Slug Name</th>
                <th>createdat</th>
                <th>Action</th>
              </tr>
              @foreach ($category as $row)
            
              <tr>
                  <td>{{$row->id}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->slug}}</td>
             <td>{{$row->created_at}}</td>
              <td></td>
                <td>
                  <a href="{{URL::to('/edit/category',$row->id)}}" class="btn btn-sm btn-info">edit</a>
                  <a href="{{route('deletecategory',$row->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                  <a href="{{URL::to('/view/category',$row->id)}}" class="btn btn-sm btn-success">View</a>
                </td>
              </tr>
            @endforeach
          </table>
      </div>
    </div>
  </div> 
@endsection