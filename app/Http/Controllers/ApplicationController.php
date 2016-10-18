<?php

namespace App\Http\Controllers;

use App\Room;
use App\Extra;
use App\Hotel;
use App\Marathon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class ApplicationController extends Controller
{
    public function index()
    {
    	$hotels = Hotel::all();

    	return view('hotels', compact('hotels'));
    }

    public function addExtra($id)
    {
        $extra = Extra::findOrFail($id);
        Cart::add($extra->id, $extra->name, session('attendeeQty'), $extra->price);

        return redirect()->back();
    }
}
