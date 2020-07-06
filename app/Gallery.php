<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
    	'event', 'place', 'photo', 'caption',
    ];
}
