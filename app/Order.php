<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    	'user_id',
    	'status',
    	'reference',
    	'total',
    	'currency'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function orderItems()
    {
    	return $this->hasMany('App\OrderItem');
    }
}
