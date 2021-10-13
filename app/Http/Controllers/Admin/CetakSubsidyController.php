<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subsidy;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class CetakSubsidyController extends Controller
{
    public function index(Request $request)
    {
        $subsidies = Subsidy::get();

        if ($request->has('cetak')) {
            $pdf = PDF::loadView('admin.subsidy.cetak', [
                'farmers' => $subsidies,
            ]);

            return $pdf->download('bukti-pengambilan-subsidy.pdf');
        }
    }
}
