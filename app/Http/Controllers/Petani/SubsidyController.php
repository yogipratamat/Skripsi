<?php

namespace App\Http\Controllers\Petani;

use App\Models\Farmer;
use App\Models\Subsidy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubsidyController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // $farmer = Farmer::where('user_id', $user->id_user)->first();
        $farmer = Farmer::where('id_user', $user->id_user)->first();

        // return
        $subsidies = $farmer->subsidies;
        return view('petani.subsidy.index', compact('subsidies'));
    }

    public function show($id_subsidy)
    {
        $subsidy = Subsidy::find($id_subsidy);
        return view('petani.subsidy.show', compact('subsidy'));
    }
}
