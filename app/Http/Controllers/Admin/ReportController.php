<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Farmer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rent;

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

        $rents = Rent::whereBetween('date', [$monthStartDate, $monthEndDate]);

        if ($request->farmer) {
            $rents = $rents->where('farmer_id', $request->farmer);
            $farmerActive = $request->farmer;
        }

        $rents = $rents->get();

        $total = 0;
        foreach ($rents as $rent) {
            $total += $rent->price;
        }

        return view('admin.report.index', compact('rents', 'monthEndDate', 'monthStartDate', 'total', 'farmers', 'farmerActive'));
    }
}
