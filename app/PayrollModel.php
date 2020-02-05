<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayrollModel extends Model
{
    protected $table = 'payroll';

    public function hr(){
    	return $this->belongsTo('App\HRModel', 'id_hr');
    }

    public function extra(){
    	return $this->hasOne('App\PayrollExtraModel','id');
    }

    
    public function last_change_by_user()
    {
    	return $this->belongsTo('App\User', 'id_user');
    }
}
