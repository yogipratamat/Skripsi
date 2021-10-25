<?php

namespace App\Http\Controllers\Penyuluh;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Farmer;
use App\Models\GroupFarm;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $groupFarms = GroupFarm::get();

        $farmerActive = null;

        $orders = Order::orderBy('created_at', 'desc');

        if ($request->groupFarm) {

            // $farmers = Farmer::where('group_farm_id', $request->groupFarm)->pluck('id_farmer');
            $farmers = Farmer::where('id_group_farm', $request->groupFarm)->pluck('id_farmer');
            // $orders = $orders->whereIn('farmer_id', $farmers);
            $orders = $orders->whereIn('id_farmer', $farmers);
            $farmerActive = $request->groupFarm;
        }

        $orders = $orders->get();

        return view('penyuluh.order.index', compact('orders', 'farmerActive', 'groupFarms'));
    }

    public function show($id_order)
    {
        $date = Carbon::today();
        $order = Order::find($id_order);

        $total = 0;
        foreach ($order->products as $product) {
            $total += $product->pivot->total_price;
        }

        return view('penyuluh.order.show', compact('order', 'total', 'date'));
    }

    public function approve($id_order)
    {

        DB::table('orders')->where('id_order', $id_order)->update([
            'status' => 1
        ]);

        session()->flash('success', 'Berhasil menerima pesanan');

        return redirect()->back();
    }

    public function accept($id_order)
    {

        DB::table('orders')->where('id_order', $id_order)->update([
            'status' => 2
        ]);

        session()->flash('success', 'Berhasil proses pengambilan');

        return redirect()->back();
    }
}
