<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassMateriModel extends Model
{
    protected $table = 'class_materi';

    
    public function last_change_by_user()
    {
    	return $this->belongsTo('App\User', 'id_user');
    }
}
