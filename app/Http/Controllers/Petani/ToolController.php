<?php

namespace App\Http\Controllers\Petani;

use Carbon\Carbon;
use App\Models\Rent;
use App\Models\Tool;
use App\Models\Farmer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ToolController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $farmer = Farmer::where('user_id', $user->id)->first();

        $tools = Tool::where('group_farm_id', $farmer->groupFarm->id)->orderBy('created_at', 'desc')->get();

        return view('petani.tool.index', compact('tools'));
    }

    public function show(Request $request, $id)
    {
        $date = date('Y-m-d');

        $area = 0;

        if ($request->area) {
            $area = $request->area;
        }



        $user = auth()->user();

        $farmer = Farmer::where('user_id', $user->id)->first();


        $tool = Tool::find($id);

        $avaiable = -1;

        if ($request->date) {

            $date = $request->date;
            $rents = Rent::where('date', $request->date)->where('tool_id', $id)->where('group_farm_id', $farmer->group_farm_id)->get();

            if ($rents) {
                $total = 0;
                foreach ($rents as $rent) {
                    $total += $rent->land_area;
                }

                $avaiable = 100 - $total;
            } else {
                $avaiable = 100;
            }
        }

        if ($request->has('rent')) {

            if ($avaiable < $area) {
                session()->flash('error', 'area melebihi');
                return redirect()->back();
            } else {
                DB::table('rents')->insert([
                    'date' => $date,
                    'land_area' => $area,
                    'status' => 0,
                    'farmer_id' => $farmer->id,
                    'group_farm_id' => $farmer->group_farm_id,
                    'tool_id' => $tool->id
                ]);

                session()->flash('rent', 'Berhasil Menyewa Alat!');
                return redirect(route('petani.rent.index'));
            }
        }



        return view('petani.tool.show', compact('tool', 'avaiable', 'date'));
    }
}
