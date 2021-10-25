<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use App\Models\Farmer;
use App\Models\Rent;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // $farmer = Farmer::where('user_id', $user->id_user)->first();
        $farmer = Farmer::where('id_user', $user->id_user)->first();

        // $rents = Rent::where('farmer_id', $farmer->id_farmer)->get();
        $rents = Rent::where('id_farmer', $farmer->id_farmer)->orderBy('date', 'asc')->get();
        return view('petani.rent.index', compact('rents', 'farmer'));
    }

    public function show($id_rent)
    {
        $rent = Rent::find($id_rent);

        return view('petani.rent.show', compact('rent'));
    }
}
