@extends('layouts.master')
@section('title','Create User')
@section('content')
  <div class="row mt-5">
    <div class="col-sm-8 offset-sm-2">
      <form action="{{route('user.form')}}" method = "post" enctype='multipart/form-data'>
        @csrf

        <div class="header">
            <h4 style="text-decoration: underline;color: #007bff;">Create User</h4>
            
        </div>

        <div class="form-group">
          <label for="firstname">User name:</label>
          <input type="text" name = "name" id = "name" class="form-control" required>
        </div>
        
       <div class="form-group">
          <label for="dob">Date Of Birth:</label>
          <input type="text" name = "dob" id = "dob" class="form-control" placeholder="YYYY/MM/DD" >
          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
        </div> 
       
        <div class="form-group">
          <label for="email">Email_Id:</label>
          <input type="text" name = "email" id = "email" class="form-control" required>
        </div>
        
        <div class="form-group">
          <label for="phone">Phone Number:</label>
          <input type="text" name = "phone" id = "phone" class="form-control" required>
        </div>
        
        <div class="form-group">
          <label for="address"></label>
          Address-Line-1:<input type="text" name = "address" id = "address" class="form-control" palceholder="City,State,Country,ZipCode"  required>
         
        </div>

        <div class="form-group">
          <label for="password">User Password:</label>
          <input type="text" name = "password" id = "password" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="image">Image:</label>
          <input type="file" name="photo_name">
        </div>
        
        

        <button type = "submit" class = "btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
@endsection


