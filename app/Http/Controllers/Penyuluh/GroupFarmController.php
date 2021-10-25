<?php

namespace App\Http\Controllers\Penyuluh;

use App\User;
use App\Models\Farmer;
use App\Models\GroupFarm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GroupFarmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groupFarms = GroupFarm::orderBy('created_at', 'desc')->get();
        return view('penyuluh.group-farm.index', compact('groupFarms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penyuluh.group-farm.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataFarm = [
            'name' => $request->group_name,
            'phone' => $request->group_phone,
            'vision' => $request->vision,
            'mission' => $request->mission,
        ];

        $groupFarm = GroupFarm::create($dataFarm);

        $dataUser = [
            'email' => $request->email,
            'name'  => $request->name,
            'password' => bcrypt($request->password),
        ];

        $user = User::create($dataUser);
        $user->assignRole('admin');

        $dataFarmer = [
            'name' => $request->name,
            'land_area' => $request->land_area,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'email' => $request->email,
            // 'user_id' => $user->id_user,
            // 'group_farm_id' => $groupFarm->id_group_farm,
            'id_user' => $user->id_user,
            'id_group_farm' => $groupFarm->id_group_farm,
        ];

        $farmer = Farmer::create($dataFarmer);
        $message = 'Data berhasil di tambah!';
        session()->flash('penyuluh', $message);

        return redirect(route('penyuluh.group-farm.index'));
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
    public function edit($id_group_farm)
    {
        $groupFarm = GroupFarm::find($id_group_farm);

        $farmer = $groupFarm->getPic();

        return view('penyuluh.group-farm.edit', compact('groupFarm', 'farmer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_group_farm)
    {
        $groupFarm = GroupFarm::find($id_group_farm);

        $farmer = $groupFarm->getPic();

        $dataFarm = [
            'name' => $request->group_name,
            'phone' => $request->group_phone,
            'vision' => $request->vision,
            'mission' => $request->mission,
        ];

        $groupFarm->update($dataFarm);

        $password = $farmer->user->password;

        if ($request->password != '') {
            $password = bcrypt($request->password);
        }

        $dataUser = [
            'email' => $request->email,
            'name'  => $request->name,
            'password' => $password,
        ];

        $farmer->user->update($dataUser);

        $dataFarmer = [
            'name' => $request->name,
            'land_area' => $request->land_area,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'email' => $request->email,
            // 'user_id' => $farmer->user_id,
            // 'group_farm_id' => $groupFarm->id_group_farm,
            'id_user' => $farmer->id_user,
            'id_group_farm' => $groupFarm->id_group_farm,
        ];

        $farmer->update($dataFarmer);
        $message = 'Data berhasil di ubah!';
        session()->flash('penyuluh', $message);

        return redirect(route('penyuluh.group-farm.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_group_farm)
    {
        $groupFarm = GroupFarm::find($id_group_farm);

        // $farmers = Farmer::where('group_farm_id', $groupFarm->id_group_farm)->get();
        $farmers = Farmer::where('id_group_farm', $groupFarm->id_group_farm)->get();

        foreach ($farmers as $farmer) {
            DB::table('farmers')->where('id_farmer', $farmer->id_farmer)->delete();
            // DB::table('users')->where('id_user', $farmer->user_id)->delete();
            DB::table('users')->where('id_user', $farmer->id_user)->delete();
        }

        $groupFarm->delete();

        $message = 'Data berhasil di hapus!';
        Session::flash('penyuluh', $message);

        return redirect(route('penyuluh.group-farm.index'));
    }
}
