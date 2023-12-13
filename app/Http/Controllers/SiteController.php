<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

// use Illuminate\Support\Facades\Storage;
use Storage;


class SiteController extends Controller
{
    public function index()
    {
        $files = File::latest()->take(10)->get();;

        return view('index', ['files' => $files]);
    }


    public function download($hash)
    {
        $path = 'upload/' . $hash;

        $size = Storage::size($path);

        header("Content-Type: audio/mpeg");
        header("Content-Length: $size");

        header("Accept-Ranges: bytes");
              
        echo Storage::get($path);
    }
}
