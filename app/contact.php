<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
   protected $table = 'contacts';

   protected $fillable = [
        'primary_contact','user_id'
    ];
    
}
