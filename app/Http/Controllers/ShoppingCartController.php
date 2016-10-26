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
        $order = Order::where('reference', '=', session('orderRef'))->first();
        if (!isset($order)) {
            return redirect()->to('/');
        }
        $reference = $order->reference;
        $total = $order->total;
        $rnd = microtime();
        $storekey = "V1117211";

        $hashstr = "094100000012005" . $reference . $total . "https://istanbulmarathon.co/handle3D" . "https://istanbulmarathon.co/handle3D" . $rnd  . $storekey;

        $hash = base64_encode(pack('H*',sha1($hashstr)));

    	return view('components.payment', compact('extras', 'reference', 'total', 'rnd', 'hash'));
    }
}
