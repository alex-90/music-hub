<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Author;
use App\Models\Category;
use App\Models\Album;

use App\Http\Requests\UploadFileRequest;

use Illuminate\Support\Facades\Storage;

use Symfony\Component\Process\Process;

use App\Helpers;
use Auth;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = File::with(['author', 'album'])->get();

        return view('admin', ['files' => $files]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function upload()
    {
        $authors = Author::all();
        $categories = Category::all();
        $albums = Album::all();

        return view('upload', [
            'authors' => $authors,
            'categories' => $categories,
            'albums' => $albums,
        ]);
    }

    public function uploadFile(UploadFileRequest $req)
    {
        $name = $req->input('name');
        $file = $req->file('file');
        $author_id = $req->input('author');
        $album_id = $req->input('album');
        $category_id = $req->input('category');
        $hash = md5(uniqid());

        $info = Helpers::getMp3Info($file);

        $id = File::create([
            'title' => $name,
            'hash' => $hash,
            'creator_id' => Auth::user()->id,
            'size' => $file->getSize(),
            'time'=> $info['duration'],
            'album_id' => $album_id,
            'author_id' => $author_id,
            'bitrate' => $info['bitrate'],
            'category_id' => $category_id,
        ])->id;

        $path = $file->storeAs('upload', $hash);

        return redirect()->route('admin');
    }

    
    public function deleteFile(Request $req, $id)
    {
        $file = File::find($id);

        if (!$file){
            abort(404);
        }
        
        $file->delete();

        $path = 'upload/' . $file->hash;
        
        Storage::delete($path);

        return redirect()->route('admin');
    }

    public function test(Request $req)
    {
        $hash = '1ada446a3b6967fb6f53a2808ad4a53f';
        // storage/app/public/upload/

        $path = Storage::path('upload/' . $hash);
        $size = Storage::size('upload/'. $hash);
        $a = asset('upload/' .  $hash);
        $e = Storage::exists('upload/'. $hash);
        $url = Storage::url('upload/'. $hash);

        dd($a);
        dd($url);
        dd($e);
        dd($size);
        dd($path);
    }

}
