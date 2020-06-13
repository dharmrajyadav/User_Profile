
     @extends('layouts.master')
@section('title','Employees Index')
@section('content')
  <div class="row">
    <div class="col-sm-12">
      <table class="table">
        <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Date Of Birth</th>
          <th>Email.</th>
          <th>Phone No.</th>
          <th>Address</th>
          <th>Image</th>
          <th>Password.</th>
          <th>Action.</th>
        </tr>
     
     
     
         <?php 
            $userData = json_decode($userData, true);
            
            ?>

           @foreach($userData as $userData)
            
                    <tr>
                    <td> {{$userData['id']}}</td>
                    <td> {{$userData['name']}}</td>
                    <td> {{$userData['date_of_birth']}}</td>
                    <td> {{$userData['email_id']}}</td>
                    <td> {{$userData['phone_no']}}</td>
                    <td> {{$userData['address']}}</td>
                    <td> {{$userData['image']}}</td>
                    <td> {{$userData['user_password']}}</td>
                   
                    <td> 
               <a class="btn btn-success" style="width: 75px;" href="{{route('user.getDetail',['id'=>$userData['id']])}}" >Update</a>
                         
                          <a class="btn btn-danger" style="width: 75px;" href="{{route('user.delete',['id'=>$userData['id']])}}">Delete</a>
                    
                        </td> 
                    </tr>
            
            @endforeach



            @if(session()->has('message'))
                 <div class="alert alert-success">
                 {{ session()->get('message') }}
                </div>
            @endif









