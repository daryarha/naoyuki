<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PotentialMModel extends Model
{
    protected $table = 'potential';

    
    public function last_change_by_user()
    {
    	return $this->belongsTo('App\User', 'id_user');
    }
}
