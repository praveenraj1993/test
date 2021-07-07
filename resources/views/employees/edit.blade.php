@extends('layouts.master')
@section('title','Edit Employee')
@section('content')
  <div class="row">
    <div class="col-sm-8 offset-sm-2">
      <form action="{{route('employees.update')}}" method = "post" enctype="multipart/form-data" >
        @csrf
        <!-- @method('PATCH') -->
        <a class="form-group">
                    <a href="{{ route('employees.index') }}">Home</a>
                  
                </a>
        <div class="form-group">
          <label for="firstname">Firstname:</label>
          <input type="text" name = "firstname" id = "firstname" class="form-control" required value = "{{$employee->firstname}}">
        </div>
        <div class="form-group">
          <label for="address">Address:</label>
          <input type="text" name = "address" id = "address" class="form-control" required value = "{{$employee->address}}">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" name = "email" id = "email" class="form-control" required value = "{{$employee->email}}">
        </div>
        <div class="form-group">
          <label for="department">Department:</label>
          <input type="text" name = "department" id = "department" class="form-control" required value = "{{$employee->department}}">
        </div>
        <div class="form-group">
          <label for="phone">Phone Number:</label>
          <input type="text" name = "phone" id = "phone" class="form-control" required value = "{{$employee->phone}}">
        </div>
        <div class="form-group">
       <label class="col-md-4 text-right">Select Profile Image</label>
      
      <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
          <input type="file" name="image" />
          <img src="{{ $employee->photo}}" class="img-thumbnail" width="100" />
                        <input type="hidden" name="hidden_image" value="{{ $employee->photo }}" />
         </div>
        </div>
        <input type="hidden" name="id" value = "{{$employee->id}}">
        <button type = "submit" class = "btn btn-success">Submit</button>
       
      </form>
    </div>
  </div>
@endsection