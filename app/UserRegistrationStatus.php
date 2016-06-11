<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model as Eloquent;

class UserRegistrationStatus extends Eloquent
{
   
   protected $table = 'user_registration_statuses';


    public function users()
    {
        return $this->hasMany('App\User');
    }
   
}
