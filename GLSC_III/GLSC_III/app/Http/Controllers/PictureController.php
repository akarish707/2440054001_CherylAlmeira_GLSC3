<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $data = Picture::all();
        return view('home', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ddd($request);
        $data = [
            'image' => $request->file('pics')->store('picture-collection'),
            'title' => $request->title,
            'description' => $request->desc,
            'picture_taken' => Carbon::parse($request->date),
        ];

        Picture::create($data);

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlbumPicture  $albumPicture
     * @return \Illuminate\Http\Response
     */
    public function destroy($pictureCollection)
    {
        $data = Picture::find($pictureCollection);

        if($data->image){
            $tes = Storage::delete($data->image);
        }
        
        $data->destroy($data->id);

        return redirect()->route('home');
    }
}
