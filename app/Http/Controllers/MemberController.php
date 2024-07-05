<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
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
        return view('member/addMember');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female',
            'address' => 'required|string|max:255',
            'phoneNumber' => 'required|string|max:15',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Simpan file foto ke folder 'public/image/profilepic' dan ambil nama file
        if ($request->hasFile('photo')) {
            $photoFile = $request->file('photo');
            $photoFileName = time() . '_' . uniqid() . '.' . $photoFile->getClientOriginalExtension(); // Membuat nama file unik
            $photoFile->storeAs('image/profilepic', $photoFileName, 'public'); // Simpan file dengan nama yang unik
        }

        // Buat data anggota baru di database
        Member::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'address' => $request->address,
            'phoneNumber' => $request->phoneNumber,
            'photo' => $photoFileName,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('show-member')->with([
            'type' => 'stored',
            'success' => 'Member berhasil ditambahkan!'
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        $members = Member::latest();

        if (request('search')) {
            $search = request('search');
            $members->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('address', 'like', '%' . $search . '%');
            });
        }

        return view('member.viewmember', ['members' => $members->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $member = Member::findOrFail($id);

        return view('member/editMember', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phoneNumber' => 'required|string|max:15',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Temukan member berdasarkan id
        $member = Member::findOrFail($id);

        // Update data member
        $member->name = $request->input('name');
        $member->address = $request->input('address');
        $member->phoneNumber = $request->input('phoneNumber');

        // Proses file foto jika ada
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($member->photo) {
                Storage::delete('public/image/profilepic/' . $member->photo);
            }

            // Simpan foto baru
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/image/profilepic', $filename);

            // Update nama file di database
            $member->photo = $filename;
        }

        // Simpan perubahan ke database
        $member->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('show-member')->with('success', 'Member updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        // Get the path of the photo to delete
        $photoPath = 'public/image/profilepic/' . $member->photo;

        // Delete the member record from the database
        $member->delete();

        // Check if the photo file exists and delete it
        if (Storage::exists($photoPath)) {
            Storage::delete($photoPath);
        }

        // Redirect to a list of members with a success message
        return redirect()->route('show-member')->with('success', 'Member deleted successfully!');
    }
}
