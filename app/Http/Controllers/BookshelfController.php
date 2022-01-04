<?php

namespace App\Http\Controllers;

use App\Models\Bookshelf;
use App\Http\Requests\BookshelfRequest;
use Inertia\Inertia;

class BookshelfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Manipulate/Bookshelf/Index', [
            'bookshelves' => Bookshelf::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Manipulate/Bookshelf/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookshelfRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookshelfRequest $request)
    {
        Bookshelf::create($request->all());

        return redirect()->route('manipulate.bookshelves.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bookshelf  $bookshelf
     * @return \Illuminate\Http\Response
     */
    public function edit(Bookshelf $bookshelf)
    {
        return Inertia::render('Manipulate/Bookshelf/Edit', [
            'bookshelf' => $bookshelf,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookshelfRequest  $request
     * @param  \App\Models\Bookshelf  $bookshelf
     * @return \Illuminate\Http\Response
     */
    public function update(BookshelfRequest $request, Bookshelf $bookshelf)
    {
        $bookshelf->update($request->all());

        return redirect()->route('manipulate.bookshelves.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bookshelf  $bookshelf
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bookshelf $bookshelf)
    {
        $bookshelf->delete();

        return redirect()->route('manipulate.bookshelves.index');
    }
}
