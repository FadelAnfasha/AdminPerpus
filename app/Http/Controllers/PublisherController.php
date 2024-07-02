<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PublisherController extends Controller
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
        return view('publisher/addPublisher');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phoneNumber' => 'required'
        ]);

        try {
            $publisher = Publisher::create([
                'name' => $validatedData['name'],
                'address' => $validatedData['address'],
                'phoneNumber' => $validatedData['phoneNumber']
            ]);

            return redirect()->route('show-publisher')->with([
                'type' => 'stored',
                'success' => 'Penerbit berhasil ditambahkan!'
            ]);
        } catch (\Exception $e) {
            Log::error('Error creating Publisher: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An unexpected error occurred.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        $publishers = Publisher::latest();
        if (request('search')) {
            $publishers->where('name', 'like', '%' . request('search') . '%');
        }

        return view('publisher/viewPublisher', ['publishers' => $publishers->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $publisher = Publisher::findOrFail($id);

        return view('publisher/editPublisher', compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phoneNumber' => 'required'
        ]);

        $publisher = Publisher::findOrFail($id);
        $publisher->update($validatedData);

        return redirect()->route('show-publisher')->with([
            'type' => 'updated',
            'success' => 'Penerbit berhasil diubah!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $publisher = publisher::findOrFail($id);

        try {
            $publisher->delete();
            return redirect()->route('show-publisher')->with([
                'type' => 'deleted',
                'success' => 'Penulis telah dihapus!'
            ]);
        } catch (\Exception $e) {
            Log::error('Error deleting Publisher: ' . $e->getMessage());
            return redirect()->route('show-publisher')->with('error', 'Failed to delete the Publisher.');
        }
    }
}
