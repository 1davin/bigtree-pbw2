<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;


class OrderController extends Controller
{
    public function index(){

        return view ('payment');

    }
    public function checkout(Request $request){
        $request->request->add(['total_price' => $request->qty * 10000, 'status' => 'unpaid']);
        $order = Order::create($request->all());

        /*Install Midtrans PHP Library (https://github.com/Midtrans/midtrans-php)
composer require midtrans/midtrans-php
                              
Alternatively, if you are not using **Composer**, you can download midtrans-php library 
(https://github.com/Midtrans/midtrans-php/archive/master.zip), and then require 
the file manually.   

require_once dirname(__FILE__) . '/pathofproject/Midtrans.php'; */

//SAMPLE REQUEST START HERE

// Set your Merchant Server Key
\Midtrans\Config::$serverKey = config('midtrans.server_key');
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;

$params = array(
    'transaction_details' => array(
        'order_id' => $order->id,
        'gross_amount' => $order->total_price,
    ),
    'customer_details' => array(
        'name' => $request->name,
        'phone' => $request->phone,
    ),
);

$snapToken = \Midtrans\Snap::getSnapToken($params);
return view('checkout',compact('snapToken','order'));

    }
}
