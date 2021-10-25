<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Farmer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class FarmerController extends Controller
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

        // $farmers = Farmer::where('group_farm_id', $groupFarmId)->where('id_farmer', '!=', $authUser->farmer->id_farmer)->orderBy('created_at', 'desc')->get();

        $farmers = Farmer::where('id_group_farm', $groupFarmId)->where('id_farmer', '!=', $authUser->farmer->id_farmer)->orderBy('created_at', 'desc')->get();
        return view('admin.farmer.index', compact('farmers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.farmer.create');
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
        $dataUser = [
            'email' => $request->email,
            'name'  => $request->name,
            'password' => bcrypt($request->password),
        ];

        $user = User::create($dataUser);
        $user->assignRole('petani');

        $dataFarmer = [
            'name' => $request->name,
            'land_area' => $request->land_area,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'email' => $request->email,
            // 'user_id' => $user->id_user,
            // 'group_farm_id' => $groupFarmId,
            'id_user' => $user->id_user,
            'id_group_farm' => $groupFarmId,
        ];

        $farmer = Farmer::create($dataFarmer);

        $message = 'Data berhasil di tambah!';
        session()->flash('admin', $message);

        return redirect(route('admin.farmer.index'));
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
    public function edit($id_farmer)
    {
        $farmer = Farmer::find($id_farmer);

        return view('admin.farmer.edit', compact('farmer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_farmer)
    {
        $authUser = auth()->user();
        $groupFarmId = $authUser->farmer->groupFarm->id_group_farm;
        $farmer = Farmer::find($id_farmer);

        $password = $farmer->user->password;

        if ($request->password != '' || $request->password != null) {
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
            // 'group_farm_id' => $groupFarmId,
            'id_user' => $farmer->id_user,
            'id_group_farm' => $groupFarmId,
        ];

        $farmer->update($dataFarmer);

        $message = 'Data berhasil di ubah!';
        session()->flash('admin', $message);

        return redirect(route('admin.farmer.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_farmer)
    {

        $farmer = Farmer::find($id_farmer);
        $farmer->delete();

        // DB::table('users')->where('id_user', $farmer->user_id)->delete();
        DB::table('users')->where('id_user', $farmer->id_user)->delete();

        $message = 'Data berhasil di hapus!';
        Session::flash('admin', $message);

        return redirect(route('admin.farmer.index'));
    }
}
