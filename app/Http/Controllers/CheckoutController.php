<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        if(count($cart) == 0) return redirect()->route('home');
        
        $total = 0;
        foreach($cart as $item) {
            $total += $item['price'];
        }
        
        return view('public.checkout', compact('cart', 'total'));
    }

    public function process(Request $request)
    {
        $cart = session()->get('cart', []);
        
        if(!auth()->check()) {
            return redirect()->route('login')->with('info', 'Vui lòng đăng nhập để hoàn tất đặt hàng.');
        }

        if(count($cart) == 0) return redirect()->route('home');

        // 1. Create the main Order
        $order = \App\Models\Order::create([
            'user_id' => auth()->id(),
            'code' => 'ORD-' . strtoupper(bin2hex(random_bytes(4))),
            'status' => 'pending',
        ]);

        // 2. Create OrderDetails for each item in cart
        foreach($cart as $id => $details) {
            \App\Models\OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => 1,
                'price' => $details['price']
            ]);
        }

        session()->forget('cart');
        return view('public.success');
    }
}
