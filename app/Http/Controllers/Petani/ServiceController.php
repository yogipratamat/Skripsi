<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use App\Models\Buyer;
use App\Models\FarmWorker;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function farmWorker()
    {
        $farmWorkers = FarmWorker::get();
        return view('petani.service.farm-worker', compact('farmWorkers'));
    }
    public function buyer()
    {
        $buyers = Buyer::get();
        return view('petani.service.buyer', compact('buyers'));
    }
}
