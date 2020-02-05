<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentProgramModel extends Model
{
    protected $table = 'student_program';

    
    public function last_change_by_user()
    {
    	return $this->belongsTo('App\User', 'id_user');
    }
}
