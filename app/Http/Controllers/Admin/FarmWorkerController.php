<?php

namespace App\Http\Controllers\Admin;

use App\Models\FarmWorker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class FarmWorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authUser = auth()->user();
        $groupFarmId = $authUser->farmer->groupFarm->id_group_farm;

        // $farmWorkers = FarmWorker::where('group_farm_id', $groupFarmId)->orderBy('created_at', 'desc')->get();
        $farmWorkers = FarmWorker::where('id_group_farm', $groupFarmId)->orderBy('created_at', 'desc')->get();


        return view('admin.farm-worker.index', compact('farmWorkers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.farm-worker.create');
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
        $groupFarmId = $authUser->farmer->groupFarm->id_group_farm;

        $file = $request->file('image');

        if ($file) {
            $name = time() . '-' .
                $file->getClientOriginalName();
            $path = Storage::putFileAs(
                'public/images/farm-workers',
                $file,
                $name
            );

            $image = '/images/farm-workers/' . $name;
        } else {
            $image = null;
        }

        $data = [
            'image' => $image,
            'name' => $request->name,
            'service_name' => $request->service_name,
            'price' => $request->price,
            'phone' => $request->phone,
            'description' => $request->description,
            // 'group_farm_id' => $groupFarmId,
            'id_group_farm' => $groupFarmId,
        ];

        $farmWorker = FarmWorker::create($data);

        $message = 'Data berhasil di tambah!';
        Session::flash('admin', $message);

        return redirect(route('admin.farm-worker.index'));
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
    public function edit($id_farm_worker)
    {
        $farmWorker = FarmWorker::find($id_farm_worker);
        return view('admin.farm-worker.edit', compact('farmWorker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_farm_worker)
    {
        $authUser = auth()->user();
        $groupFarmId = $authUser->farmer->groupFarm->id_group_farm;

        $farmWorker = FarmWorker::find($id_farm_worker);

        $oldImage = $farmWorker->image;

        $file = $request->file('image');

        if ($file) {
            $name = time() . '-' .
                $file->getClientOriginalName();
            $path = Storage::putFileAs(
                'public/images/farm-workers',
                $file,
                $name
            );

            $image = '/images/farm-workers/' . $name;
        } else {
            $image = $oldImage;
        }

        $data = [
            'image' => $image,
            'name' => $request->name,
            'service_name' => $request->service_name,
            'price' => $request->price,
            'phone' => $request->phone,
            'description' => $request->description,
            // 'group_farm_id' => $groupFarmId,
            'id_group_farm' => $groupFarmId,
        ];

        $farmWorker->update($data);

        $message = 'Data berhasil di ubah!';
        Session::flash('admin', $message);

        return redirect(route('admin.farm-worker.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_farm_worker)
    {
        $farmWorker = FarmWorker::find($id_farm_worker);
        $farmWorker->delete();

        $message = 'Data berhasil di hapus!';
        Session::flash('admin', $message);

        return redirect(route('admin.farm-worker.index'));
    }
}
