<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
    	'hotel_id',
    	'name',
    	'price'
    ];

    public function hotel()
    {
    	return $this->belongsTo('App\Hotel');
    }
}
