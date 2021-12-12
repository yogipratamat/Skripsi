<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Farmer;
use App\Models\Subsidy;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SubsidyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = auth()->user();

        // $farmer = Farmer::where('user_id', $user->id_user)->first();
        $farmer = Farmer::where('id_user', $user->id_user)->first();

        // $groupFarmId = $farmer->group_farm_id;
        $groupFarmId = $farmer->id_group_farm;

        //subsidy batas
        $monthStartDate = Carbon::now()->startOfMonth()->format('Y-m-d'); // awal bulan
        $monthEndDate = Carbon::now()->endOfMonth()->format('Y-m-d'); // akhir bulan

        if ($request->startDate) {
            $monthStartDate = $request->startDate;
        }

        if ($request->endDate) {
            $monthEndDate = $request->endDate;
        }

        // $subsidies = Subsidy::where('group_farm_id', $groupFarmId)->orderBy('created_at', 'desc')->whereBetween('date', [$monthStartDate, $monthEndDate]);
        $subsidies = Subsidy::where('id_group_farm', $groupFarmId)->orderBy('created_at', 'desc');


        if ($request->farmer) {
            // $subsidiess = $subsidies->where('farmer_id', $request->farmer);
            $subsidiess = $subsidies->where('id_farmer', $request->farmer);
            $farmerActive = $request->farmer;
        }

        $subsidies = $subsidies->get();

        $total = 0;
        foreach ($subsidies as $subsidy) {
            $total += $subsidy->price;
        }

        return view('admin.subsidy.index', compact('subsidies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subsidy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = auth()->user();

        // $farmer = Farmer::where('user_id', $user->id_user)->first();
        $farmer = Farmer::where('id_user', $user->id_user)->first();

        $groupFarm = $farmer->groupFarm;

        $farmers = $groupFarm->farmers;

        $data = [
            // 'group_farm_id' => $groupFarm->id_group_farm,
            'id_group_farm' => $groupFarm->id_group_farm,
            'periode' => $request->periode,
            'type' => $request->type,
            'name' => $request->name,
            'price' => $request->price,
            'qty' => $request->qty,
            'date' => $request->date,
        ];

        $subsidy = Subsidy::create($data);

        $totalLandSize = 0;

        ///id kurang yakin
        foreach ($farmers as $value) {
            if ($value->id_farmer != $farmer->id_farmer) {
                $totalLandSize += $value->land_area;
            }
        }

        $perArea = ($request->qty / $totalLandSize);

        foreach ($farmers as $value) {
            if ($value->id_farmer != $farmer->id_farmer) {
                DB::table('subsidy_farmers')->insert([
                    'qty' => ($value->land_area * $perArea),
                    'status' => 0,
                    'price' => ($value->land_area * $perArea) * $request->price,
                    // 'subsidy_id' => $subsidy->id_subsidy,
                    // 'farmer_id' => $value->id_farmer
                    'id_subsidy' => $subsidy->id_subsidy,
                    'id_farmer' => $value->id_farmer
                ]);
            }
        }

        $message = 'Data berhasil di tambah!';
        Session::flash('admin', $message);

        return redirect(route('admin.subsidy.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_subsidy)
    {
        $date = Carbon::today();
        $subsidy = Subsidy::find($id_subsidy);
        return view('admin.subsidy.show', compact('subsidy', 'date'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_subsidy)
    {
        $subsidy = Subsidy::find($id_subsidy);
        return view('admin.subsidy.edit', compact('subsidy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_subsidy)
    {
        $user = auth()->user();

        // $farmer = Farmer::where('user_id', $user->id_user)->first();
        $farmer = Farmer::where('id_user', $user->id_user)->first();


        $groupFarm = $farmer->groupFarm;

        $farmers = $groupFarm->farmers;

        $subsidy = Subsidy::find($id_subsidy);


        // DB::table('subsidy_farmers')->where('subsidy_id', $id_subsidy)->delete();
        DB::table('subsidy_farmers')->where('id_subsidy', $id_subsidy)->delete();


        $data = [
            'periode' => $request->periode,
            'type' => $request->type,
            'name' => $request->name,
            'price' => $request->price,
            'qty' => $request->qty,
            'date' => $request->date,
        ];


        $subsidy->update($data);

        $totalLandSize = 0;

        foreach ($farmers as $value) {
            if ($value->id_subsidy != $farmer->id_farmer) {
                $totalLandSize += $value->land_area;
            }
        }

        $perArea = ($request->qty / $totalLandSize);

        foreach ($farmers as $value) {
            if ($value->id_subsidy != $farmer->id_farmer) {
                DB::table('subsidy_farmers')->insert([
                    'qty' => ($value->land_area * $perArea),
                    'status' => 0,
                    'price' => ($value->land_area * $perArea) * $request->price,
                    // 'subsidy_id' => $subsidy->id_subsidy,
                    // 'farmer_id' => $value->id_farmer
                    'id_subsidy' => $subsidy->id_subsidy,
                    'id_farmer' => $value->id_farmer
                ]);
            }
        }

        $message = 'Data berhasil di edit!';
        Session::flash('admin', $message);

        return redirect(route('admin.subsidy.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_subsidy)
    {
        $subsidy = Subsidy::find($id_subsidy);
        $subsidy->delete();

        $message = 'Data berhasil di hapus!';
        Session::flash('admin', $message);

        return redirect(route('admin.subsidy.index'));
    }


    public function process($subsidy, $farmer)
    {
        DB::table('subsidy_farmers')
            // ->where('subsidy_id', $subsidy)
            // ->where('farmer_id', $farmer)
            ->where('id_subsidy', $subsidy)
            ->where('id_farmer', $farmer)
            ->update([
                'status' => 1
            ]);

        session()->flash('success', 'Berhasil proses');

        return redirect()->back();
    }
}
