<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RentController extends Controller
{
    public function index()
    {
        $rents = Rent::orderBy('created_at', 'desc')->get();


        return view('admin.rent.index', compact('rents'));
    }

    public function show($id)
    {
        $rent = Rent::find($id);

        return view('admin.rent.show', compact('rent'));
    }

    public function approve($id)
    {

        DB::table('rents')->where('id', $id)->update([
            'status' => 1
        ]);

        session()->flash('success', 'Berhasil menyelesaikan penyewaan');

        return redirect()->back();
    }
}
