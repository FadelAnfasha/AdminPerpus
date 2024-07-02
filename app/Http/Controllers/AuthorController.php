<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('author/addAuthor');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string|max:255'
        ]);

        try {
            $book = Author::create([
                'name' => $validatedData['name'],
                'status' => $validatedData['status']
            ]);

            return redirect()->route('show-author')->with([
                'type' => 'stored',
                'success' => 'Penulis berhasil ditambahkan!'
            ]);
        } catch (\Exception $e) {
            Log::error('Error creating book: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An unexpected error occurred.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        $authors = Author::latest();
        if (request('search')) {
            $authors->where('name', 'like', '%' . request('search') . '%');
        }

        return view('author/viewAuthor', ['authors' => $authors->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $author = Author::findOrFail($id);

        return view('author/editAuthor', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string|max:255'
        ]);

        $author = Author::findOrFail($id);
        $author->update($validatedData);

        return redirect()->route('show-author')->with([
            'type' => 'updated',
            'success' => 'Penulis berhasil diubah!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $author = Author::findOrFail($id);

        try {
            $author->delete();
            return redirect()->route('show-author')->with([
                'type' => 'deleted',
                'success' => 'Penulis telah dihapus!'
            ]);
        } catch (\Exception $e) {
            Log::error('Error deleting author: ' . $e->getMessage());
            return redirect()->route('show-author')->with('error', 'Failed to delete the Author.');
        }
    }
}
