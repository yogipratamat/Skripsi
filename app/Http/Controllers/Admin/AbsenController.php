<?php

namespace App\Http\Controllers\Admin;

use App\Models\Farmer;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;

class AbsenController extends Controller
{
    public function index(Request $request)
    {
        $authUser = auth()->user();
        $groupFarmId = $authUser->farmer->groupFarm->id_group_farm;

        $farmers = Farmer::where('group_farm_id', $groupFarmId)->where('id_farmer', '!=', $authUser->farmer->id_farmer)->orderBy('created_at', 'desc')->get();
        // dd($farmers);

        if ($request->has('cetak')) {
            $pdf = PDF::loadView('admin.meeting.cetak', [
                'farmers' => $farmers,
            ]);

            return $pdf->download('absen-petani.pdf');
        }
    }
}
