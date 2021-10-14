<?php

namespace App\Http\Controllers\Admin;

use App\Models\Farmer;
use App\Models\Subsidy;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;

class CetakSubsidyController extends Controller
{
    public function index(Request $request, $id_subsidy)
    {
        $user = auth()->user();

        $farmer = Farmer::where('user_id', $user->id_user)->first();

        $subsidy = Subsidy::find($id_subsidy);

        if ($request->has('cetak')) {
            $pdf = PDF::loadView('admin.subsidy.cetak', [
                'subsidy' => $subsidy,
            ]);

            return $pdf->download('bukti-pengambilan-subsidy.pdf');
        }
    }
}
