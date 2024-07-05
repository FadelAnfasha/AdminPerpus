<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Returning;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReturningController extends Controller
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
    public function store($id)
    {
        $borrowData = Borrow::findOrFail($id);
        $returnTime = Carbon::now()->format('Y-m-d');
        $storeData = Returning::create(
            [
                'return_date' => $returnTime,
                'borrowing_id' => $borrowData->id,
                'user_id' => $borrowData->user_id,
                'book_id' => $borrowData->book_id,
            ]
        );
        $borrowData->delete();
        return redirect()->route('show-borrow')->with([
            'type' => 'stored',
            'success' => 'Data peminjaman berhasil diperbaharui!'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        // Ambil data dengan relasi
        $returned = Returning::with(['borrow.member', 'borrow.book', 'user'])->get();

        // Cek apakah ada pencarian
        if ($request->has('search')) {
            $search = $request->input('search');

            // Filter koleksi berdasarkan nama anggota atau judul buku
            $returned = $returned->filter(function ($item) use ($search) {
                return stripos($item->borrow->member->name, $search) !== false ||
                    stripos($item->borrow->book->title, $search) !== false;
            });
        }

        return view('returning/viewReturning', ['returned' => $returned]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Returning $returning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Returning $returning)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Returning $returning)
    {
        //
    }
}
