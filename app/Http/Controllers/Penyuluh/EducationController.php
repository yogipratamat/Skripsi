<?php

namespace App\Http\Controllers\Penyuluh;

use App\Models\Education;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educations = Education::get();
        return view('penyuluh.education.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penyuluh.education.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('image');

        if ($file) {
            $name = time() . '-' .
                $file->getClientOriginalName();
            $path = Storage::putFileAs(
                'public/images/educations',
                $file,
                $name
            );

            $image = '/images/educations/' . $name;
        } else {
            $image = null;
        }

        $data = [
            'image' => $image,
            'name' => $request->name,
            'ciri' => $request->ciri,
            'solution' => $request->solution,
        ];

        $education = Education::create($data);

        $message = 'Data berhasil di tambah!';
        Session::flash('penyuluh', $message);

        return redirect(route('penyuluh.education.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $education = Education::find($id);
        return view('penyuluh.education.edit', compact('education'));
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
        $education = Education::find($id);

        $oldImage = $education->image;

        $file = $request->file('image');

        if ($file) {
            $name = time() . '-' .
                $file->getClientOriginalName();
            $path = Storage::putFileAs(
                'public/images/education',
                $file,
                $name
            );

            $image = '/images/educations/' . $name;
        } else {
            $image = $oldImage;
        }

        $data = [
            'image' => $image,
            'name' => $request->name,
            'ciri' => $request->ciri,
            'solution' => $request->solution,
        ];

        $education->update($data);

        $message = 'Data berhasil di ubah!';
        Session::flash('penyuluh', $message);

        return redirect(route('penyuluh.education.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $education = Education::find($id);
        $education->delete();

        $message = 'Data berhasil di hapus!';
        Session::flash('penyuluh', $message);

        return redirect(route('penyuluh.education.index'));
    }
}
