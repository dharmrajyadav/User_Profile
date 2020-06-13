<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Login;
use DB;


class UserLogin extends Controller
{
    


        public function getLoginView()
        {
            return view('users/login');
        }

        public function getLoginData(Request $request)
        {
            echo $password=$request['email'];
            echo $password=$request['password'];



        }

}
