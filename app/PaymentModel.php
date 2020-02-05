<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentModel extends Model
{
    protected $table = 'payment';
    
    public function students()
    {
    	return $this->belongsTo('App\StudentModel', 'id_student');	
    }

    
    public function last_change_by_user()
    {
    	return $this->belongsTo('App\User', 'id_user');
    }
}
