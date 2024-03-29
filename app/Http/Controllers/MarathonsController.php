<?php

namespace App\Http\Controllers;

use App\Order;
use App\Marathon;
use App\OrderItem;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class MarathonsController extends Controller
{
    public function index()
    {
    	$marathons = Marathon::all();

    	return view('marathonIndex', compact('marathons'));
    }

    public function addMarathons(Request $request)
    {
        if (!session()->has('orderRef')) {
            Cart::destroy();
            return redirect()->action('ApplicationController@index');
        }

        $attendees1 = $request->attendees1;
        $attendees2 = $request->attendees2;
        $attendees3 = $request->attendees3;
        $totalAttendees = $attendees1 + $attendees2 + $attendees3;

        if (session()->has('attendeeQty')) {
            session()->forget('attendeeQty');

            session(['attendeeQty' => $totalAttendees]);
        } else {
            session(['attendeeQty' => $totalAttendees]);
        }

        $order = Order::where('reference', '=', session('orderRef'))->firstOrFail();

        if ($attendees1 > 0) {
            $marathon = Marathon::findOrFail(1);
            $cartItem = Cart::add($marathon->id, $marathon->name, $attendees1, $marathon->price);
            $cartItem->associate('App\Marathon');

            $orderItem = new OrderItem;
            $orderItem->title = $marathon->name;
            $orderItem->quantity = $attendees1;
            $orderItem->unitPrice = $marathon->price;
            $orderItem->subtotal = $marathon->price * $attendees1;
            $orderItem->created_at = Carbon::now('Europe/Istanbul');
            $orderItem->updated_at = Carbon::now('Europe/Istanbul');
            $orderItem->order_id = $order->id;

            $orderItem->save();

            $order->save();
        }
        if ($attendees2 > 0) {
            $marathon = Marathon::findOrFail(2);
            $cartItem = Cart::add($marathon->id, $marathon->name, $attendees2, $marathon->price);
            $cartItem->associate('App\Marathon');

            $orderItem = new OrderItem;
            $orderItem->title = $marathon->name;
            $orderItem->quantity = $attendees2;
            $orderItem->unitPrice = $marathon->price;
            $orderItem->subtotal = $marathon->price * $attendees2;
            $orderItem->created_at = Carbon::now('Europe/Istanbul');
            $orderItem->updated_at = Carbon::now('Europe/Istanbul');
            $orderItem->order_id = $order->id;
            
            $orderItem->save();

        
            $order->save();
        }
        if ($attendees3 > 0) {
            $marathon = Marathon::findOrFail(3);
            $cartItem = Cart::add($marathon->id, $marathon->name, $attendees3, $marathon->price);
            $cartItem->associate('App\Marathon');

            $orderItem = new OrderItem;
            $orderItem->title = $marathon->name;
            $orderItem->quantity = $attendees3;
            $orderItem->unitPrice = $marathon->price;
            $orderItem->subtotal = $marathon->price * $attendees3;
            $orderItem->created_at = Carbon::now('Europe/Istanbul');
            $orderItem->updated_at = Carbon::now('Europe/Istanbul');
            $orderItem->order_id = $order->id;
            
            $orderItem->save();

        
            $order->save();
        }

        $order = Order::where('reference', '=', session('orderRef'))->firstOrFail();
        $order->status = 'selectedMarathon';
        $order->total = Cart::total();
        $order->updated_at = Carbon::now('Europe/Istanbul');
        $order->save();

        return redirect()->to('/cart');
    }
}
