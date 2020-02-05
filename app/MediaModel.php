<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaModel extends Model
{
     protected $table = 'leverage_media';

     
    public function last_change_by_user()
    {
    	return $this->belongsTo('App\User', 'id_user');
    }
}
