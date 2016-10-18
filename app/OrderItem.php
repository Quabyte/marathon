<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';

    protected $fillable = [
    	'title',
    	'price',
    	'order_id',
    ];

    public function order()
    {
    	return $this->belongsTo('App\Order');
    }
}
