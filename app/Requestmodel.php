<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requestmodel extends Model
{
    protected $table="requests";
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
