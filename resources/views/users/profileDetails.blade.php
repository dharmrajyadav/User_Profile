@extends('layouts.master')
@section('title','User Profile')
@section('content')
  <div class="row">
    <div class="col-sm-12">
      <table class="table">
      <tr>
      <th style="text-align: center;text-decoration: underline;"><h4>User Profile</h4></th>
      </tr>

      <?php
      
      $userData = json_decode($userData, true);
    
      ?>

    <form  action="{{route('user.getDetailupdate')}}" method="post" enctype='multipart/form-data'>
    <tr class = "text-center">
            <td>Id:</td><td><input type="text" name="id" id="id" value="{{ $userData[0]['id']}}" readonly></td>
    </tr>     
    <tr class = "text-center">
            <td>Name:</td><td><input type="text" name="name" id="name" value="{{ $userData[0]['name']}}"></td>
    </tr>
    <tr class = "text-center">
            <td>Date_Of_Birth:</td><td><input type="text" name="dob" id="dob" value="{{ $userData[0]['date_of_birth']}}"></td>
    </tr>
    <tr class = "text-center">
            <td>Email_id:</td><td><input type="text" name="email" id="email" value="{{ $userData[0]['email_id']}}"></td>
    </tr>
    <tr class = "text-center">
            <td>Phone_no:</td><td><input type="text" name="phone" id="phone" value="{{ $userData[0]['phone_no']}}"></td>
    </tr>
    <tr class = "text-center">
            <td>Address:</td><td><input type="text" name="address" id="address" value="{{ $userData[0]['address']}}"></td>
    </tr>
    <tr class = "text-center">
    
<td>Image:</td><td><img src="{{URL::asset('/images/'.$userData[0]['image'])}}" alt="profile Pic" name="photo_name" id="photo_name" height="200" width="200"><br> 

</tr>
    <tr class = "text-center">
            <td>User_Password:</td><td><input type="text" name="password" id="password" value="{{ $userData[0]['user_password']}}"></td>
    </tr>
  
    <tr>
            <td> <button type="submit" class="btn btn-success">Update </td> 
    </tr>
</form>
        
      </table>
    </div>
  </div>
@endsection


@if(session()->has('message'))
                 <div class="alert alert-success">
                 {{ session()->get('message') }}
                </div>
            @endif

