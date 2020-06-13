<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
            protected $table='user_credentials';
            protected $fillable=['email_id','password'];
}
