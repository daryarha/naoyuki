<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TargetMModel extends Model
{
    
    protected $table = 'target';

    
    public function last_change_by_user()
    {
    	return $this->belongsTo('App\User', 'id_user');
    }
}
