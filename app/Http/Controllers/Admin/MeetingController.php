<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agenda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Meeting;
use Illuminate\Support\Facades\Session;

class MeetingController extends Controller
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

        // $meetings = Meeting::where('group_farm_id', $groupFarmId)->orderBy('created_at', 'desc')->get();
        $meetings = Meeting::where('id_group_farm', $groupFarmId)->orderBy('created_at', 'desc')->get();

        return view('admin.meeting.index', compact('meetings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.meeting.create');
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
            'name' => $request->name,
            'place' => $request->place,
            'time' => $request->time,
            'date' => $request->date,
            'description' => $request->description,
            // 'group_farm_id' => $groupFarmId,
            'id_group_farm' => $groupFarmId,
        ];

        $meeting = Meeting::create($data);

        $message = 'Data berhasil di tambah!';
        Session::flash('admin', $message);

        return redirect(route('admin.meeting.index'));
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
    public function edit($id_meeting)
    {
        $meeting = Meeting::find($id_meeting);
        return view('admin.meeting.edit', compact('meeting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_meeting)
    {
        $authUser = auth()->user();
        $groupFarmId = $authUser->farmer->groupFarm->id_group_farm;

        $meeting = Meeting::find($id_meeting);

        $data = [
            'name' => $request->name,
            'place' => $request->place,
            'time' => $request->time,
            'date' => $request->date,
            'description' => $request->description,
            // 'group_farm_id' => $groupFarmId,
            'id_group_farm' => $groupFarmId,
        ];

        $meeting->update($data);

        $message = 'Data berhasil di ubah!';
        Session::flash('admin', $message);

        return redirect(route('admin.meeting.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_meeting)
    {
        $meeting = Meeting::find($id_meeting);
        $meeting->delete();

        $message = 'Data berhasil di hapus!';
        Session::flash('admin', $message);

        return redirect(route('admin.meeting.index'));
    }
}
