<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    protected $fillable = [
    	'name',
    	'description',
    	'coverPhoto',
    	'price',
    ];
}
