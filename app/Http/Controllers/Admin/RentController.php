<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rent;
use App\Models\Farmer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RentController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $farmer = Farmer::where('user_id', $user->id_user)->first();

        $groupFarmId = $farmer->group_farm_id;

        $rents = Rent::where('group_farm_id', $groupFarmId)->orderBy('created_at', 'desc')->get();

        return view('admin.rent.index', compact('rents'));
    }

    public function show($id_rent)
    {
        $rent = Rent::find($id_rent);

        return view('admin.rent.show', compact('rent'));
    }

    public function approve($id_rent)
    {

        DB::table('rents')->where('id_rent', $id_rent)->update([
            'status' => 1
        ]);

        session()->flash('success', 'Berhasil menyelesaikan penyewaan');

        return redirect()->back();
    }

    public function cancel($id_rent)
    {

        DB::table('rents')->where('id_rent', $id_rent)->update([
            'status' => 2
        ]);

        session()->flash('success', 'Berhasil membatalkan penyewaan');

        return redirect()->back();
    }
}
