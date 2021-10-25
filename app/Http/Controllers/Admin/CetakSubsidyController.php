<?php

namespace App\Http\Controllers\Admin;

use App\Models\Farmer;
use App\Models\Subsidy;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;
use App\Models\SubsidyFarmer;
use Carbon\Carbon;

class CetakSubsidyController extends Controller
{
    public function index(Request $request, $id_subsidy, $id_farmer)
    {
        $date = Carbon::today();

        $farmer = Farmer::where('id_farmer', $id_farmer)->first();

        // $subsidyFarmer = SubsidyFarmer::where('subsidy_id', $id_subsidy)->where('farmer_id', $id_farmer)->first();
        $subsidyFarmer = SubsidyFarmer::where('id_subsidy', $id_subsidy)->where('id_farmer', $id_farmer)->first();

        $subsidy = Subsidy::find($id_subsidy);

        if ($request->has('cetak')) {
            $pdf = PDF::loadView('admin.subsidy.cetak', [
                'subsidy' => $subsidy,
                'subsidyFarmer' => $subsidyFarmer,
                'farmer' => $farmer,
                'date'  => $date
            ]);

            return $pdf->download('bukti-pengambilan-subsidy.pdf');
        }
    }
}
