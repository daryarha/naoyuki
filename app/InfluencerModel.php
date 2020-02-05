<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfluencerModel extends Model
{
     protected $table = 'leverage_influencer';

     
    public function last_change_by_user()
    {
    	return $this->belongsTo('App\User', 'id_user');
    }
}
