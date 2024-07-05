<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Borrow;
use App\Models\BorrowHistory;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class BorrowingController extends Controller
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

        $books = Book::orderBy('title', 'asc')->get(); // Or whatever logic you use to get books
        $members = Member::orderBy('name', 'asc')->get(); // Or whatever logic you use to get members
        $userId = auth()->user()->id; // Get the authenticated user's ID

        return view('borrow/addBorrow', compact('books', 'members', 'userId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'borrowDate' => 'required|date|date_equals:today',
            'returnDate' => 'required|date|after:borrowDate',
            'book_id' => 'required',
            'member_id' => 'required',
            'user_id' => 'required'
        ], [
            'borrowDate.date_equals' => 'Tanggal pinjam harus hari ini.',
            'returnDate.after' => 'Tanggal kembali harus setelah tanggal pinjam.'
        ]);
        $validatedData['borrowDate'] = Carbon::parse($validatedData['borrowDate'])->format('Y-m-d');
        $validatedData['returnDate'] = Carbon::parse($validatedData['returnDate'])->format('Y-m-d');

        try {
            $borrow = Borrow::create([
                'borrow_date' => $validatedData['borrowDate'],
                'return_date' => $validatedData['returnDate'],
                'member_id' => $validatedData['member_id'],
                'user_id' => $validatedData['user_id'],
                'book_id' => $validatedData['book_id']
            ]);

            $history = BorrowHistory::create([
                'borrow_date' => $validatedData['borrowDate'],
                'return_date' => $validatedData['returnDate'],
                'member_id' => $validatedData['member_id'],
                'user_id' => $validatedData['user_id'],
                'book_id' => $validatedData['book_id']
            ]);

            return redirect()->route('show-borrow')->with([
                'type' => 'stored',
                'success' => 'Data peminjaman berhasil disimpan!'
            ]);
        } catch (\Exception $e) {
            Log::error('Error creating book: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Error: Gagal menyimpan data peminjaman!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Borrow $borrow)
    {
        $borrows = Borrow::with(['member', 'user', 'book']);
        if ($search = request('search')) {
            $borrows->whereHas('book', function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            });
        }

        return view('borrow/viewBorrow', ['borrows' => $borrows->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function detail($id)
    {
        $borrow = Borrow::with(['member', 'user', 'book'])->findOrFail($id);


        // return view('book/editBook', compact('book', 'authors', 'publishers', 'bookshelves'));
        return view('borrow/detailBorrow', compact('borrow'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Borrow $borrow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrow $borrow)
    {
        //
    }
}
