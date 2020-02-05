<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramModel extends Model
{
    protected $table = 'program';

    public function students()
    {
    	return $this->belongsToMany('App\StudentModel','student_program', 'id_student', 'id_program');
    }

    
    public function last_change_by_user()
    {
    	return $this->belongsTo('App\User', 'id_user');
    }
}
