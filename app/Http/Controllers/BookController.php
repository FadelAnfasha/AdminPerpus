<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Bookshelf;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::pluck('name', 'id'); // get authors name
        $publishers = Publisher::pluck('name', 'id'); // get publisher name
        $bookshelves = Bookshelf::pluck('code'); //get bookshelf code

        return view('book/addBook', [
            'authors' => $authors,
            'publishers' => $publishers,
            'bookshelves' => $bookshelves
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255|unique:books,title',
            'publicationYear' => 'required|integer|min:1900|max:2099', // Ensure the correct field name from the form
            'amount' => 'required|integer|min:1|max:100',
            'author_id' => 'required|exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
            'bookshelf_code' => 'required|string|max:255|exists:bookshelves,code', // Ensure the correct validation
        ]);

        // Create a new Book record in the database
        try {
            $book = Book::create([
                'title' => $validatedData['title'],
                'publicationYear' => $validatedData['publicationYear'], // Ensure the correct field name from the form
                'amount' => $validatedData['amount'],
                'author_id' => $validatedData['author_id'],
                'publisher_id' => $validatedData['publisher_id'],
                'bookshelf_code' => $validatedData['bookshelf_code'],
            ]);

            // Redirect to the home page with success message
            return redirect()->route('show-book')->with([
                'type' => 'stored',
                'success' => 'Buku berhasil ditambahkan!'
            ]);
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Error creating book: ' . $e->getMessage());

            // Redirect back with error message
            return redirect()->back()->with('error', 'Error: Gagal menyimpan data buku!');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Book $book)

    {
        $books = Book::with(['author', 'publisher', 'bookshelf']);
        if (request('search')) {
            $books->where('title', 'like', '%' . request('search') . '%');
        }

        return view('book/viewBook', ['books' => $books->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $authors = Author::pluck('name', 'id');
        $publishers = Publisher::pluck('name', 'id');
        $bookshelves = Bookshelf::pluck('location', 'code');

        return view('book/editBook', compact('book', 'authors', 'publishers', 'bookshelves'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255|unique:books,title',
            'publicationYear' => 'required|integer|min:1900|max:2099',
            'amount' => 'required|integer|min:1|max:100',
            'author_id' => 'required|exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
            'bookshelf_code' => 'required|string|max:255|exists:bookshelves,code',
        ]);

        $book = Book::findOrFail($id);
        $book->update($validatedData);

        return redirect()->route('show-book')->with([
            'type' => 'updated',
            'success' => 'Buku berhasil diubah!'
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the book by its ID and delete it
        $book = Book::findOrFail($id);

        try {
            $book->delete();
            // Redirect back to the list of books with a success message
            return redirect()->route('show-book')->with([
                'type' => 'deleted',
                'success' => 'Buku telah dihapus!'
            ]);
        } catch (\Exception $e) {
            // Log the error and redirect back with an error message
            Log::error('Error deleting book: ' . $e->getMessage());
            return redirect()->route('show-book')->with('error', 'Gagal menghapus data buku!');
        }
    }
}
