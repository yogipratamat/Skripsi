<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Farmer;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;
use App\Models\Rent;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $authUser = auth()->user();

        $groupFarmId = $authUser->farmer->groupFarm->id_group_farm;

        $farmers = Farmer::where('group_farm_id', $groupFarmId)->where('id_farmer', '!=', $authUser->farmer->id_farmer)->get();

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

        $rents = $rents->where('group_farm_id', $groupFarmId)->get();

        // $total = 0;
        // foreach ($rents as $rent) {
        //     $total += $rent->price;
        // }

        $total = 0;
        foreach ($rents as $rent) {
            $total += $rent->price;
        }

        if ($request->has('cetak')) {
            $pdf = PDF::loadView('admin.report.cetak', [
                'rents' => $rents, 'monthStartDate' => $monthStartDate, 'monthEndDate' => $monthEndDate,
                'total' => $total
            ]);

            return $pdf->download('laporan-penyewaan-alat.pdf');
        }

        return view('admin.report.index', compact('rents', 'monthEndDate', 'monthStartDate', 'total', 'farmers', 'farmerActive'));
    }
}
