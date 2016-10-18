<?php

namespace App\Http\Controllers;

use App\User;
use App\Attendee;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;

class AttendeesController extends Controller
{
    public function create(Request $request)
    {
    	for ($i=1; $i <= session('attendeeQty') ; $i++) { 
	    	$this->validate($request, [
    			'identity' . $i => 'required',
    			'name' . $i => 'required',
    			'surname' . $i => 'required',
    			'birthdate' . $i => 'required',
    			'gender' . $i => 'required',
    			'country' . $i => 'required',
    			'city' . $i => 'required',
    			'phone' . $i => 'required',
    			'email' . $i => 'required',
    		]);
    	}

    	$user = new User;
    	$user->name = $request->name1;
    	$user->email = $request->email1;
    	$user->password = bcrypt(session('orderRef'));
    	$user->created_at = Carbon::now();
    	$user->save();

    	for ($i=1; $i <= session('attendeeQty') ; $i++) {
    		$user = User::where('email', '=', $request->email1)->firstOrFail();
    		
    		$attendee = new Attendee;
    		$attendee->passport_number = $request->input("identity$i");
    		$attendee->name = $request->input("name$i");
    		$attendee->surname = $request->input("surname$i");
    		$attendee->birth_date = $request->input("birthdate$i");
    		$attendee->gender = $request->input("gender$i");
    		$attendee->country = $request->input("country$i");
    		$attendee->city = $request->input("city$i");
    		$attendee->phone = $request->input("phone$i");
    		$attendee->email = $request->input("email$i");
    		$attendee->user_id = $user->id;
    		$attendee->created_at = Carbon::now();
    		$attendee->save();
    	}

    	return redirect()->action('ShoppingCartController@payment');
    }
}
