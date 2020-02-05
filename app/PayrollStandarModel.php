<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayrollStandarModel extends Model
{
     protected $table = 'payroll_standar';

     
    public function last_change_by_user()
    {
    	return $this->belongsTo('App\User', 'id_user');
    }
}
