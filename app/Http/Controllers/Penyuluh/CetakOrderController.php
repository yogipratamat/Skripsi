<?php

namespace App\Http\Controllers\Penyuluh;

use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class CetakOrderController extends Controller
{
    public function index(Request $request, $id_order)
    {
        // $orders = Order::get();
        $order = Order::find($id_order);

        $total = 0;
        foreach ($order->products as $product) {
            $total += $product->pivot->total_price;
        }

        if ($request->has('cetak')) {
            $pdf = PDF::loadView('penyuluh.order.cetak', [
                'order' => $order,
                'total' => $total
            ]);

            return $pdf->download('bukti-pengambilan-pestisida.pdf');
        }
    }
}
