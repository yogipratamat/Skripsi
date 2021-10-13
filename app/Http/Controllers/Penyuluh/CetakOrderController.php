<?php

namespace App\Http\Controllers\Penyuluh;

use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class CetakOrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::get();

        if ($request->has('cetak')) {
            $pdf = PDF::loadView('penyuluh.order.cetak', [
                'orders' => $orders,
            ]);

            return $pdf->download('bukti-pengambilan-pestisida.pdf');
        }
    }
}
