@extends('layouts.master')
@section('title','Create Employee')
@section('content')
@if($errors->any())
<div class="alert alert-danger">
 <ul>
  @foreach($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
 </ul>
</div>
@endif
  <div class="row mt-5">
    <div class="col-sm-8 offset-sm-2">
      <form action="{{route('employees.store')}}" method = "post" enctype="multipart/form-data">
        @csrf
        <a class="form-group">
                    <a href="{{ route('employees.index') }}">List</a>
                  
                </a>
        <div class="form-group">
          <label for="firstname">Name:</label>
          <input type="text" name = "firstname" id = "firstname" class="form-control" required>
        </div>
   
        <div class="form-group">
          <label for="department">Branch:</label>
          <!-- <input type="text" name = "department" id = "department" class="form-control" required> -->
          <select name="department" id = "department" class="form-control" required>
                  <option value="CS">CS</option>
                  <option value="ECE">ECE</option>
                  <option value="MECH">MECH</option>  
                  
                </select>
        </div>
        <div class="form-group">
          <label for="phone">Mobile Number:</label>
          <input type="text" name = "phone" id = "phone" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="phone">Email:</label>
          <input type="text" name = "email" id = "email" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="phone">Address:</label>
          <input type="text" name = "address" id = "address" class="form-control" required>
        </div>
    
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
          <input type="file" name="image" />
         </div>
        </div>
        <button type = "submit" class = "btn btn-success">Submit</button>
      </form>
    </div>
  </div>
@endsection