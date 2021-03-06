<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agenda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plant;
use Illuminate\Support\Facades\Session;

class PlantController extends Controller
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

        // $plants = Plant::where('group_farm_id', $groupFarmId)->orderBy('created_at', 'desc')->get();
        $plants = Plant::where('id_group_farm', $groupFarmId)->orderBy('created_at', 'desc')->get();

        return view('admin.plant.index', compact('plants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plant.create');
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

        $data = [
            'periode' => $request->periode,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,
            // 'group_farm_id' => $groupFarmId,
            'id_group_farm' => $groupFarmId,
        ];

        $plants = Plant::create($data);

        $message = 'Data berhasil di tambah!';
        Session::flash('admin', $message);

        return redirect(route('admin.plant.index'));
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
    public function edit($id_plant)
    {
        $plant = Plant::find($id_plant);
        return view('admin.plant.edit', compact('plant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_plant)
    {
        $authUser = auth()->user();
        $groupFarmId = $authUser->farmer->groupFarm->id_group_farm;

        $plant = Plant::find($id_plant);

        $data = [
            'periode' => $request->periode,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,
            // 'group_farm_id' => $groupFarmId,
            'id_group_farm' => $groupFarmId,
        ];

        $plant->update($data);

        $message = 'Data berhasil di ubah!';
        Session::flash('admin', $message);

        return redirect(route('admin.plant.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_plant)
    {
        $plant = Plant::find($id_plant);
        $plant->delete();

        $message = 'Data berhasil di hapus!';
        Session::flash('admin', $message);

        return redirect(route('admin.plant.index'));
    }
}
