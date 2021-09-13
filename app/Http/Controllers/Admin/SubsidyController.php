<?php

namespace App\Http\Controllers\Admin;

use App\Models\Farmer;
use App\Models\Subsidy;
use Illuminate\Http\Request;
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
    public function index()
    {
        $subsidies = Subsidy::get();
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

        $farmer = Farmer::where('user_id', $user->id)->first();

        $groupFarm = $farmer->groupFarm;

        $farmers = $groupFarm->farmers;

        $data = [
            'periode' => $request->periode,
            'type' => $request->type,
            'name' => $request->name,
            'price' => $request->price,
            'qty' => $request->qty,
            'date' => $request->date,
        ];

        $subsidy = Subsidy::create($data);

        $totalLandSize = 0;

        foreach ($farmers as $value) {
            if ($value->id != $farmer->id) {
                $totalLandSize += $value->land_area;
            }
        }

        $perArea = ($request->qty / $totalLandSize);

        foreach ($farmers as $value) {
            if ($value->id != $farmer->id) {
                DB::table('subsidy_farmers')->insert([
                    'qty' => ($value->land_area * $perArea),
                    'status' => 0,
                    'price' => ($value->land_area * $perArea) * $request->price,
                    'subsidy_id' => $subsidy->id,
                    'farmer_id' => $value->id
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
    public function show($id)
    {
        $subsidy = Subsidy::find($id);
        return view('admin.subsidy.show', compact('subsidy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subsidy = Subsidy::find($id);
        return view('admin.subsidy.edit', compact('subsidy'));
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subsidy = Subsidy::find($id);
        $subsidy->delete();

        $message = 'Data berhasil di hapus!';
        Session::flash('admin', $message);

        return redirect(route('admin.subsidy.index'));
    }


    public function process($subsidy, $farmer)
    {
        DB::table('subsidy_farmers')
            ->where('subsidy_id', $subsidy)
            ->where('farmer_id', $farmer)
            ->update([
                'status' => 1
            ]);

        session()->flash('success', 'Berhasil proses');

        return redirect()->back();
    }
}
