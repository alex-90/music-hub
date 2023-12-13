<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\AlbumRequest;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $models = Album::all();

        return view('album.index', ['models' => $models]);
    }

       /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $model = new Album;
        $authors = Author::all()->pluck('name', 'id');

        return view('album.create', [
            'model' => $model,
            'authors' => $authors,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlbumRequest $request)
    {
        $name = $request->input('name');
        $author_id = $request->input('author');
        
        $model = new Album;
        $model->name = $name;
        $model->author_id = $author_id;
        $model->save();

        return redirect()->route('album.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        $authors = Author::all()->pluck('name', 'id');

        return view('album.update', [
            'authors' => $authors,
            'model' => $album
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AlbumRequest $request, Album $album)
    {
        $name = $request->input('name');
        $author_id = $request->input('author');
        
        $album->name = $name;
        $album->author_id = $author_id;

        $album->save();

        return redirect()->route('album.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        $album->delete();
        return redirect()->route('album.index');
    }
}
