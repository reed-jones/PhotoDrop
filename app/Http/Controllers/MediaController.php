<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // get major filetype i.e. image, video, text, application etc
        $filetype = explode('/', $request->file->getClientMimeType())[0];

        // only images or videos should be able to get to this point thanks to dropzone.js rules, but lets check again to be sure.
        if ($filetype != 'image' && $filetype != 'video') {
            return response()->json(['error' => 'Bad Filetype'], 500);
        }

        if ($filetype === 'image') {
            // super simple image saving. imediately ready for viewing
            $path = $request->file->store('photos', 'public');
            $media = new Media;
            $media->path = explode('/', $path)[1];
            $media->type = $filetype;
            $media->ready = 1;
            $media->save();
        } else if ($filetype === 'video') {
            // save the original video to the database, but don't enable viewing until after the conversion is complete
            $path = $request->file->store('videos/original', 'public');
            $media = new Media;
            $media->path = explode('/', $path)[2];
            $media->type = $filetype;
            $media->save();

            // convert video to mp4, and reduce quality for faster streaming/reduced server load. Original file still available
            $this->dispatch(new \App\Jobs\ConvertVideoForDownloading($media));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $media)
    {
        //
    }
}
