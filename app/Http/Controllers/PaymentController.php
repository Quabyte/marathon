<?php

namespace App\Http\Controllers;

use App\Order;
use Carbon\Carbon;
use App\Http\Requests;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PaymentController extends Controller
{
    public function send(Request $request)
    {
    	$order = Order::where('reference', '=', $request->cookie('orderRef'))->firstOrFail();

    	$clientId = '600300000';
    	$oid = $order->reference;
    	$amount = $order->total;
    	$okUrl = route('payment');
    	$failUrl = route('payment');
    	$storetype = '3d_pay_hosting';
    	$rnd = Carbon::now('Europe/Istanbul');
    	$storekey = '123456';
    	$islemtipi = 'Auth';
    	$taksit = '';

    	$hashstr = $clientId . $oid . $amount . $okUrl . $failUrl . $islemtipi . $taksit . $rnd . $storekey; //güvenlik amaçli hashli deger

		$hash = base64_encode(pack('H*',sha1($hashstr)));

		$payment = [
			'clientid' => $clientId,
			'oid' => $oid,
			'amount' => $amount,
			'okUrl' => $okUrl,
			'failUrl' => $failUrl,
			'storetype' => '3d_pay_hosting',
			'rnd' => $rnd,
			'hash' => $hash,
			'firmaadi' => 'Acikgise Bilet Hizmetleri ve Organizasyon A.S',
			'islemtipi' => $islemtipi,
			'taksit' => $taksit,
			'currency' => '949',
			'lang' => 'en'
		];

		$client = new Client();
		$response = $client->request('POST', 'https://entegrasyon.asseco-see.com.tr/fim/est3Dgate', ['form_params' => $payment]);
    }

    public function confirm()
    {
    	return view('components.fail');
    }
}
