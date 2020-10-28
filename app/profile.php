<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $table="users";

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function setfirstnameAttribute($value)
    {
    	return ($this->attributes['firstname'] = ucfirst($value));
    }

    public function setsurnameAttribute($value)
    {
    	return ($this->attributes['surname'] = ucfirst($value));
    }

}
