<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
    	'name_place',
    ];
    public function event(){
    	return $this->belongsTo(Event::class);
    }
     public function galleries(){
    	return $this->hasMany(Gallery::class);
    }
}
