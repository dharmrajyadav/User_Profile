<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\userDetails;
use App\Login;
use DB;
use Validator,Redirect,Response,File;
Use Image;
Use App\Photo;
use Intervention\Image\Exception\NotReadableException;

class User extends Controller
{


    public function __construct()
    {

    }


    public function createUser(Request $request)
    {
        
        request()->validate([
            'photo_name' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
       
       if ($files = $request->file('photo_name')) {
           
       
          // for save original image
          $ImageUpload = Image::make($files);
          $originalPath = 'images/';
          $ImageUpload->save($originalPath.$files->getClientOriginalName());
           
          // for save thumnail image
          $thumbnailPath = 'thumbnail/';
          $ImageUpload->resize(250,125);
          $ImageUpload = $ImageUpload->save($thumbnailPath.$files->getClientOriginalName());
       
        
        }
               

        $userDetails=new userDetails();
        $userDetails->name=$request['name'];
        $userDetails->date_of_birth=$request['dob'];
        $userDetails->email_id=$request['email'];
        $userDetails->phone_no=$request['phone'];
        $userDetails->address=$request['address'];
        $userDetails->image=$files->getClientOriginalName();
        $userDetails->user_password=$request['password'];
        
        $userDetails->save();

        $login=new Login();
        $login->email_id=$request['email'];
        $login->password=$request['password'];
        $login->save();
      
        $message="User with Name->".$request['name']."<-Inserted Successfully";
        return redirect('/getUserDetails')->with('message', $message);
        
    }


    public function getUserDetails()
    {
        echo "testData()";
    }


    public function getUserData()
    {
       // $users = DB::table('user_details')->get();
        $users = DB::table('user_details')->get();
        $userData=json_encode($users);
        return view('users.userDetail',['userData'=> $userData]);
    }

public function viewUserData($id)
{
    
    $userId=$id;
    $user=DB::table('user_details')->where('id',$userId)->get();
    
    $userData=json_encode($user);
    return view('users.profileDetails',['userData'=>$userData]);
}


public function userUpdate(Request $request)
{


    
//     request()->validate([
//         'photo_name' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//    ]);
   
//    $files = $request->file('photo_name');
//    dd($files);

//    if ($files = $request->file('photo_name')) {
       
//       // for save original image
//       $ImageUpload = Image::make($files);
//       $originalPath = 'public/images/';
//       $ImageUpload->save($originalPath.$files->getClientOriginalName());
       
//       // for save thumnail image//Resized image
//       $thumbnailPath = 'public/thumbnail/';
//       $ImageUpload->resize(250,125);
//       $ImageUpload = $ImageUpload->save($thumbnailPath.$files->getClientOriginalName());
//    }




    $user_Id=$request->id;
    $name=$request->name;
    $dob=$request->dob;
    $email=$request->email;
    $phone=$request->phone;
    $address=$request->address;
    $image=$request->photo_name;
    $password=$request->password;
    
    DB::table('user_details')
            ->where('id',$user_Id)
            ->update(array('id' =>$user_Id,'name' =>$name,'date_of_birth' =>$dob,'email_id' =>$email,'phone_no' =>$phone,
            'address' =>$address,'image' =>$image,'user_password' =>$password));


              $message="User with Id-".$user_Id."-updated Successfully";
              return redirect()->back()->with('message', $message);
}


public function userDelete($id)
{
        $userId=$id;
        $message="User with Id-".$userId."deleted Successfully";
        $user=DB::table('user_details')->where('id',$userId)->delete();
        return redirect()->back()->with('message', $message);
}





}
