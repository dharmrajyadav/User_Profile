<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userDetails extends Model
{
        protected $table="user_details";
        protected $fillable=['id','name','date_of_birth'];
}
