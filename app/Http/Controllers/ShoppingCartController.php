<?php

namespace App\Http\Controllers;

use App\Extra;
use App\Order;
use App\Http\Requests;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShoppingCartController extends Controller
{
    public function index()
    {
    	$cartQty = session('attendeeQty');
    	return view('components.cart', compact('cartQty'));
    }

    public function destroy()
    {
    	Cart::destroy();

    	session()->forget('attendeeQty');

        $order = Order::where('reference', '=', session('orderRef'))->firstOrFail();
        $order->status = 'cancelled';
        $order->save();

        session()->forget('orderRef');

    	return redirect()->back();
    }

    public function payment()
    {
        $extras = Extra::all();
    	return view('components.payment', compact('extras'));
    }
}
