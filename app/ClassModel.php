<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $table = 'class';

    public function students()
    {
    	return $this->hasMany('App\StudentModel');	
    }

    public function materi()
    {
    	return $this->belongsToMany('App\MateriModel','class_materi', 'id_class', 'id_materi');
    }

    
    public function last_change_by_user()
    {
    	return $this->belongsTo('App\User', 'id_user');
    }
}

