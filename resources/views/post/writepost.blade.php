	@extends('welcome')
	@section('content')
		
	
	<div class="container">
     <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>
        	<a href="{{route('addcategory')}}" class="btn btn-dark"> Add category</a>
        	<a href="{{route('all.category')}}" class="btn btn-primary" > All category</a>
          <a href="{{route('all.post')}}" class="btn btn-primary" > All Post</a>
        </p>
        @if ($errors->any())
    <div class="alert alert-danger">

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        
        <form action="{{route('store.post')}}" method ="post" enctype="multipart/form-data">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Titel</label>
              <input type="text" class="form-control" placeholder="DONOR NAME" name="titel" required>
             
            </div>
          </div>
          <div class="control-group">
                 <div class="form-group floating-label-form-group controls">
              <label>Catagory</label>
              <select class="form-control" name= "category_id">
                @foreach($category as $row)
              	<option value="{{ $row->id}}" >{{ $row->name}}</option>
              
                @endforeach
              </select>
             
          </div>
      </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Post Image</label>
              <input type="file" class="form-control"  required name="image" >
            
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Details</label>
              <textarea rows="5" class="form-control" placeholder="LOCATION" required name="details"> </textarea>
             
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
          </div>
        </form>
      </div>
    </div>
@endsection