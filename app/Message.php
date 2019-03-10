<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
    	'user_id', 'title', 'content'
    ];

    public function users() {

    	return $this->belongsTo(User::class, 'id');
    	
    }
}
