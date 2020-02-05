<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeopleModel extends Model
{
     protected $table = 'leverage_people';

     
    public function last_change_by_user()
    {
    	return $this->belongsTo('App\User', 'id_user');
    }
}
