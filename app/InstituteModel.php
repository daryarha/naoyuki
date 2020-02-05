<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstituteModel extends Model
{
    protected $table = 'leverage_institute';

    
    public function last_change_by_user()
    {
    	return $this->belongsTo('App\User', 'id_user');
    }
}
