<?php

namespace App\Http\Controllers;


use App\Gallery;
use App\Http\Requests\GalleryRequest;
use App\Http\Requests\ProfilePictureRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index(Gallery $gallery, User $user) {

        return view('auth.gallery.index', compact('gallery','user'));
    }


    public function store( GalleryRequest $request, User $user) {

        $galleries = $request->file('gallery');

        foreach ($galleries as $gallery) {

            $picture = $gallery->store('/galleries', 'public');
            $user->galleries()->create([

                'name' => $picture

            ])->save();

        }


        return redirect(route('gallery.index',$user));
    }

    public function destroy(Gallery $gallery) {

        Storage::delete($gallery->name);
        $gallery->delete();

        return redirect()->back();
    }
}
