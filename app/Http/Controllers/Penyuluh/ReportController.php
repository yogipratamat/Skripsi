<?php

namespace App\Http\Controllers\Penyuluh;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Farmer;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\GroupFarm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index(Request $request)
    {

        $groupFarms = GroupFarm::get();
        // $farmers = Farmer::get();

        $farmerActive = null;

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


            $farmers = Farmer::where('group_farm_id', $request->groupFarm)->pluck('id');
            $orders = $orders->whereIn('farmer_id', $farmers);
            $farmerActive = $request->groupFarm;
        }

        $orders = $orders->get();

        $total = 0;
        foreach ($orders as $order) {
            $total += $order->price;
        }

        if ($request->has('cetak')) {
            $pdf = PDF::loadView('penyuluh.report.cetak', [
                'orders' => $orders, 'monthStartDate' => $monthStartDate, 'monthEndDate' => $monthEndDate,
                'total' => $total
            ]);

            return $pdf->download('laporan-pesanan-pestisida.pdf');
        }

        return view('penyuluh.report.index', compact('orders', 'monthEndDate', 'monthStartDate', 'total',  'farmerActive', 'groupFarms'));
    }
}
