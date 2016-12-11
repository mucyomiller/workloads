<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Campus extends Model
{
    protected $fillable =['name'];

    function colleges()
    {
    	return $this->belongsToMany('College');
    }

}
