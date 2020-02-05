<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HRModel extends Model
{
    protected $table = 'hr';

	public function payroll()
	{
		return $this->hasMany('App\PayrollModel', 'id_hr');
	}

	
    public function last_change_by_user()
    {
    	return $this->belongsTo('App\User', 'id_user');
    }
}
	