<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tool;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authUser = auth()->user();
        $groupFarmId = $authUser->farmer->groupFarm->id;

        $tools = Tool::where('group_farm_id', $groupFarmId)->orderBy('created_at', 'desc')->get();

        return view('admin.tool.index', compact('tools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tool.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $authUser = auth()->user();
        $groupFarmId = $authUser->farmer->groupFarm->id;

        $file = $request->file('image');

        if ($file) {
            $name = time() . '-' .
                $file->getClientOriginalName();
            $path = Storage::putFileAs(
                'public/images/tools',
                $file,
                $name
            );

            $image = '/images/tools/' . $name;
        } else {
            $image = null;
        }

        $data = [
            'image' => $image,
            'name' => $request->name,
            'price' => $request->price,
            'merk' => $request->merk,
            'description' => $request->description,
            'group_farm_id' => $groupFarmId,
        ];

        $tool = Tool::create($data);

        $message = 'Data berhasil di tambah!';
        Session::flash('admin', $message);

        return redirect(route('admin.tool.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tool = Tool::find($id);
        return view('admin.tool.edit', compact('tool'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $authUser = auth()->user();
        $groupFarmId = $authUser->farmer->groupFarm->id;

        $tool = Tool::find($id);

        $oldImage = $tool->image;

        $file = $request->file('image');

        if ($file) {
            $name = time() . '-' .
                $file->getClientOriginalName();
            $path = Storage::putFileAs(
                'public/images/tools',
                $file,
                $name
            );

            $image = '/images/tools/' . $name;
        } else {
            $image = $oldImage;
        }


        $data = [
            'image' => $image,
            'name' => $request->name,
            'price' => $request->price,
            'merk' => $request->merk,
            'description' => $request->description,
            'group_farm_id' => $groupFarmId,
        ];

        $tool->update($data);

        $message = 'Data berhasil di ubah!';
        Session::flash('admin', $message);

        return redirect(route('admin.tool.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tool = Tool::find($id);
        $tool->delete();

        $message = 'Data berhasil di hapus!';
        Session::flash('admin', $message);

        return redirect(route('admin.tool.index'));
    }
}
