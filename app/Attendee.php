<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    protected $table = 'attendees';

    protected $fillable = [
    	'passport_number',
    	'name',
    	'surname',
    	'birth_date',
    	'gender',
    	'country',
    	'city',
    	'phone',
    	'email',
    	'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
