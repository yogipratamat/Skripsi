<?php

namespace App\Http\Controllers\Penyuluh;

use App\Models\Order;
use App\Models\Farmer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::get();

        return view('penyuluh.order.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::find($id);

        $total = 0;
        foreach ($order->products as $product) {
            $total += $product->pivot->total_price;
        }

        return view('penyuluh.order.show', compact('order', 'total'));
    }

    public function approve($id)
    {

        DB::table('orders')->where('id', $id)->update([
            'status' => 1
        ]);

        session()->flash('success', 'Berhasil menerima pesanan');

        return redirect()->back();
    }
}
