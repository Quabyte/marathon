<?php

namespace App;

use App\Room;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
    	'name',
    	'coverPhoto',
    	'rate',
    	'location',
    	'description'
    ];

    public function rooms()
    {
    	return $this->hasMany('App\Room');
    }

    public static function calculatePrice($checkIn, $checkOut, $price, $quantity)
    {
        $total = ($checkOut - $checkIn) * $price;

        return $total;
    }
}
