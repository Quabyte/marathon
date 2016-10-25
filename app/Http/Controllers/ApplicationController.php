<?php

namespace App\Http\Controllers;

use App\Room;
use App\Extra;
use App\Hotel;
use App\Order;
use App\Marathon;
use App\OrderItem;
use Carbon\Carbon;
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
        $order = Order::where('reference', '=', session('orderRef'))->firstOrFail();

        $orderItem = new OrderItem();
        $orderItem->title = $extra->name;
        $orderItem->price = $extra->price;
        $orderItem->order_id = $order->id;
        $orderItem->created_at = Carbon::now('Europe/Istanbul');
        $orderItem->save();

        $cartItem = Cart::add($extra, $extra->name, 1, $extra->price);
        $cartItem->associate('App\Extra');

        return redirect()->back();
    }
}
