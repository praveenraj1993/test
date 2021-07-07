@extends('layouts.master')
@section('title','Employees Index')
@section('content')
  <div class="row">
    <div class="col-sm-12">
    <a class="form-group">
        <a href="{{ route('employees.create') }}">Create</a>          
     </a>
</div>
     <!-- <div class="col-sm-2 offset-sm-1">
      <form action="/search" method="get">
        @csrf
        <div class="form-group">
          <label for="search">Search:</label>
          <input type="text" name = "search" id = "search" class="form-control" placeholder="search any">
        </div>
        <button type = "submit" class = "btn btn-success">Search</button>
      </form>
</div>
<div class="col-sm-2 offset-sm-1">
      <form action="/sort" method="get">
        @csrf
        <div class="form-group">
          <label for="sort">Sort:</label>
          <select name="sort" id = "sort" class="form-control" required>
                  <option value="ASC">ASC</option>
                  <option value="DESC">DESC</option>
                
                  
                </select>
         </div>
        <button type = "submit" class = "btn btn-success">Sort</button>
      </form> -->
     
            
                
                <div class="col-lg-6">
                  <div class="form-group">
                        <label>Type a name</label>
                        <input type="text" name="country" id="country" placeholder="Enter name" class="form-control">
                    </div>
                    <div id="country_list"></div>                    
                </div>
                <div class="col-lg-3"></div>
          
    
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <script type="text/javascript">
            $(document).ready(function () {
             
                $('#country').on('keyup',function() {
                    var query = $(this).val(); 
                    $.ajax({
                       
                        url:"{{ route('search') }}",
                  
                        type:"GET",
                       
                        data:{'country':query},
                       
                        success:function (data) {
                          
                            $('#country_list').html(data);
                        }
                    })
                    // end of ajax call
                });

                
                $(document).on('click', 'li', function(){
                  
                    var value = $(this).text();
                    $('#country').val(value);
                    $('#country_list').html("");
                });
            });
        </script>

      <table class="table">
        <tr>
          <th>ID</th>
          <th>UID</th>
          <th>First Name</th>
          <th>Email</th>
          <th>Address</th>
          <th>Department</th>
          <th>Phone No.</th>
          <th>Image</th>
        </tr>
        @foreach($employees as $employee)
        
          <tr class = "text-center">
            <td>{{ $employee->id }}</td>
            <td>{{ $employee->uid }}</td>
            <td>{{ $employee->firstname }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->address }}</td>
            <td>{{ $employee->department }}</td>
            <td>{{ $employee->phone }}</td>
          
            <td><img src="{{$employee->photo}}" width="100" height="100"</td>
            <td><a href="{{route('employees.edit',['id'=>$employee->id])}}" class = "btn btn-info">Edit</a></td>
            <td><a href="{{route('employees.destroy',['id'=>$employee->id])}}" class = "btn btn-danger">Delete</a></td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
@endsection