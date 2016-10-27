<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Attendee;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttendeesController extends Controller
{
    public function create(Request $request)
    {
    	for ($i=1; $i <= session('attendeeQty') ; $i++) { 
            $validator = Validator::make($request->all(), [
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
            // $messages = [
            //     'required' => 'This field is required!'
            // ];
      //   	$validator = $this->validate($request, [
    		// 	'identity' . $i => 'required',
    		// 	'name' . $i => 'required',
    		// 	'surname' . $i => 'required',
    		// 	'birthdate' . $i => 'required',
    		// 	'gender' . $i => 'required',
    		// 	'country' . $i => 'required',
    		// 	'city' . $i => 'required',
    		// 	'phone' . $i => 'required',
    		// 	'email' . $i => 'required',
    		// ], $messages);

            if ($validator->fails()) {
                return redirect()->back()->withErrors()->withInput();
            }
    	}

        $user = new User;
        $user->name = $request->name1;
        $user->surname = $request->surname1;
        $user->email = $request->email1;
        $user->password = bcrypt(session('orderRef'));
        $user->created_at = Carbon::now('Europe/Istanbul');
        $user->save();

    	for ($i=1; $i <= session('attendeeQty') ; $i++) {
    		$user = User::where('email', '=', $request->email1)->firstOrFail();
    		
    		$attendee = new Attendee;
    		$attendee->passport_number = $request->input("identity$i");
    		$attendee->name = $request->input("name$i");
    		$attendee->surname = $request->input("surname$i");
    		$attendee->birth_date = Carbon::createFromFormat('d/m/Y', $request->input("birthdate$i"));
    		$attendee->gender = $request->input("gender$i");
    		$attendee->country = $request->input("country$i");
    		$attendee->city = $request->input("city$i");
    		$attendee->phone = $request->input("phone$i");
    		$attendee->email = $request->input("email$i");
    		$attendee->user_id = $user->id;
    		$attendee->created_at = Carbon::now('Europe/Istanbul');
    		$attendee->save();
    	}

        // $createdUser = User::where('name', '=', $request->input('email1'))->firstOrFail();
        $currentOrder = Order::where('reference', '=', session('orderRef'))->firstOrFail();
        $currentOrder->user_id = $user->id;
        $currentOrder->save();

    	return redirect()->action('ShoppingCartController@payment');
    }
}
