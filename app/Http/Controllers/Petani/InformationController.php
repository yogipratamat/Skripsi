<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Farmer;
use App\Models\Meeting;
use App\Models\Plant;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function education()
    {
        $educations = Education::orderBy('created_at', 'desc')->get();
        return view('petani.information.education', compact('educations'));
    }

    public function plant()
    {
        $user = auth()->user();

        // $farmer = Farmer::where('user_id', $user->id_user)->first();
        $farmer = Farmer::where('id_user', $user->id_user)->first();

        // $plants = Plant::where('group_farm_id', $farmer->groupFarm->id_group_farm)->orderBy('created_at', 'desc')->get();
        $plants = Plant::where('id_group_farm', $farmer->groupFarm->id_group_farm)->orderBy('created_at', 'desc')->get();

        return view('petani.information.plant', compact('plants'));
    }

    public function meeting()
    {
        $user = auth()->user();

        // $farmer = Farmer::where('user_id', $user->id_user)->first();
        $farmer = Farmer::where('id_user', $user->id_user)->first();

        // $meetings = Meeting::where('group_farm_id', $farmer->groupFarm->id_group_farm)->orderBy('created_at', 'desc')->get();
        $meetings = Meeting::where('id_group_farm', $farmer->groupFarm->id_group_farm)->orderBy('created_at', 'desc')->get();

        return view('petani.information.meeting', compact('meetings'));
    }
}
