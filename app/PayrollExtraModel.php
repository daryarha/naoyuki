<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayrollExtraModel extends Model
{
    
    protected $table = 'payroll_extra';


    public function payroll(){
    	return $this->belongsTo('App\PayrollModel','id');
    }

    
    public function last_change_by_user()
    {
    	return $this->belongsTo('App\User', 'id_user');
    }
}
