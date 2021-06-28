<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Профиль авторизированого юзера
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('profile', [
            'posts' => Auth::user()->posts
        ]);
    }

    /**
     * Профиль юзера по айди
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        return view('profile-detail', [
            'user' => User::where('id', $id)
                ->with('posts')->first()
        ]);
    }

    /**
     * Обновление фотографии профиля
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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
