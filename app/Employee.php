<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

     protected $fillable = [
        'first_name', 'last_name','company_id','email','phone'
    ];

	public function Companie()
	{
	    return $this->hasOne('App\Companie','id','company_id');
	}

	
}
