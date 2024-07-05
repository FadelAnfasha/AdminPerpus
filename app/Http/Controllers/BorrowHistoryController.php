<?php

namespace App\Http\Controllers;

use App\Models\BorrowHistory;
use Illuminate\Http\Request;

class BorrowHistoryController extends Controller
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
    public function show(BorrowHistory $borrowHistory)
    {
        $borrowHistory = BorrowHistory::with(['member', 'user', 'book']);

        if ($search = request('search')) {
            $borrowHistory->whereHas('book', function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            })->orWhereHas('member', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
        }

        return view('borrow/BorrowHistory', ['borrowHistory' => $borrowHistory->get()]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BorrowHistory $borrowHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BorrowHistory $borrowHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BorrowHistory $borrowHistory)
    {
        //
    }
}
