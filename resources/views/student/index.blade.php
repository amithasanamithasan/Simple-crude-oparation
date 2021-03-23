@extends('welcome')
	@section('content')
		
	
	<div class="container">
   
     <div class="row">
      <div class="col-md-4">
        <form action="/search" method="get" >
          <div class="input-group">
            <input type="search" name="search" class="form-control" placeholder="Search" >
            <span class="input-group-prepend"></span>
            <button type="submit" class="btn btn-success">Search</button>

            
            
          </div>
        </form>
        
      </div>
      <div class="col-lg-10 col-md-10 mx-auto">
        <p>
        	<a href="{{route('student')}}" class="btn btn-dark"> Add Student</a>
          <h1> Student View Detiels</h1>
          <hr>
          <table class="table table-responsive">
            
              <tr>
                <th>SL</th>
                <th>Category Student</th>
                <th>Name</th>
                <th>Email</th>
                 <th>phone</th>
                <th>Action</th>
              </tr>
              @foreach ($student as $row)
            
              <tr>
                  <td>{{$row->id}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->email}}</td>
                <td>{{$row->phone}}</td>
             <td>{{$row->created_at}}</td>
              <td></td>
                <td>
                  <a href="{{URL::to('/edit/student',$row->id)}}" class="btn btn-sm btn-info">edit</a>
                  <a  href="{{URL::to('/delete/student/'.$row->id)}}"  class="btn btn-sm btn-warning" id="delete">Delete</a>
                  <a  href="{{URL::to('/view/student/'.$row->id)}}" class="btn btn-sm btn-success">View</a>
                </td>
              </tr>
            @endforeach
          </table>
      </div>
    </div>
  </div> 
@endsection