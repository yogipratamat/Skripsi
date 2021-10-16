<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rent;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class CetakSewaAlatController extends Controller
{
    public function index(Request $request, $id_rent)
    {
        $date = Carbon::today();
        $rent = Rent::find($id_rent);

        // $total = 0;
        // foreach ($rent->tools as $tool) {
        //     $total += $tool->pivot->total_price;
        // }

        if ($request->has('cetak')) {
            $pdf = PDF::loadView('admin.rent.cetak', [
                'rent' => $rent,
                // 'total' => $total,
                'date'  => $date
            ]);

            return $pdf->download('bukti-selesai-sewa.pdf');
        }
    }
}
