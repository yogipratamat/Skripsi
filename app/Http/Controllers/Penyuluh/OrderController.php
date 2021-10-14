<?php

namespace App\Http\Controllers\Penyuluh;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Farmer;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::orderBy('created_at', 'desc')->get();

        $monthStartDate = Carbon::now()->startOfMonth()->format('Y-m-d'); // awal bulan
        $monthEndDate = Carbon::now()->endOfMonth()->format('Y-m-d'); // akhir bulan

        if ($request->startDate) {
            $monthStartDate = $request->startDate;
        }

        if ($request->endDate) {
            $monthEndDate = $request->endDate;
        }

        $orders = Order::orderBy('created_at', 'desc')->whereBetween('date', [$monthStartDate, $monthEndDate]);

        if ($request->groupFarm) {

            $farmers = Farmer::where('group_farm_id', $request->groupFarm)->pluck('id_group_farm');
            $orders = $orders->whereIn('farmer_id', $farmers);
            $farmerActive = $request->groupFarm;
        }

        $orders = $orders->get();

        $total = 0;
        foreach ($orders as $order) {
            $total += $order->price;
        }

        return view('penyuluh.order.index', compact('orders'));
    }

    public function show($id_order)
    {
        $order = Order::find($id_order);

        $total = 0;
        foreach ($order->products as $product) {
            $total += $product->pivot->total_price;
        }

        return view('penyuluh.order.show', compact('order', 'total'));
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
