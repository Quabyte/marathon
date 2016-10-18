<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marathon extends Model
{
    protected $fillable = [
    	'name',
    	'coverPhoto',
    	'description',
    	'price'
    ];
}
