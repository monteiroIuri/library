<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Bookshelf;
use App\Http\Requests\GenreRequest;
use Inertia\Inertia;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Manipulate/Genre/Index', [
            'genres' => Genre::with('bookshelf')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Manipulate/Genre/Create', [
            'bookshelves' => Bookshelf::where('active', 1)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\GenreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenreRequest $request)
    {
        Genre::create($request->all());

        return redirect()->route('manipulate.genres.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        return Inertia::render('Manipulate/Genre/Edit', [
            'genre' => $genre,
            'bookshelves' => Bookshelf::where('active', 1)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\GenreRequest  $request
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(GenreRequest $request, Genre $genre)
    {
        $genre->update($request->all());

        return redirect()->route('manipulate.genres.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();

        return redirect()->route('manipulate.genres.index');
    }
}