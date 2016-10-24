<?php

namespace App\Http\Controllers;

use App\Extra;
use App\Order;
use Carbon\Carbon;
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

    public function destroy(Request $request)
    {
    	Cart::destroy();

    	session()->forget('attendeeQty');

        $order = Order::where('reference', '=', session('orderRef'))->firstOrFail();
        $order->status = 'cancelled';
        $order->updated_at = Carbon::now('Europe/Istanbul');
        $order->save();

        session()->forget('orderRef');

    	return redirect()->to('/');
    }

    public function payment()
    {
        $extras = Extra::all();

    	return view('components.payment', compact('extras'));
    }
}
