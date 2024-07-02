<?php

namespace App\Http\Controllers;

use App\Models\Bookshelf;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

class BookshelfController extends Controller
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
        return view('bookshelf/addBookshelf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => [
                'required',
                'string',
                'max:255',
                'regex:/^[A-Z]-[1-9]\d*$/',
                Rule::unique('bookshelves', 'code') // Ensure to replace 'your_table_name' with your actual table name
            ],
            'location' => 'required|string|max:255',
        ]);

        try {
            $bookshelf = Bookshelf::create([
                'code' => $validatedData['code'],
                'location' => $validatedData['location']
            ]);

            return redirect()->route('show-bookshelf')->with([
                'type' => 'stored',
                'success' => 'Rak Buku berhasil ditambahkan!'
            ]);
        } catch (\Exception $e) {
            Log::error('Error creating Bookshelf: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An unexpected error occurred.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bookshelf $bookshelf)
    {
        $bookshelves = Bookshelf::latest();
        if (request('search')) {
            $bookshelves->where('name', 'like', '%' . request('search') . '%');
        }

        return view('bookshelf/viewbookshelf', ['bookshelves' => $bookshelves->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($code)
    {
        $bookshelf = Bookshelf::findOrFail($code);

        return view('bookshelf/editbookshelf', compact('bookshelf'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $code)
    {
        $validatedData = $request->validate([
            'code' => [
                'required',
                'string',
                'max:255',
                'regex:/^[A-Z]-[1-9]\d*$/',
                Rule::unique('bookshelves', 'code')
            ],
            'location' => 'required|string|max:255',
        ]);

        $bookshelf = Bookshelf::findOrFail($code);
        $bookshelf->update($validatedData);

        return redirect()->route('show-bookshelf')->with([
            'type' => 'updated',
            'success' => 'Penerbit berhasil diubah!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bookshelf = Bookshelf::findOrFail($id);

        try {
            $bookshelf->delete();
            return redirect()->route('show-bookshelf')->with([
                'type' => 'deleted',
                'success' => 'Penulis telah dihapus!'
            ]);
        } catch (\Exception $e) {
            Log::error('Error deleting bookshelf: ' . $e->getMessage());
            return redirect()->route('show-bookshelf')->with('error', 'Failed to delete the bookshelf.');
        }
    }
}
