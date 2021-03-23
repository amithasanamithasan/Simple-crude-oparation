@extends('welcome')
	@section('content')
		
	
	<div class="container">
   
     <div class="row">
      <div class="col-lg-20  mx-auto">
        <p>
     
          
          <a href="{{route('writepost')}}" class="btn btn-dark">Write Post</a>
          
          <hr>
          <table class="table table-responsive">
            
              <tr>
                <th>SL</th>
                <th>Category</th>
                <th>Titel</th>
                <th>Image</th>
                <th>Action</th>

                  
              
                

              </tr>
              @foreach ($post as $row)
            
              <tr>
                
                  <td>{{$row->id}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->titel}}</td>
                
             
                 
        
                
              
             <td><img src="{{URL::to($row->image)}}"style ="hight:100px;width:100px;"></td>
            
                <td>
                  <a href="{{URL::to('edit/post',$row->id)}}" class="btn btn-sm btn-info">edit</a>

                  <a href="{{URL::to('delete/post',$row->id)}}" class="btn btn-sm btn-warning"  id="delete">Delete</a>
                  <a href="{{URL::to('view/post',$row->id)}}" class="btn btn-sm btn-success">View</a>
                </td>
              </tr>
            @endforeach
          </table>
      </div>
    </div>
  </div> 
@endsection