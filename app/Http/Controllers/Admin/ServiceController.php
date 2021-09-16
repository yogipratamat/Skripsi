<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::get();
        return view('admin.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
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
                'public/images/services',
                $file,
                $name
            );

            $image = '/images/services/' . $name;
        } else {
            $image = null;
        }

        $data = [
            'image' => $image,
            'name' => $request->name,
            'service_name' => $request->service_name,
            'type' => $request->type,
            'price' => $request->price,
            'phone' => $request->phone,
            'description' => $request->description,
        ];

        $service = Service::create($data);

        $message = 'Data berhasil di tambah!';
        Session::flash('admin', $message);

        return redirect(route('admin.service.index'));
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
        $service = Service::find($id);
        return view('admin.service.edit', compact('service'));
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
        $service = Service::find($id);

        $oldImage = $service->image;

        $file = $request->file('image');

        if ($file) {
            $name = time() . '-' .
                $file->getClientOriginalName();
            $path = Storage::putFileAs(
                'public/images/services',
                $file,
                $name
            );

            $image = '/images/services/' . $name;
        } else {
            $image = $oldImage;
        }

        $data = [
            'image' => $image,
            'name' => $request->name,
            'service_name' => $request->service_name,
            'type' => $request->type,
            'price' => $request->price,
            'phone' => $request->phone,
            'description' => $request->description,
        ];

        $service->update($data);

        $message = 'Data berhasil di ubah!';
        Session::flash('admin', $message);

        return redirect(route('admin.service.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();

        $message = 'Data berhasil di hapus!';
        Session::flash('admin', $message);

        return redirect(route('admin.service.index'));
    }
}
