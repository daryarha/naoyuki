<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriModel extends Model
{
    protected $table = 'materi';

    public function class()
    {
    	return $this->belongsToMany('App\ClassModel', 'class_materi', 'id_materi', 'id_class');
    }

    
    public function last_change_by_user()
    {
    	return $this->belongsTo('App\User', 'id_user');
    }
}

