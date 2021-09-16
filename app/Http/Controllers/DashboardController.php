<?php

namespace App\Http\Controllers;

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
        $farmer = Farmer::where('user_id', $user->id)->first();

        return view('dashboard.petani', compact('farmer'));
    }

    public function penyuluh()
    {
        $farmerCount = Farmer::count();
        $groupFarmCount = GroupFarm::count();
        $productCount = Product::count();
        $orders = Order::take(7)->orderBy('created_at', 'desc')->get();

        return view('dashboard.penyuluh', compact('farmerCount', 'groupFarmCount', 'productCount', 'orders'));
    }

    public function admin()
    {
        $user = auth()->user();
        $farmer = Farmer::where('user_id', $user->id)->first();

        $farmerCount = Farmer::where('group_farm_id', $farmer->group_farm_id)->where('id', '!=', $farmer->id)->count();
        $toolCount = Tool::where('group_farm_id', $farmer->group_farm_id)->count();
        $rentCount = Rent::where('group_farm_id', $farmer->group_farm_id)->count();
        $rents = Rent::where('group_farm_id', $farmer->group_farm_id)->take(7)->orderBy('created_at', 'desc')->get();

        return view('dashboard.admin', compact('farmerCount', 'toolCount', 'rentCount', 'rents'));
    }
}
