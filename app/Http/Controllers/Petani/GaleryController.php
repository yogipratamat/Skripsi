<?php

namespace App\Http\Controllers\Petani;

use App\Models\GaleryFoto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GaleryVideo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class GaleryController extends Controller
{
    public function index()
    {
        $galeryFotos = GaleryFoto::orderBy('created_at', 'desc')->get();
        $galeryVideos = GaleryVideo::orderBy('created_at', 'desc')->get();
        return view('petani.galery.index', compact('galeryFotos', 'galeryVideos'));
    }

    //foto
    public function createFoto()
    {
        return view('petani.galery.create-foto');
    }

    public function storeFoto(Request $request)
    {

        $file = $request->file('image');

        if ($file) {
            $name = time() . '-' .
                $file->getClientOriginalName();
            $path = Storage::putFileAs(
                'public/images/galery-fotos',
                $file,
                $name
            );

            $image = '/images/galery-fotos/' . $name;
        } else {
            $image = null;
        }

        $data = [
            'image' => $image,
            'title' => $request->title,
            'description' => $request->description,
        ];

        $galeryFoto = GaleryFoto::create($data);

        $message = 'Data berhasil di tambah!';
        Session::flash('petani', $message);

        return redirect(route('petani.galery.index'));
    }

    public function editFoto($id)
    {
        $galeryFoto = GaleryFoto::find($id);
        return view('petani.galery.edit-foto', compact('galeryFoto'));
    }

    public function updateFoto(Request $request, $id)
    {

        $galeryFoto = GaleryFoto::find($id);

        $oldImage = $galeryFoto->image;

        $file = $request->file('image');

        if ($file) {
            $name = time() . '-' .
                $file->getClientOriginalName();
            $path = Storage::putFileAs(
                'public/images/galery-fotos',
                $file,
                $name
            );

            $image = '/images/galery-fotos/' . $name;
        } else {
            $image = $oldImage;
        }

        $data = [
            'image' => $image,
            'title' => $request->title,
            'description' => $request->description,
        ];

        $galeryFoto->update($data);

        $message = 'Data berhasil di ubah!';
        Session::flash('petani', $message);

        return redirect(route('petani.galery.index'));
    }

    public function destroyFoto($id)
    {
        $galeryFoto = GaleryFoto::find($id);
        $galeryFoto->delete();

        $message = 'Data berhasil di hapus!';
        Session::flash('petani', $message);

        return redirect(route('petani.galery.index'));
    }


    //video
    public function createVideo()
    {
        return view('petani.galery.create-video');
    }

    public function storeVideo(Request $request)
    {
        $data = [
            'link' => $request->link,
            'title' => $request->title,
            'description' => $request->description,
        ];

        $galeryVideo = GaleryVideo::create($data);

        $message = 'Data berhasil di tambah!';
        Session::flash('petani', $message);

        return redirect(route('petani.galery.index'));
    }

    public function editVideo($id)
    {
        $galeryVideo = GaleryVideo::find($id);
        return view('petani.galery.edit-video', compact('galeryVideo'));
    }

    public function updateVideo(Request $request, $id)
    {

        $galeryVideo = GaleryVideo::find($id);

        $data = [
            'link' => $request->link,
            'title' => $request->title,
            'description' => $request->description,
        ];

        $galeryVideo->update($data);

        $message = 'Data berhasil di ubah!';
        Session::flash('petani', $message);

        return redirect(route('petani.galery.index'));
    }

    public function destroyVideo($id)
    {
        $galeryVideo = GaleryVideo::find($id);
        $galeryVideo->delete();

        $message = 'Data berhasil di hapus!';
        Session::flash('petani', $message);

        return redirect(route('petani.galery.index'));
    }
}
