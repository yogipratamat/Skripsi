<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Farmer;
use App\Models\GroupFarm;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rent;
use App\Models\Tool;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $role = $user->getRoleNames()[0];

        if ($role == 'petani') {

            return $this->farmer();
        }

        if ($role == 'admin') {

            return $this->admin();
        }

        if ($role == 'penyuluh') {

            return $this->penyuluh();
        }
    }

    public function farmer()
    {
        $user = auth()->user();
        // $farmer = Farmer::where('user_id', $user->id_user)->first();
        $farmer = Farmer::where('id_user', $user->id_user)->first();
        $educations = Education::orderBy('created_at', 'desc')->get();

        return view('dashboard.petani', compact('farmer', 'educations'));
    }

    public function penyuluh()
    {
        $authUser = auth()->user();
        $farmerCount = Farmer::count();
        $groupFarmCount = GroupFarm::count();
        $productCount = Product::count();
        $orders = Order::take(5)->where('status', '=', 0)->orderBy('created_at', 'desc')->get();

        return view('dashboard.penyuluh', compact('farmerCount', 'groupFarmCount', 'productCount', 'orders'));
    }

    public function admin()
    {
        $user = auth()->user();
        // $farmer = Farmer::where('user_id', $user->id_user)->first();
        $farmer = Farmer::where('id_user', $user->id_user)->first();

        // $farmerCount = Farmer::where('group_farm_id', $farmer->group_farm_id)->where('id_farmer', '!=', $farmer->id_farmer)->count();
        // $toolCount = Tool::where('group_farm_id', $farmer->group_farm_id)->count();
        // $rentCount = Rent::where('group_farm_id', $farmer->group_farm_id)->count();
        // $rents = Rent::where('group_farm_id', $farmer->group_farm_id)->take(5)->orderBy('created_at', 'desc')->get();
        $farmerCount = Farmer::where('id_group_farm', $farmer->id_group_farm)->where('id_farmer', '!=', $farmer->id_farmer)->count();
        $toolCount = Tool::where('id_group_farm', $farmer->id_group_farm)->count();
        $rentCount = Rent::where('id_group_farm', $farmer->id_group_farm)->count();
        $rents = Rent::where('id_group_farm', $farmer->id_group_farm)->where('status', '=', 0)->take(5)->orderBy('created_at', 'desc')->get();

        return view('dashboard.admin', compact('farmerCount', 'toolCount', 'rentCount', 'rents'));
    }
}
