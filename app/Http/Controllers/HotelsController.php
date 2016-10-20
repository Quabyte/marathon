<?php

namespace App\Http\Controllers;

use App\Room;
use App\Hotel;
use App\Order;
use App\OrderItem;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class HotelsController extends Controller
{
    private $cookie;

    public function addHotel(Request $request, $id)
    {
    	$hotel = Hotel::findOrFail($id);
        $room = Room::where([
                ['hotel_id', '=', $hotel->id],
                ['name', '=', $request->roomType],
            ])->firstOrFail();
        // $room = $hotel->rooms()->where('name', '=', $request->roomType)->firstOrFail();
        $calculatedPrice = Hotel::calculatePrice($request->checkIn, $request->checkOut, $room->price);

        $hotelCombination = $room->hotel->name . ' (' . $room->name . ')';

        $cartItem = Cart::add($room->id, $hotelCombination, $request->roomQty, $calculatedPrice, ['room type' => $request->roomType]);
        $cartItem->associate('App\Room');

        $order = new Order;
        $order->status = 'creating';
        $order->reference = str_random(6);
        $order->total = $calculatedPrice;
        $order->currency = 978;
        $order->created_at = Carbon::now('Europe/Istanbul');
        $order->save();

        // if (session()->has('orderRef')) {
        //     session(['orderRef' => $order->reference]); 
        // } else {
        //     session(['orderRef' => $order->reference]);
        // }

        $orderItem = new OrderItem;
        $orderItem->title = $hotelCombination;
        $orderItem->price = $calculatedPrice;
        $orderItem->order_id = $order->id;
        $orderItem->created_at = Carbon::now('Europe/Istanbul');
        $orderItem->save();

        return redirect()->action('MarathonsController@index')->withCookie('orderRef', $order->reference, 60);
    }
}
