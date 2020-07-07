<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
    	'event_id', 'place', 'photo', 'caption',
    ];

     public function address(){
    	return $this->belongsTo(Address::class);
    }
}
