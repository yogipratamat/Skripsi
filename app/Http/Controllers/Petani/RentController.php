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

        $farmer = Farmer::where('user_id', $user->id)->first();

        $rents = Rent::where('farmer_id', $farmer->id)->get();
        return view('petani.rent.index', compact('rents', 'farmer'));
    }

    public function show($id)
    {
        $rent = Rent::find($id);

        return view('petani.rent.show', compact('rent'));
    }
}
