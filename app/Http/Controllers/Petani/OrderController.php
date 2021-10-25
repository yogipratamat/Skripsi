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

        // $farmer = Farmer::where('user_id', $user->id_user)->first();
        $farmer = Farmer::where('id_user', $user->id_user)->first();

        // $orders = Order::where('farmer_id', $farmer->id_farmer)->orderBy('created_at', 'desc')->get();
        $orders = Order::where('id_farmer', $farmer->id_farmer)->orderBy('created_at', 'desc')->get();
        return view('petani.order.index', compact('orders'));
    }

    public function show($id_order)
    {
        $order = Order::find($id_order);

        $total = 0;
        foreach ($order->products as $product) {
            $total += $product->pivot->total_price;
        }

        return view('petani.order.show', compact('order', 'total'));
    }
}
