<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CashflowModel extends Model
{
    use Notifiable;
    protected $table = 'cashflow';
    
    public function category()
    {
    	return $this->belongsTo('App\CashFCategoryModel', 'id_category');
    }

    public function last_change_by_user()
    {
    	return $this->belongsTo('App\User', 'id_user');
    }
}
