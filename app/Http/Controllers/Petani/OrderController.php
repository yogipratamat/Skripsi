<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use App\Models\Farmer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $farmer = Farmer::where('user_id', $user->id)->first();

        $orders = Order::where('farmer_id', $farmer->id)->get();
        return view('petani.order.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::find($id);

        $total = 0;
        foreach ($order->products as $product) {
            $total += $product->pivot->total_price;
        }

        return view('petani.order.show', compact('order', 'total'));
    }
}
