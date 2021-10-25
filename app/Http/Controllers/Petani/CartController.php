<?php

namespace App\Http\Controllers\Petani;

use App\Models\Order;
use App\Models\Farmer;
use App\Models\Petani;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $totalPrice = 0;
        $total = 0;

        $carts = session()->get('carts');

        if ($carts != null) {
            foreach ($carts as $cart) {
                $totalPrice = $totalPrice + $cart['totalPrice'];
                $total += $cart['qty'];
            }
        }

        // dd($carts);

        return view('petani.cart.index', compact('carts', 'totalPrice', 'total'));
    }


    public function addToCart(Request $request)
    {
        $id = request('id');
        $qty = request('qty');
        $image = request('image');
        $price = request('price');
        $totalPrice = request('totalPrice');
        $name = request('name');

        $product = [
            'id' => $id,
            'qty' => $qty,
            'image' => $image,
            'price' => $price,
            'totalPrice' => $totalPrice,
            'name' => $name,
        ];

        $carts = session()->get('carts');

        if (!$carts) {
            $carts[$id] = $product;
            session()->put('carts', $carts);
        } else {
            if (isset($carts[$id])) {
                $carts[$id]['qty'] = $carts[$id]['qty'] + $qty;
                $carts[$id]['totalPrice'] = $carts[$id]['totalPrice'] + $totalPrice;
                session()->put('carts', $carts);
            } else {
                $carts[$id] = $product;
                session()->put('carts', $carts);
            }
        }

        session()->flash('success', 'Berhasil Menambahkan ke card');
        return session()->get('carts');
    }

    public function deleteFromCart($id)
    {

        $carts = session()->get('carts');

        unset($carts[$id]);

        session()->put('carts', $carts);
        session()->flash('success', 'Berhasil Menghapus Cart');

        return redirect()->back();
    }

    public function checkout(Request $request)
    {

        $total = 0;

        $userId = auth()->user()->id_user;
        // $farmer = Farmer::where('user_id', $userId)->first();
        $farmer = Farmer::where('id_user', $userId)->first();


        $carts = session()->get('carts');
        foreach ($carts as $cart) {
            $total = $total + ($cart['price'] * $cart['qty']);
        }

        $data = [
            'date' => date('Y-m-d'),
            'price' => $total,
            // 'farmer_id' => $farmer->id_farmer,
            'id_farmer' => $farmer->id_farmer,
            'status' => 0
        ];

        //membuat data order
        $order = Order::create($data);

        foreach ($carts as $cart) {

            $product = Product::find($cart['id']);
            $qty = $product->stock;
            $newqty = $qty - $cart['qty'];

            $product->stock = $newqty;
            $product->save();


            DB::table('order_products')->insert(
                [
                    'qty' => $cart['qty'],
                    'price' => $cart['price'],
                    'total_price' => $cart['totalPrice'],
                    // 'order_id' => $order->id_order,
                    // 'product_id' => $cart['id'],
                    'id_order' => $order->id_order,
                    'id_product' => $cart['id'],
                ]
            );
        }

        Session::forget('carts');

        session()->flash('order', 'Berhasil Memesan Produk');
        return redirect(route('petani.order.index'));

        // return redirect(route('customer.order.show', [$order]));
    }
}
