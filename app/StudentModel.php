<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    
    protected $table = 'student';

    public function classic()
    {
    	return $this->belongsTo('App\ClassModel', 'id_class');
    }

    public function programs()
    {
    	return $this->belongsToMany('App\ProgramModel','student_program', 'id_student', 'id_program');
    }
    public function payments()
    {
    	return $this->hasMany('App\PaymentModel', 'id_student');
    }

    
    public function last_change_by_user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
}
