<?php

namespace App\Http\Controllers\Penyuluh;

use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CetakOrderController extends Controller
{
    public function index(Request $request, $id_order)
    {

        $date = Carbon::today();
        $order = Order::find($id_order);

        $total = 0;
        foreach ($order->products as $product) {
            $total += $product->pivot->total_price;
        }

        if ($request->has('cetak')) {
            $pdf = PDF::loadView('penyuluh.order.cetak', [
                'order' => $order,
                'total' => $total,
                'date'  => $date
            ]);

            return $pdf->download('bukti-pengambilan-pestisida.pdf');
        }
    }
}
