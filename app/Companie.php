<?php


namespace App;


use Illuminate\Database\Eloquent\Model;


class Companie extends Model
{
	protected $table = 'Companies';

	 protected $fillable = [
        'name', 'email','logo','website'
    ];
}