<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\ServerFactory;

class WelcomeController extends Controller
{
    public function index() {
        $media = Media::all()->where('ready', 1);

        //  TODO: initially get only first 16 (1.5 rows below fold on 1080p screen), then retrieve additional pages when 800px (two rows) from bottom
        return view('welcome')->with('media', $media);
    }

    public function showImage(Filesystem $filesystem, $path) {
        $server = ServerFactory::create([
            'response' => new LaravelResponseFactory(app('request')),
            'source' => $filesystem->getDriver(),
            'cache' => $filesystem->getDriver(),
            'source_path_prefix' => '/public/photos',
            'cache_path_prefix' => '/public/photos/.cache',
            'base_url' => 'img',
        ]);

        return $server->getImageResponse($path, request()->all());
    }

    public function showVideo() {

    }
}
