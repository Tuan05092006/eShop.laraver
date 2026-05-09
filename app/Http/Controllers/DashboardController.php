<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = Order::with('orderDetails.product')
            ->where('user_id', $user->id)
            ->latest()
            ->get();
            
        $orderCount = $orders->count();
        
        return view('dashboard', compact('user', 'orders', 'orderCount'));
    }
}
