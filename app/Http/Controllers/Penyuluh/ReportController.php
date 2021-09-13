<?php

namespace App\Http\Controllers\Penyuluh;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Farmer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index(Request $request)
    {

        $farmers = Farmer::get();

        $farmerActive = null;

        $monthStartDate = Carbon::now()->startOfMonth()->format('Y-m-d'); // awal bulan
        $monthEndDate = Carbon::now()->endOfMonth()->format('Y-m-d'); // akhir bulan

        if ($request->startDate) {
            $monthStartDate = $request->startDate;
        }

        if ($request->endDate) {
            $monthEndDate = $request->endDate;
        }

        $orders = Order::whereBetween('date', [$monthStartDate, $monthEndDate]);

        if ($request->farmer) {
            $orders = $orders->where('farmer_id', $request->farmer);
            $farmerActive = $request->farmer;
        }

        $orders = $orders->get();

        $total = 0;
        foreach ($orders as $order) {
            $total += $order->price;
        }

        return view('penyuluh.report.index', compact('orders', 'monthEndDate', 'monthStartDate', 'total', 'farmers', 'farmerActive'));
    }
}
