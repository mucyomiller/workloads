<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class College extends Model
{
    protected $fillable=['name'];

    public function campuses()
    {
    	return $this->hasMany('App\Campus');
    }

}
