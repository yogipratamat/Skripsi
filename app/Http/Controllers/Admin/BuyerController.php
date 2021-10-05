<?php

namespace App\Http\Controllers\Admin;

use App\Models\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authUser = auth()->user();
        $groupFarmId = $authUser->farmer->groupFarm->id;

        $buyers = Buyer::where('group_farm_id', $groupFarmId)->orderBy('created_at', 'desc')->get();

        return view('admin.buyer.index', compact('buyers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.buyer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $authUser = auth()->user();
        $groupFarmId = $authUser->farmer->groupFarm->id;

        $file = $request->file('image');

        if ($file) {
            $name = time() . '-' .
                $file->getClientOriginalName();
            $path = Storage::putFileAs(
                'public/images/buyers',
                $file,
                $name
            );

            $image = '/images/buyers/' . $name;
        } else {
            $image = null;
        }

        $data = [
            'image' => $image,
            'name' => $request->name,
            'price' => $request->price,
            'phone' => $request->phone,
            'description' => $request->description,
            'group_farm_id' => $groupFarmId,
        ];

        $buyer = Buyer::create($data);

        $message = 'Data berhasil di tambah!';
        Session::flash('admin', $message);

        return redirect(route('admin.buyer.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buyer = Buyer::find($id);
        return view('admin.buyer.edit', compact('buyer'));
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
        $authUser = auth()->user();
        $groupFarmId = $authUser->farmer->groupFarm->id;

        $buyer = Buyer::find($id);

        $oldImage = $buyer->image;

        $file = $request->file('image');

        if ($file) {
            $name = time() . '-' .
                $file->getClientOriginalName();
            $path = Storage::putFileAs(
                'public/images/buyers',
                $file,
                $name
            );

            $image = '/images/buyers/' . $name;
        } else {
            $image = $oldImage;
        }

        $data = [
            'image' => $image,
            'name' => $request->name,
            'price' => $request->price,
            'phone' => $request->phone,
            'description' => $request->description,
            'group_farm_id' => $groupFarmId,
        ];

        $buyer->update($data);

        $message = 'Data berhasil di ubah!';
        Session::flash('admin', $message);

        return redirect(route('admin.buyer.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buyer = Buyer::find($id);
        $buyer->delete();

        $message = 'Data berhasil di hapus!';
        Session::flash('admin', $message);

        return redirect(route('admin.buyer.index'));
    }
}
