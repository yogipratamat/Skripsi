<?php

namespace App\Http\Controllers\Penyuluh;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('penyuluh.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penyuluh.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file = $request->file('image');

        if ($file) {
            $name = time() . '-' .
                $file->getClientOriginalName();
            $path = Storage::putFileAs(
                'public/images/products',
                $file,
                $name
            );

            $image = '/images/products/' . $name;
        } else {
            $image = null;
        }

        $data = [
            'image' => $image,
            'name' => $request->name,
            'price' => $request->price,
            'merk' => $request->merk,
            'stock' => $request->stock,
            'description' => $request->description,
        ];

        $product = Product::create($data);

        $message = 'Data berhasil di tambah!';
        Session::flash('penyuluh', $message);

        return redirect(route('penyuluh.product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('penyuluh.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $oldImage = $product->image;

        $file = $request->file('image');

        if ($file) {
            $name = time() . '-' .
                $file->getClientOriginalName();
            $path = Storage::putFileAs(
                'public/images/products',
                $file,
                $name
            );

            $image = '/images/products/' . $name;
        } else {
            $image = $oldImage;
        }

        $data = [
            'image' => $image,
            'name' => $request->name,
            'price' => $request->price,
            'merk' => $request->merk,
            'stock' => $request->stock,
            'description' => $request->description,
        ];

        $product->update($data);

        $message = 'Data berhasil di ubah!';
        Session::flash('penyuluh', $message);

        return redirect(route('penyuluh.product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        $message = 'Data berhasil di hapus!';
        Session::flash('penyuluh', $message);

        return redirect(route('penyuluh.product.index'));
    }
}
