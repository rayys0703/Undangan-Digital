<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileImageController extends Controller
{
    public function showProfileImageForm()
    {
        return view('profile');
    }

    public function uploadProfileImage(Request $request)
    {
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('profile_images'), $imageName);

            $user = User::find(auth()->user()->id);
            $user->update(['profile_image' => $imageName]);
        }

        return redirect()->route('profil');
    }
}
