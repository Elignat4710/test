<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile', [
            'posts' => Auth::user()->posts
        ]);
    }

    public function show($id)
    {
        return view('profile-detail', [
            'user' => User::where('id', $id)
                ->with('posts')->first()
        ]);
    }

    public function updateAvatar(Request $request)
    {
        if ($request->hasFile('avatar')) {
            User::where('id', Auth::user()->id)->update([
                'avatar' => $request->file('avatar')->store('avatars', 'public')
            ]);
        }

        return response()->json(['msg' => 'update']);
    }
}
