<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach($cart as $item) {
            $total += $item['price'];
        }
        return view('public.cart', compact('cart', 'total'));
    }

    public function addToCart($id)
    {
        $car = Product::with('category')->findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            // Already in cart - for cars usually only one, but logic holds
        } else {
            $cart[$id] = [
                "name" => $car->name,
                "brand" => $car->brand->name,
                "price" => $car->price,
                "image" => $car->image,
                "model" => $car->model
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Kiệt tác đã được thêm vào giỏ hàng của bạn!');
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Đã xóa xe khỏi giỏ hàng.');
        }
        return redirect()->back();
    }
}
