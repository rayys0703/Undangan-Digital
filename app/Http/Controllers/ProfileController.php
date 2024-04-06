<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        // Get the current user
        $user = auth()->user();

        // Return the view
        return view('user.profile', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $user = User::findOrFail(auth()->user()->id);

        // Get the image
        $image = $request->file('image');

        // Store the image
        $filename = $user->id . '.' . $image->extension();
        $filenameDB = 'images/profile/' . $filename;
        $image->move(public_path('images/profile'), $filename);

        // Delete the old image
        $oldImage = $user->image;

        if ($oldImage && $oldImage !== $filename && $oldImage !== 'default.webp') {
            $filePath = public_path('images/profile/' . $oldImage);

            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Update the user's profile image
        $user->image = $filenameDB;
        $user->save();

        // Redirect to the profile page
        return redirect()->route('profil');
    }

    public function edit(Request $request)
    {
        return view('profile', [
            'user' => $request->user()
        ]);
    }

    public function update(UpdateProfileRequest $request)
    {
        $request->user()->update(
            $request->all()
        );

        return redirect()->route('profil')->with('success', 'Profil berhasil diperbarui');
    }
}
