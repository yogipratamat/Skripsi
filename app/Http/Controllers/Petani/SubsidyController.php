<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use App\Models\Subsidy;
use Illuminate\Http\Request;

class SubsidyController extends Controller
{
    public function index()
    {
        $subsidies = Subsidy::get();
        return view('petani.subsidy.index', compact('subsidies'));
    }

    public function show($id)
    {
        $subsidy = Subsidy::find($id);
        return view('petani.subsidy.show', compact('subsidy'));
    }
}
